<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violation;
use App\Models\User;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::with('student')->get();
        return view('violations.index', compact('violations'));
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
            'low' => 'green',
            'medium' => 'orange',
            'high' => 'red',
        ];

        Violation::create([
            'student_id' => $request->student_id,
            'description' => $request->description,
            'severity_level' => $request->severity_level,
            'color' => $colorMap[$request->severity_level] ?? 'gray',
        ]);

        return redirect()->route('violations.index');
    }
}
    