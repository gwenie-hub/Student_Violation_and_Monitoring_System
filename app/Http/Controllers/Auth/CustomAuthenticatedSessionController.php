<?php

namespace App\Http\Controllers\Auth;

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Laravel\Fortify\Contracts\LoginResponse;

class CustomAuthenticatedSessionController extends AuthenticatedSessionController
{
    /**
     * Override login to redirect by role.
     */
    public function store(LoginRequest $request): LoginResponse
    {
        $this->loginPipeline($request)->then(function ($request) {
            //
        });

        $user = $request->user();

        // ✅ Redirect based on role
        if ($user->hasRole('super_admin')) {
            return redirect()->intended('/super-admin/dashboard');
        } elseif ($user->hasRole('guidance_counselor')) {
            return redirect()->intended('/guidance/dashboard');
        } elseif ($user->hasRole('disciplinary_officer')) {
            return redirect()->intended('/officer/dashboard');
        } elseif ($user->hasRole('professor')) {
            return redirect()->intended('/professor/dashboard');
        } else {
            return redirect()->intended('/dashboard');
        }
    }
}
