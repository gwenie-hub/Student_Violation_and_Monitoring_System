<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use App\Models\StudentViolation;

class DashboardController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user()?->hasRole('super_admin'), 403);

        $totalUsers = User::count();
        $totalViolations = StudentViolation::count();

        return view('super-admin.dashboard', compact('totalUsers', 'totalViolations'));
    }
}
