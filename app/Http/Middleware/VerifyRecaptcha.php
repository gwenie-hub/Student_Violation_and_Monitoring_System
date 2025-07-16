<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifyRecaptcha
{
    public function handle(Request $request, Closure $next)
    {
        // Only validate reCAPTCHA if CSRF passed and user is not already authenticated
        if ($request->isMethod('post') && $request->routeIs('login') && !auth()->check()) {
            // Let CSRF/session validation happen first
            $response = $next($request);
            // If login failed (user not authenticated), check reCAPTCHA
            if (!auth()->check()) {
                $recaptcha = $request->input('g-recaptcha-response');
                if (!$recaptcha) {
                    return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed.']);
                }
                $recaptchaResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => '6Lc77H0rAAAAADXUxFzhqMxD8b-F3o1vUfcRvKz4',
                    'response' => $recaptcha,
                    'remoteip' => $request->ip(),
                ]);
                $result = $recaptchaResponse->json();
                if (!($result['success'] ?? false) || ($result['score'] ?? 0) < 0.5) {
                    return back()->withErrors(['recaptcha' => 'reCAPTCHA verification failed.']);
                }
            }
            return $response;
        }
        return $next($request);
    }
}
