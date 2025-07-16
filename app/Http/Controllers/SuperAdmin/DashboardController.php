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
        $totalUsers = User::count();
        $totalStudents = Student::count();
        $totalViolations = StudentViolation::count();

        return view('super-admin.dashboard', compact('totalUsers', 'totalStudents', 'totalViolations'));
    }
}
