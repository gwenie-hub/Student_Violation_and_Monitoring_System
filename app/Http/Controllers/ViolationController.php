<?php
namespace App\Http\Controllers;
use App\Models\SystemLog;

use Illuminate\Http\Request;
use App\Models\Violation;
use App\Models\User;
use App\Models\StudentViolation;
use Illuminate\Support\Facades\Auth;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::with(['student', 'reporter'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('disciplinary.violations', compact('violations'));
    }


    public function myViolations()
    {
        $userId = Auth::id();

        $violations = StudentViolation::where('reported_by', $userId)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('professor.violations.my-submissions', compact('violations'));
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

        $violation = Violation::create([
            'student_id' => $request->student_id,
            'description' => $request->description,
            'severity_level' => $request->severity_level,
            'color' => $colorMap[$request->severity_level] ?? 'gray',
        ]);

        // Log creation
        SystemLog::create([
            'user_id' => auth()->id(),
            'name' => auth()->user()->name ?? (auth()->user()->fname . ' ' . auth()->user()->lname),
            'action' => 'created violation ID: ' . $violation->id,
        ]);

        return redirect()->route('violations.index');
    }

    public function filterByStatus($status)
    {
    $violations = Violation::where('status', $status)->get();

    return view('violations.filtered', compact('violations', 'status'));
    }

    public function destroy($id)
    {
        $violation = \App\Models\StudentViolation::findOrFail($id);
        $violation->delete();

        // Log deletion
        SystemLog::create([
            'user_id' => auth()->id(),
            'name' => auth()->user()->name ?? (auth()->user()->fname . ' ' . auth()->user()->lname),
            'action' => 'deleted violation ID: ' . $id,
        ]);

        return redirect()->back()->with('success', 'Violation deleted successfully.');
    }
    

}
    