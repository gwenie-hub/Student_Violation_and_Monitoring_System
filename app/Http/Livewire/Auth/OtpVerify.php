<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OtpVerify extends Component
{
    public $otp;

    public function mount()
    {
        $user = Auth::user();

        // If already verified, redirect
        if ($user->is_otp_verified) {
            return redirect()->intended('/super-admin/dashboard');
        }

        // Generate & send OTP
        $otp = rand(100000, 999999);
        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // You can send via SMS or Notification, here’s email
        Mail::raw("Your OTP code is: {$otp}", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Your OTP Code');
        });
    }

    public function verify()
    {
        $user = Auth::user();

        if ($this->otp == $user->otp_code && now()->lt($user->otp_expires_at)) {
            $user->update([
                'is_otp_verified' => true,
                'otp_code' => null,
                'otp_expires_at' => null,
            ]);
            return redirect()->intended('/super-admin/dashboard');
        }

        session()->flash('error', 'Invalid or expired OTP');
    }

    public function render()
    {
        return view('livewire.auth.otp-verify')->layout('layouts.guest');
    }
}
