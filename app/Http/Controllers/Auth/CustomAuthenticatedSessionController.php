<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as BaseController;

class CustomAuthenticatedSessionController extends BaseController
{
    public function store(Request $request)
    {
        // Call Fortify's default login
        $response = parent::store($request);

        // Redirect based on role
        $user = Auth::user();

        if ($user->hasRole('super_admin')) {
            return redirect()->route('superadmin.dashboard');
        } elseif ($user->hasRole('school_admin')) {
            return redirect()->route('admin.users');
        } elseif ($user->hasRole('professor')) {
            return redirect()->route('violations.create');
        } elseif ($user->hasRole('guidance_counselor')) {
            return redirect()->route('counselor.dashboard');
        } elseif ($user->hasRole('disciplinary_officer')) {
            return redirect()->route('disciplinary.violations');
        } elseif ($user->hasRole('parent')) {
            return redirect()->route('parent.dashboard');
        }

        // Fallback
        return redirect()->route('dashboard');
    }
}
