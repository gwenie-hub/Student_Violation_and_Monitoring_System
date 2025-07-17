<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\Disciplinary\ParentNotificationController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use App\Models\{User, Student, Violation, SystemLog};
use App\Http\Livewire\{
    ViolationForm,
    Admin\UserManagement,
    Admin\ManageViolations,
    Admin\StudentManagement,
    Admin\ManageViolations as AdminManageViolations,
    Admin\RoleManagement,
    Counselor\CounselingReports,
    SuperAdmin\AddUser,
    SuperAdmin\StudentRecords
};

use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\StudentViolationController;
use App\Livewire\Admin\ApprovedViolations;
use App\Livewire\Admin\PendingViolations;
use App\Livewire\Admin\ViolationStatusView;
use App\Livewire\Admin\AllViolations;
use App\Models\StudentViolation;
use App\Http\Livewire\Disciplinary\ViolationRecords;
use App\Http\Livewire\SuperAdmin\ManageAccounts;

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


// 2FA Recovery
use App\Http\Controllers\Auth\Recover2FAController;
Route::get('/recover-2fa', [Recover2FAController::class, 'showForm'])->middleware('guest')->name('2fa.recover.form');
Route::post('/recover-2fa', [Recover2FAController::class, 'recover'])->middleware('guest')->name('2fa.recover');

Route::get('/two-factor-challenge', fn () => view('auth.two-factor-challenge'))
    ->middleware('guest')
    ->name('two-factor.login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    // ✅ SUPER ADMIN
    Route::prefix('super-admin')->middleware(['auth'])->name('superadmin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/users/create', fn() => view('super-admin.users.create'))->name('add-user');
        Route::get('/users/manage', fn() => view('super-admin.manage-accounts'))->name('manage-accounts');
        Route::get('/student_records', StudentRecords::class)->name('student-records');
        Route::get('/system/logs', fn() => view('super-admin.system-logs', ['logs' => SystemLog::with('user')->latest()->paginate(10)]))->name('system-logs');
        Route::get('/settings', fn() => view('profile.show'))->name('settings');
        Route::get('/manage-accounts', ManageAccounts::class)
        ->name('manage-accounts');
    });

    // ✅ SCHOOL ADMIN
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
        Route::get('/users', UserManagement::class)->name('users');
        Route::get('/student-violations', [\App\Http\Controllers\StudentViolationController::class, 'index'])->name('student-violations');
        Route::get('/violations', AllViolations::class)->name('violations');
        Route::get('/roles', RoleManagement::class)->name('roles');
        Route::get('/violations/{status}', ViolationStatusView::class)->whereIn('status', ['pending', 'approved'])->name('violations.status');
        Route::get('/settings', fn() => view('profile.show'))->name('settings');
    });

    // ✅ PROFESSOR
    Route::prefix('professor')->name('professor.')->group(function () {
        Route::get('/dashboard', fn() => view('professor.dashboard', [
            'violations' => \App\Models\StudentViolation::where('status', 'approved')->latest()->paginate(10),
        ]))->name('dashboard');

        Route::get('/violations/create', fn() => view('professor.violations.create'))->name('violations.create');
        Route::get('/violations', [StudentViolationController::class, 'index'])->name('violations.index');
        Route::get('/violations/mine', [ViolationController::class, 'myViolations'])->name('violations.my');
        Route::delete('/violations/{id}', [ViolationController::class, 'destroy'])->name('violations.destroy');
        Route::get('/settings', fn() => view('profile.show'))->name('settings');
    });

            // ✅ DISCIPLINARY COMMITTEE
    Route::prefix('disciplinary')->name('disciplinary.')->middleware(['auth'])->group(function () {
        Route::get('/dashboard', fn() => view('disciplinary.dashboard'))->name('dashboard');

        Route::get('/violations', \App\Livewire\Disciplinary\ViolationRecords::class)->name('violations');

        Route::get('/violations/{violation}/edit', function ($violation) {
            $violation = StudentViolation::findOrFail($violation);
            return view('disciplinary.edit', compact('violation'));
        })->name('edit');

        // ✅ Redirect to dashboard after update
        Route::put('/violations/{violation}', function (Request $request, $violation) {
            $request->validate(['sanction' => 'required|string']);

            $violation = StudentViolation::findOrFail($violation);
            $violation->sanction = $request->sanction;
            $violation->notify_status = 'success';
            $violation->save();

            return redirect()->route('disciplinary.dashboard')->with('success', 'Sanction updated successfully.');
        })->name('update');

        Route::get('/sanctions/apply', function () {
            $violations = StudentViolation::whereNull('sanction')
                ->where('status', 'approved')
                ->latest()
                ->get();

            return view('disciplinary.apply-sanction', compact('violations'));
        })->name('sanctions.apply');

        Route::post('/sanctions/apply', function (Request $request) {
            $request->validate([
                'violation_id' => 'required|exists:student_violations,id',
                'sanction' => 'required|string|max:255',
            ]);

            $violation = StudentViolation::findOrFail($request->violation_id);
            $violation->sanction = $request->sanction;
            $violation->notify_status = 'success';
            $violation->save();

            return redirect()->route('disciplinary.dashboard')->with('success', 'Sanction applied successfully.');
        })->name('sanctions.apply.post');

        Route::get('/notify-parents', [ParentNotificationController::class, 'showForm'])->name('notify.parents');
        Route::post('/notify-parents/send', [ParentNotificationController::class, 'sendEmail'])->name('notify.parents.send');
        
        Route::get('/settings', fn() => view('profile.show'))->name('settings');
    });

    // ✅ GUIDANCE COUNSELOR
    Route::prefix('counselor')->name('counselor.')->group(function () {
        Route::get('/dashboard', fn() => view('counselor.dashboard'))->name('dashboard');
        Route::get('/reports', CounselingReports::class)->name('reports');
        Route::get('/settings', fn() => view('profile.show'))->name('settings');
    });

    // ✅ PARENT
    Route::prefix('parent')->name('parent.')->group(function () {
        Route::get('/dashboard', fn() => view('parent.dashboard', ['student' => auth()->user()->student]))->name('dashboard');
        Route::view('/notifications', 'parent.notifications')->name('notifications.index');
        Route::get('/settings', fn() => view('profile.show'))->name('settings');
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