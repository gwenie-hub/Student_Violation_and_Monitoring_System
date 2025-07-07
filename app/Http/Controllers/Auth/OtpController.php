<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function showForm()
    {
        return view('auth.otp');
    }

    public function send(Request $request)
    {
        $user = Auth::user();
        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        // Send email or SMS (Here, we use email)
        Mail::raw("Your OTP is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Your OTP Code');
        });

        return redirect()->route('otp.form')->with('status', 'OTP sent to your email.');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
        ]);

        $user = Auth::user();

        if ($user->otp === $request->otp && now()->lessThan($user->otp_expires_at)) {
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->save();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }
}
