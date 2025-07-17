<?php
namespace App\Http\Controllers;
use App\Models\SystemLog;

use Illuminate\Http\Request;
use App\Models\StudentViolation;
use Illuminate\Support\Facades\Auth;

class StudentViolationController extends Controller
{
    public function index()
    {
        // You can customize this to fetch violations as needed
        $violations = \App\Models\StudentViolation::with('student')->latest()->get();
        return view('admin.student-violations.index', compact('violations'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'student_id'    => 'required|exists:users,id',
            'last_name'     => 'required|string',
            'first_name'    => 'required|string',
            'middle_name'   => 'nullable|string',
            'course'        => 'required|string',
            'year_section'  => 'required|string',
            'violation'     => 'required|string',
            'offense_type'  => 'required|in:Minor,Major',
        ]);

        $violation = StudentViolation::create([
            'student_id'    => $request->student_id,
            'last_name'     => $request->last_name,
            'first_name'    => $request->first_name,
            'middle_name'   => $request->middle_name,
            'course'        => $request->course,
            'year_section'  => $request->year_section,
            'violation'     => $request->violation,
            'offense_type'  => $request->offense_type,
            'reported_by'   => Auth::id(),
        ]);

        // Log creation
        SystemLog::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name ?? (Auth::user()->fname . ' ' . Auth::user()->lname),
            'action' => 'created student violation ID: ' . $violation->id,
        ]);

        return redirect()->route('violations.my')->with('success', 'Violation submitted successfully.');
    }
}
