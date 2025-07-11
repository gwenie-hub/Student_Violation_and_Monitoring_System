<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\ViolationController;
use App\Models\SystemLog;
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
    Admin\RoleManagement,
    SuperAdmin\AddUser,
    SuperAdmin\ManageAccounts,
    SuperAdmin\StudentRecords
};

use App\Models\User;
use App\Models\Student;
use App\Models\Violation;

// 🏠 Public Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// ✅ Dashboard Redirection Based on Role
Route::get('/dashboard', function () {
    $user = auth()->user();

    return match (true) {
        $user->hasRole('super_admin') => redirect()->route('superadmin.dashboard'),
        $user->hasRole('school_admin') => redirect()->route('admin.dashboard'),
        $user->hasRole('professor') => redirect()->route('professor.dashboard'),
        $user->hasRole('guidance_counselor') => redirect()->route('counselor.dashboard'),
        $user->hasRole('parent') => redirect()->route('parent.dashboard'),
        $user->hasRole('disciplinary_committee') => redirect()->route('disciplinary.violations'),
        default => abort(403, 'Unauthorized')
    };
})->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('dashboard');

// ✅ Authenticated & Verified Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // ✅ SUPER ADMIN
    Route::prefix('super-admin')
    ->middleware(['auth', 'verified'])
    ->group(function () {

    Route::get('/dashboard', function () {
        abort_unless(auth()->user()->hasRole('super_admin'), 403);
        return view('super-admin.dashboard', [
            'totalUsers' => User::count(),
            'totalStudents' => Student::count(),
            'totalViolations' => Violation::count(),
        ]);
    })->name('superadmin.dashboard');

    Route::get('/users/create', \App\Http\Livewire\SuperAdmin\AddUser::class)
        ->name('superadmin.add-user');

    Route::get('/users/manage', function () {
        abort_unless(auth()->user()->hasRole('super_admin'), 403);
        return view('super-admin.manage-accounts');
    })->name('superadmin.manage-accounts');

    Route::get('/student_records', StudentRecords::class)
        ->name('superadmin.student-records');

    Route::get('/system/logs', function () {
        $logs = \App\Models\SystemLog::with('user')->latest()->paginate(10);
        return view('super-admin.system-logs', compact('logs'));
    })->name('superadmin.system-logs');

    // ✅ CORRECTED reports route — no nested prefix!
    Route::get('/reports', function () {
        $reports = Violation::with('student')->latest()->paginate(10);
        return view('super-admin.reports-status', compact('reports'));
    })->name('superadmin.reports-status');

    Route::get('/reports/redirect', fn () => redirect()->route('superadmin.reports-status'))
        ->name('reports.index');
});
    

    // ✅ SCHOOL ADMIN
    Route::prefix('admin')->middleware('can:school_admin')->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
        Route::get('/users', UserManagement::class)->name('admin.users');
        Route::get('/students', StudentManagement::class)->name('admin.students');
        Route::get('/violations', AdminManageViolations::class)->name('admin.violations');
        Route::get('/roles', RoleManagement::class)->name('admin.roles');
    });

    // ✅ PROFESSOR
    Route::middleware('can:professor')->group(function () {
        Route::get('/violations/create', fn () => app(ViolationForm::class))->name('violations.create');

        Route::get('/professor', function () {
            $violations = Violation::with('student')
                ->where('reported_by', auth()->id())
                ->latest()
                ->paginate(10);

            return view('professor.dashboard', compact('violations'));
        })->name('professor.dashboard');

        Route::get('/violations', [ViolationController::class, 'index'])->name('violations.index');
        Route::get('/professor/violations', [ViolationController::class, 'myViolations'])->name('violations.my');
    });

    // ✅ DISCIPLINARY COMMITTEE
    Route::prefix('disciplinary')->middleware('can:disciplinary_committee')->group(function () {
        Route::view('/dashboard', 'disciplinary.dashboard')->name('disciplinary.dashboard');

        Route::get('/violations', function () {
            $violations = Violation::with('student')->latest()->paginate(10);
            return view('disciplinary.violations', compact('violations'));
        })->name('disciplinary.violations');

        Route::get('/violations/{violation}/edit', function ($id) {
            $violation = Violation::with('student')->findOrFail($id);
            return view('disciplinary.edit', compact('violation'));
        })->name('disciplinary.edit');

        Route::put('/violations/{violation}', function (Request $request, $id) {
            $request->validate(['sanction' => 'required|string']);
            $violation = Violation::findOrFail($id);
            $violation->sanction = $request->sanction;
            $violation->notify_status = 'success';
            $violation->save();

            return redirect()->route('disciplinary.violations')->with('success', 'Sanction applied.');
        })->name('disciplinary.update');

        Route::view('/reports', 'disciplinary.reports')->name('disciplinary.reports');
        Route::view('/actions', 'disciplinary.actions')->name('disciplinary.actions');
        Route::view('/notifications', 'disciplinary.notifications')->name('disciplinary.notifications');
        Route::view('/sanctions/apply', 'disciplinary.apply-sanction')->name('sanctions.apply');
        Route::view('/parents/notify', 'disciplinary.notify-parents')->name('parents.notify');
        Route::view('/status/index', 'disciplinary.status-tracking')->name('report.status');
        Route::view('/tracking', 'disciplinary.tracking')->name('tracking.status');
    });

    // ✅ GUIDANCE COUNSELOR
    Route::prefix('counselor')->middleware('can:guidance_counselor')->group(function () {
        Route::view('/dashboard', 'counselor.dashboard')->name('counselor.dashboard');
        Route::get('/reports', CounselingReports::class)->name('counselor.reports');
    });

    // ✅ PARENT
    Route::middleware('can:parent')->group(function () {
        Route::get('/parent/dashboard', function () {
            $student = auth()->user()->student;
            return view('parent.dashboard', compact('student'));
        })->name('parent.dashboard');

        Route::view('/parent/notifications', 'parent.notifications')->name('notifications.index');
    });

    // ✅ OTP
    Route::get('/otp', [OtpController::class, 'showForm'])->name('otp.form');
    Route::post('/otp/send', [OtpController::class, 'send'])->name('otp.send');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');

    // ✅ DEBUG / TEST ROUTES
    Route::get('/session-test', fn () => tap(session(['test' => 'value']), fn () => 'Session set.'));
    Route::get('/session-check', fn () => session('test', 'nothing found'));
    Route::get('/test-role', fn () => auth()->user()->hasRole('super_admin') ? 'Role check works!' : abort(403));
    Route::get('/middleware-debug', fn () => response()->json(array_keys(App::make(Router::class)->getMiddleware())));
});

// ✅ MANUAL LOGOUT
Route::post('/custom-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('custom.logout');
