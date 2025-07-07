<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user->hasRole('super_admin')) {
            return redirect()->route('superadmin.dashboard');
        }

        if ($user->hasRole('counselor')) {
            return redirect()->route('counselor.dashboard');
        }

        if ($user->hasRole('professor')) {
            return redirect()->route('professor.dashboard');
        }

        if ($user->hasRole('parent')) {
            return redirect('/parent/dashboard');
        }

        // Fallback redirect
        return redirect('/login')->with('error', 'No dashboard found for your role.');
    }
}
