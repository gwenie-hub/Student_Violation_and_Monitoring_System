<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OtpVerify extends Component
{
    public $email;
    public $otp;

    public function mount()
    {
        $this->email = session('otp_email');
    }

    public function verify()
    {
        $user = User::where('email', $this->email)->first();

        if (!$user || $user->otp !== $this->otp || now()->gt($user->otp_expires_at)) {
            session()->flash('error', 'Invalid or expired OTP.');
            return;
        }

        Auth::login($user);
        $user->update(['otp' => null, 'otp_expires_at' => null]);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.otp-verify');
    }
}

