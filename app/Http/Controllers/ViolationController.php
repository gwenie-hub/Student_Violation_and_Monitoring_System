<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violation;
use App\Models\User;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::with(['student', 'reporter'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('disciplinary.violations', compact('violations'));
    }

    public function create()
    {
        $students = User::role('student')->get();
        return view('violations.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'severity_level' => 'required|in:low,medium,high',
        ]);

        $colorMap = [
            'Minor' => 'green',
            'Major' => 'red',
        ];

        Violation::create([
            'student_id' => $request->student_id,
            'description' => $request->description,
            'severity_level' => $request->severity_level,
            'color' => $colorMap[$request->severity_level] ?? 'gray',
        ]);

        return redirect()->route('violations.index');
    }

    public function myViolations()
    {
        $violations = Violation::where('reported_by', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('professor.violations.index', compact('violations'));
    }

    public function filterByStatus($status)
    {
    $violations = Violation::where('status', $status)->get();

    return view('violations.filtered', compact('violations', 'status'));
    }

    public function destroy($id)
    {
    $violation = Violation::findOrFail($id);
    $violation->delete();

    return redirect()->back()->with('success', 'Violation deleted successfully.');
    }

}
    