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
    Admin\ManageViolations as AdminManageViolations,
    Counselor\CounselingReports,
    Auth\OtpVerify
};

use App\Models\User;
use App\Models\Student;
use App\Models\Violation;
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

    // ✅ SUPER ADMIN
    Route::prefix('super-admin')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('super_admin'), 403);

            return view('super-admin.dashboard', [
                'totalUsers' => User::count(),
                'totalStudents' => Student::count(),
                'totalViolations' => Violation::count(),
            ]);
        })->name('superadmin.dashboard');
    });

    // ✅ SCHOOL ADMIN
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('school_admin'), 403);
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/users', fn () => app(UserManagement::class))
            ->middleware('can:school_admin')
            ->name('admin.users');

        Route::get('/students', fn () => app(StudentManagement::class))
            ->middleware('can:school_admin')
            ->name('admin.students');

        Route::get('/violations', fn () => app(AdminManageViolations::class))
            ->middleware('can:school_admin')
            ->name('admin.violations');
    });

    // ✅ PROFESSOR
    Route::get('/violations/create', function () {
        abort_unless(auth()->user()->hasRole('professor'), 403);
        return app(ViolationForm::class);
    })->name('violations.create');

    Route::get('/professor', function () {
        abort_unless(auth()->user()->hasRole('professor'), 403);

        $violations = Violation::with('student')
            ->where('reported_by', auth()->id())
            ->latest()
            ->paginate(10); // ✅ This enables links() in Blade

        return view('professor.dashboard', compact('violations'));
    })->name('professor.dashboard');

    // ✅ DISCIPLINARY OFFICER
    Route::get('/disciplinary/violations', function () {
        abort_unless(auth()->user()->hasRole('disciplinary_officer'), 403);
        return app(ManageViolations::class);
    })->name('disciplinary.violations');

    // ✅ GUIDANCE COUNSELOR
    Route::prefix('counselor')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('guidance_counselor'), 403);
            return view('counselor.dashboard');
        })->name('counselor.dashboard');

        Route::get('/reports', function () {
            abort_unless(auth()->user()->hasRole('guidance_counselor'), 403);
            return app(CounselingReports::class);
        })->name('counselor.reports');
    });

    // ✅ PARENT
    Route::get('/parent/dashboard', function () {
        abort_unless(auth()->user()->hasRole('parent'), 403);
        $student = auth()->user()->student;
        return view('parent.dashboard', compact('student'));
    })->name('parent.dashboard');

    // ✅ OTP
    Route::get('/otp', [OtpController::class, 'showForm'])->name('otp.form');
    Route::post('/otp/send', [OtpController::class, 'send'])->name('otp.send');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');

    // ✅ DEBUG / TEST ROUTES
    Route::get('/session-test', fn () => tap(session(['test' => 'value']), fn () => 'Session set.'));
    Route::get('/session-check', fn () => session('test', 'nothing found'));

    Route::get('/test-role', function () {
        return auth()->user()->hasRole('super_admin') ? 'Role check works!' : abort(403);
    });

    Route::get('/middleware-debug', fn () =>
        response()->json(array_keys(App::make(Router::class)->getMiddleware()))
    );
});

// ✅ MANUAL LOGOUT
Route::post('/custom-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('custom.logout');
