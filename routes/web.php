<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Router;
use App\Http\Controllers\SuperAdmin\DashboardController;

use App\Http\Livewire\{
    ViolationForm,
    ViolationTable,
    Disciplinary\ManageViolations,
    Admin\UserManagement,
    Admin\StudentManagement,
    Admin\Dashboard as AdminDashboard,
    Admin\ManageViolations as AdminManageViolations,
    Counselor\CounselingReports,
    Auth\OtpVerify,
    Admin\RoleManagement
};

use App\Models\User;
use App\Models\Student;
use App\Models\Violation;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\ViolationController;
use Illuminate\Http\Request;

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
    } elseif ($user->hasRole('disciplinary_committee')) {
        return redirect()->route('disciplinary.violations');
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
    Route::get('/super-admin/dashboard', function () {
        abort_unless(auth()->user()?->hasRole('super_admin'), 403);

        return view('super-admin.dashboard', [
            'totalUsers' => \App\Models\User::count(),
            'totalStudents' => \App\Models\Student::count(),
            'totalViolations' => \App\Models\Violation::count(),
        ]);
    })->name('superadmin.dashboard');

    // ✅ SCHOOL ADMIN
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('school_admin'), 403);
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/users', UserManagement::class)
            ->middleware('can:school_admin')
            ->name('admin.users');

        Route::get('/students', StudentManagement::class)
            ->middleware('can:school_admin')
            ->name('admin.students');

        Route::get('/violations', AdminManageViolations::class)
            ->middleware('can:school_admin')
            ->name('admin.violations');

        Route::get('/roles', RoleManagement::class)
            ->middleware('can:school_admin')
            ->name('admin.roles');
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
            ->paginate(10);

        return view('professor.dashboard', compact('violations'));
    })->name('professor.dashboard');

    Route::get('/violations', [ViolationController::class, 'index'])->name('violations.index');
    Route::get('/professor/violations', [ViolationController::class, 'myViolations'])->name('violations.my');

    // ✅ DISCIPLINARY
    Route::prefix('disciplinary')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('disciplinary_committee'), 403);
            return view('disciplinary.dashboard');
        })->name('disciplinary.dashboard');

        Route::get('/violations', function () {
            abort_unless(auth()->check() && auth()->user()->hasRole('disciplinary_committee'), 403);

            $violations = Violation::with('student')->latest()->paginate(10);
            return view('disciplinary.violations', compact('violations'));
        })->name('disciplinary.violations');

        Route::get('/violations/{violation}/edit', function ($id) {
            abort_unless(auth()->check() && auth()->user()->hasRole('disciplinary_committee'), 403);

            $violation = Violation::with('student')->findOrFail($id);
            return view('disciplinary.edit', compact('violation'));
        })->name('disciplinary.edit');

        Route::put('/violations/{violation}', function (Request $request, $id) {
            abort_unless(auth()->check() && auth()->user()->hasRole('disciplinary_committee'), 403);

            $request->validate(['sanction' => 'required|string']);

            $violation = Violation::findOrFail($id);
            $violation->sanction = $request->sanction;

            try {
                $violation->notify_status = 'success';
            } catch (\Exception $e) {
                $violation->notify_status = 'failed';
            }

            $violation->save();

            return redirect()->route('disciplinary.violations')->with('success', 'Sanction applied.');
        })->name('disciplinary.update');

        // ✅ FIXED: Missing named routes added here
        Route::get('/reports', function () {
            return view('disciplinary.reports');
        })->name('disciplinary.reports');

        Route::get('/actions', function () {
            return view('disciplinary.actions');
        })->name('disciplinary.actions');

        Route::get('/notifications', function () {
            return view('disciplinary.notifications');
        })->name('disciplinary.notifications');

        Route::get('/sanctions/apply', function () {
            return view('disciplinary.apply-sanction');
        })->name('sanctions.apply');

        Route::get('/parents/notify', function () {
            return view('disciplinary.notify-parents');
        })->name('parents.notify');

        Route::get('/status/index', function () {
            return view('disciplinary.status-tracking');
        })->name('report.status');

        Route::get('/tracking', function () {
            return view('disciplinary.tracking');
        })->name('tracking.status');
    });

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

    Route::get('/parent/notifications', function () {
        return view('parent.notifications');
    })->name('notifications.index');

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
