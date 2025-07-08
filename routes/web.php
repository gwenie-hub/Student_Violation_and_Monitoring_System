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
    Admin\Dashboard as AdminDashboard,
    Counselor\CounselingReports,
    Auth\OtpVerify
};

use App\Http\Controllers\Auth\OtpController;

// ✅ Redirect base URL to login
Route::get('/', fn () => redirect()->route('login'));

// ✅ Dashboard Redirection Based on Role
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->hasRole('super_admin')) {
        return redirect()->route('superadmin.dashboard');
    } elseif ($user->hasRole('school_admin')) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->hasRole('professor')) {
        return redirect()->route('professor.dashboard');
    } elseif ($user->hasRole('guidance_counselor')) {
        return redirect()->route('counselor.dashboard');
    } elseif ($user->hasRole('parent')) {
        return redirect()->route('parent.dashboard');
    }

    abort(403, 'Unauthorized');
})->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->name('dashboard');

// ✅ Authenticated & Verified Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // ✅ SUPER ADMIN ROUTES
    Route::prefix('super-admin')
        ->middleware('role:super_admin')
        ->group(function () {
            Route::get('/dashboard', function () {
                return view('super-admin.dashboard'); // View contains Livewire component
            })->name('superadmin.dashboard');
        });

    // ✅ SCHOOL ADMIN ROUTES
    Route::prefix('admin')
        ->middleware('role:school_admin')
        ->group(function () {
            Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
            Route::get('/users', UserManagement::class)->name('admin.users');
            Route::get('/students', StudentManagement::class)->name('admin.students');
        });

    // ✅ PROFESSOR ROUTES
    Route::middleware('role:professor')->group(function () {
        Route::get('/violations/create', ViolationForm::class)->name('violations.create');
        Route::get('/professor', fn () => view('professor'))->name('professor.dashboard');
    });

    // ✅ DISCIPLINARY OFFICER ROUTES
    Route::middleware('role:disciplinary_officer')->group(function () {
        Route::get('/disciplinary/violations', ManageViolations::class)->name('disciplinary.violations');
    });

    // ✅ GUIDANCE COUNSELOR ROUTES
    Route::prefix('counselor')
        ->middleware('role:guidance_counselor')
        ->group(function () {
            Route::get('/dashboard', fn () => view('counselor.dashboard'))->name('counselor.dashboard');
            Route::get('/reports', CounselingReports::class)->name('counselor.reports');
        });

    // ✅ PARENT ROUTES
    Route::middleware('role:parent')->group(function () {
        Route::get('/parent/dashboard', function () {
            $student = auth()->user()->student;
            return view('parent.dashboard', compact('student'));
        })->name('parent.dashboard');
    });

    // ✅ OTP ROUTES
    Route::get('/otp', [OtpController::class, 'showForm'])->name('otp.form');
    Route::post('/otp/send', [OtpController::class, 'send'])->name('otp.send');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');

    // ✅ DEBUG/TEST ROUTES (Optional)
    Route::get('/session-test', fn () => tap(session(['test' => 'value']), fn () => 'Session set.'));
    Route::get('/session-check', fn () => session('test', 'nothing found'));
    Route::middleware('role:super_admin')->get('/test-role', fn () => 'Role middleware is working!');
    Route::get('/middleware-debug', fn () => response()->json(array_keys(App::make(Router::class)->getMiddleware())));
});

// ✅ MANUAL LOGOUT (Fixes Jetstream redirect issue)
Route::post('/custom-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('custom.logout');
