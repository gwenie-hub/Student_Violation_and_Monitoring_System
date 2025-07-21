<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentViolation;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    // Store new student
    public function store(Request $request)
    {
        $request->validate([
            'Student_ID' => ['required', 'regex:/^[0-9]{4}-[0-9]{5}$/', 'unique:student_records,Student_ID'],
            'Last_Name' => 'required|string|max:255',
            'First_Name' => 'required|string|max:255',
            'Middle_Name' => 'nullable|string|max:255',
            'Course' => 'required|in:BSIT,BSBA,BSAIS,BSED',
            'Major' => 'nullable|string|max:255',
            'Year_and_Section' => ['required', 'regex:/^[1-4][A-G]$/'],
            'Student_Email' => 'required|email',
            'Parent_Email' => 'required|email',
        ]);

        $student = new StudentViolation();
        $student->Student_ID = $request->Student_ID;
        $student->Last_Name = $request->Last_Name;
        $student->First_Name = $request->First_Name;
        $student->Middle_Name = $request->Middle_Name;
        $student->Course = $request->Course;
        $student->Major = $request->Major;
        $student->Year_and_Section = $request->Year_and_Section;
        $student->Student_Email = $request->Student_Email;
        $student->Parent_Email = $request->Parent_Email;
        $student->save();

        return redirect()->back()->with('success', 'Student added successfully!');
    }
    // Show the edit form (not used in modal, but route exists)
    public function edit($student)
    {
        $student = StudentViolation::where('Student_ID', $student)->firstOrFail();
        return view('admin.edit-student', compact('student'));
    }

    // Update student info from modal form
    public function update(Request $request, $student)
    {
        $request->validate([
            'Student_ID' => ['required', 'regex:/^[0-9]{4}-[0-9]{5}$/'],
            'Last_Name' => 'required|string|max:255',
            'First_Name' => 'required|string|max:255',
            'Middle_Name' => 'nullable|string|max:255',
            'Course' => 'required|in:BSIT,BSBA,BSAIS,BSED',
            'Major' => 'nullable|string|max:255',
            'Year_and_Section' => ['required', 'regex:/^[1-4][A-G]$/'],
            'Student_Email' => 'required|email',
            'Parent_Email' => 'required|email',
        ]);

        $studentModel = StudentViolation::where('Student_ID', $student)->firstOrFail();
        $studentModel->Student_ID = $request->Student_ID;
        $studentModel->Last_Name = $request->Last_Name;
        $studentModel->First_Name = $request->First_Name;
        $studentModel->Middle_Name = $request->Middle_Name;
        $studentModel->Course = $request->Course;
        $studentModel->Major = $request->Major;
        $studentModel->Year_and_Section = $request->Year_and_Section;
        $studentModel->Student_Email = $request->Student_Email;
        $studentModel->Parent_Email = $request->Parent_Email;
        $studentModel->save();

        return redirect()->route('admin.dashboard')->with('success', 'Student updated successfully!');
    }

    // Delete student (already exists in your routes)
    public function destroy($student)
    {
        $studentModel = StudentViolation::where('Student_ID', $student)->firstOrFail();
        $studentModel->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Student deleted successfully!');
    }
}
