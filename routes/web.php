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

// ✅ Authenticated & Verified Routes (Manual role checking inside closures/components)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // ✅ SUPER ADMIN ROUTES
    Route::prefix('super-admin')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('super_admin'), 403);
            return view('super-admin.dashboard');
        })->name('superadmin.dashboard');
    });

    // ✅ SCHOOL ADMIN ROUTES
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');
        Route::get('/users', UserManagement::class)->name('admin.users');
        Route::get('/students', StudentManagement::class)->name('admin.students');
    });

    // ✅ PROFESSOR ROUTES
    Route::get('/violations/create', ViolationForm::class)->name('violations.create');
    Route::get('/professor', function () {
        abort_unless(auth()->user()->hasRole('professor'), 403);
        return view('professor');
    })->name('professor.dashboard');

    // ✅ DISCIPLINARY OFFICER ROUTES
    Route::get('/disciplinary/violations', function () {
        abort_unless(auth()->user()->hasRole('disciplinary_officer'), 403);
        return app(ManageViolations::class);
    })->name('disciplinary.violations');

    // ✅ GUIDANCE COUNSELOR ROUTES
    Route::prefix('counselor')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('guidance_counselor'), 403);
            return view('counselor.dashboard');
        })->name('counselor.dashboard');

        Route::get('/reports', CounselingReports::class)->name('counselor.reports');
    });

    // ✅ PARENT ROUTES
    Route::get('/parent/dashboard', function () {
        abort_unless(auth()->user()->hasRole('parent'), 403);
        $student = auth()->user()->student;
        return view('parent.dashboard', compact('student'));
    })->name('parent.dashboard');

    // ✅ OTP ROUTES
    Route::get('/otp', [OtpController::class, 'showForm'])->name('otp.form');
    Route::post('/otp/send', [OtpController::class, 'send'])->name('otp.send');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');

    // ✅ DEBUG/TEST ROUTES
    Route::get('/session-test', fn () => tap(session(['test' => 'value']), fn () => 'Session set.'));
    Route::get('/session-check', fn () => session('test', 'nothing found'));

    Route::get('/test-role', function () {
        return auth()->user()->hasRole('super_admin') ? 'Role check works!' : abort(403);
    });

    Route::get('/middleware-debug', fn () =>
        response()->json(array_keys(App::make(Router::class)->getMiddleware()))
    );
});

// ✅ MANUAL LOGOUT (Jetstream-friendly)
Route::post('/custom-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('custom.logout');
