<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\SystemLog;

class Recover2FAController extends Controller
{
    public function showForm()
    {
        return view('auth.recover-2fa');
    }

    public function recover(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'recovery_code' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !$user->two_factor_recovery_codes) {
            Session::flash('error', 'Invalid email or no recovery codes found.');
            return back();
        }

        $codes = json_decode(decrypt($user->two_factor_recovery_codes), true);
        if (!is_array($codes)) {
            Session::flash('error', 'Recovery codes are not available.');
            return back();
        }

        $inputCode = trim($request->recovery_code);
        $matched = false;
        foreach ($codes as $i => $code) {
            if (hash_equals($code, $inputCode)) {
                $matched = true;
                unset($codes[$i]);
                break;
            }
        }

        if ($matched) {
            // Remove used code and update user
            $user->two_factor_recovery_codes = encrypt(json_encode(array_values($codes)));
            $user->save();
            Auth::login($user);
            SystemLog::create([
                'user_id' => $user->id,
                'name' => $user->name ?? ($user->fname . ' ' . $user->lname),
                'action' => 'recovered account using 2FA recovery code',
            ]);
            Session::flash('message', 'Recovery successful. You are now logged in.');
            return redirect()->route('dashboard');
        } else {
            Session::flash('error', 'Invalid recovery code.');
            return back();
        }
    }
}
