<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->hasRole('super_admin')) {
            return redirect()->intended('/super-admin/dashboard');
        } elseif ($user->hasRole('guidance_counselor')) {
            return redirect()->intended('/guidance/dashboard');
        } elseif ($user->hasRole('disciplinary_officer')) {
            return redirect()->intended('/officer/dashboard');
        } elseif ($user->hasRole('professor')) {
            return redirect()->intended('/professor/dashboard');
        }

        return redirect()->intended('/dashboard');
    }
}
