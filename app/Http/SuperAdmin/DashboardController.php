<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Violation;

class DashboardController extends Controller
{
    /**
     * Display the super admin dashboard with violation data.
     */
    public function index()
    {
        // Load violations with related student and reporter data
        $violations = Violation::with(['student', 'reporter'])->latest()->paginate(10);

        // Return the dashboard view with the data
        return view('super-admin.dashboard', compact('violations'));
    }
}
