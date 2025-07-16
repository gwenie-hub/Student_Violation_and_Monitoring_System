<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// Add reCAPTCHA middleware to login POST
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['web', 'guest', 'recaptcha'])
    ->name('login');
