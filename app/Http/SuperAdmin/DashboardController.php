<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Violation;

class DashboardController extends Controller
{
    public function index()
    {
        $violations = Violation::with(['student', 'reporter'])->latest()->paginate(10);
        return view('super-admin.dashboard', compact('violations'));
    }
}
