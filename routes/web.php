<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Router;
use App\Http\Livewire\{
    ViolationForm,
    ViolationTable,
    Disciplinary\ManageViolations,
    Admin\UserManagement,
    Admin\StudentManagement,
    Admin\Dashboard as SuperAdminDashboard,
    Counselor\CounselingReports,
    Auth\OtpVerify
};
use App\Http\Controllers\Auth\OtpController;

// Default Jetstream route (homepage redirects to login)
Route::get('/', fn () => redirect()->route('login'));

// Jetstream default authenticated dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
});

// Role-based route grouping
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // ✅ SUPER ADMIN Dashboard Route (Only super_admin role can access)
    Route::prefix('super-admin')
        ->middleware('role:super_admin')
        ->group(function () {
            Route::get('/dashboard', SuperAdminDashboard::class)->name('superadmin.dashboard');
        });

    // Professor
    Route::middleware('role:professor')->group(function () {
        Route::get('/violations/create', ViolationForm::class)->name('violations.create');
        Route::get('/professor', fn () => view('professor'))->name('professor.dashboard');
    });

    // School Admin
    Route::middleware('role:school_admin')->group(function () {
        Route::get('/violations', ViolationTable::class)->name('violations.index');
        Route::get('/admin/users', UserManagement::class)->name('admin.users');
        Route::get('/admin/students', StudentManagement::class)->name('admin.students');
    });

    // Disciplinary Officer
    Route::get('/disciplinary/violations', ManageViolations::class)
        ->middleware('role:disciplinary_officer')
        ->name('disciplinary.violations');

    // Guidance Counselor
    Route::prefix('counselor')
        ->middleware('role:guidance_counselor')
        ->group(function () {
            Route::get('/dashboard', fn () => view('counselor.dashboard'))->name('counselor.dashboard');
            Route::get('/reports', CounselingReports::class)->name('counselor.reports');
        });

    // Parent
    Route::middleware('role:parent')->get('/parent/dashboard', function () {
        $student = auth()->user()->student;
        return view('parent.dashboard', compact('student'));
    })->name('parent.dashboard');

    // OTP Routes
    Route::get('/otp', [OtpController::class, 'showForm'])->name('otp.form');
    Route::post('/otp/send', [OtpController::class, 'send'])->name('otp.send');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');

    // Debug/Test Routes
    Route::get('/session-test', fn () => tap(session(['test' => 'value']), fn () => 'Session set.'));
    Route::get('/session-check', fn () => session('test', 'nothing found'));
    Route::middleware('role:super_admin')->get('/test-role', fn () => 'Role middleware is working!');
    Route::get('/middleware-debug', fn () => response()->json(array_keys(App::make(Router::class)->getMiddleware())));
});

// ✅ Manual logout route to fix login-refresh issue
Route::post('/custom-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('custom.logout');
