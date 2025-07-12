<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\ViolationController;
use App\Models\{User, Student, Violation, SystemLog};
use App\Http\Livewire\{
    ViolationForm,
    Admin\UserManagement,
    Admin\StudentManagement,
    Admin\ManageViolations as AdminManageViolations,
    Admin\RoleManagement,
    Counselor\CounselingReports,
    SuperAdmin\AddUser,
    SuperAdmin\StudentRecords
};

// 🏠 Welcome Page
Route::get('/', fn() => view('welcome'));

// 🚪 Auth Redirection Logic
Route::get('/dashboard', function () {
    $user = auth()->user();
    return match (true) {
        $user->hasRole('super_admin') => redirect()->route('superadmin.dashboard'),
        $user->hasRole('school_admin') => redirect()->route('admin.dashboard'),
        $user->hasRole('professor') => redirect()->route('professor.dashboard'),
        $user->hasRole('guidance_counselor') => redirect()->route('counselor.dashboard'),
        $user->hasRole('parent') => redirect()->route('parent.dashboard'),
        $user->hasRole('disciplinary_committee') => redirect()->route('disciplinary.dashboard'),
        default => abort(403),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    // ✅ SUPER ADMIN
    Route::prefix('super-admin')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()?->hasRole('super_admin'), 403);
    
            return view('super-admin.dashboard', [
                'totalUsers' => User::count(),
                'totalStudents' => Student::count(),
                'totalViolations' => Violation::count(),
            ]);
        })->name('superadmin.dashboard');

        Route::get('/users/create', AddUser::class)->name('superadmin.add-user');

        Route::get('/users/manage', function () {
            abort_unless(auth()->user()->hasRole('super_admin'), 403);
            return view('super-admin.manage-accounts');
        })->name('superadmin.manage-accounts');

        Route::get('/student_records', StudentRecords::class)->name('superadmin.student-records');

        Route::get('/system/logs', function () {
            $logs = SystemLog::with('user')->latest()->paginate(10);
            return view('super-admin.system-logs', compact('logs'));
        })->name('superadmin.system-logs');        

       Route::get('/reports', function () {
    $reports = Violation::with('student')->latest()->paginate(10);
    return view('super-admin.reports-status', compact('reports'));
})->name('superadmin.reports-status');
;

        Route::get('/reports/redirect', fn () => redirect()->route('superadmin.reports-status'))->name('reports.index');
    });

    // ✅ SCHOOL ADMIN
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('school_admin'), 403);
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/users', UserManagement::class)->name('admin.users');
        Route::get('/students', StudentManagement::class)->name('admin.students');
        Route::get('/violations', AdminManageViolations::class)->name('admin.violations');
        Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
        Route::get('/roles', RoleManagement::class)->name('admin.roles');
        });

        Route::get('/violations/status/{status}', [ViolationController::class, 'filterByStatus'])->name('violations.status');
    });

    // ✅ PROFESSOR
    Route::prefix('professor')->group(function () {
        Route::get('/', function () {
            abort_unless(auth()->user()->hasRole('professor'), 403);
            $violations = \App\Models\Violation::with('student')
                            ->where('reported_by', auth()->id())
                            ->latest()
                            ->paginate(10);
            return view('professor.dashboard', compact('violations'));
        })->name('professor.dashboard');
    
        Route::get('/violations/create', function () {
            return view('professor.violations.create');
        })->name('violations.create');

        Route::get('/admin/violations/pending', \App\Http\Livewire\Admin\PendingViolations::class)
            ->name('admin.violations.pending');
        Route::get('/violations', [ViolationController::class, 'index'])->name('violations.index');
        Route::get('/violations/mine', [ViolationController::class, 'myViolations'])->name('violations.my');
    });
    

    // ✅ DISCIPLINARY COMMITTEE
    Route::prefix('disciplinary')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('disciplinary_committee'), 403);
            return view('disciplinary.dashboard');
        })->name('disciplinary.dashboard');

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
    Route::prefix('counselor')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('guidance_counselor'), 403);
            return view('counselor.dashboard');
        })->name('counselor.dashboard');

        Route::get('/reports', CounselingReports::class)->name('counselor.reports');
    });

    // ✅ PARENT
    Route::prefix('parent')->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->hasRole('parent'), 403);
            $student = auth()->user()->student;
            return view('parent.dashboard', compact('student'));
        })->name('parent.dashboard');

        Route::view('/notifications', 'parent.notifications')->name('notifications.index');
    });

    // ✅ OTP Routes
    Route::get('/otp', [OtpController::class, 'showForm'])->name('otp.form');
    Route::post('/otp/send', [OtpController::class, 'send'])->name('otp.send');
    Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify');

    // ✅ Manual Logout
    Route::post('/custom-logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('custom.logout');
});
