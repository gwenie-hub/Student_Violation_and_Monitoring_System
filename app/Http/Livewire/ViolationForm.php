<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\StudentViolation;
use Illuminate\Support\Facades\Auth;

class ViolationForm extends Component
{
    public $student_id = '';
    public $last_name = '';
    public $first_name = '';
    public $middle_name = '';
    public $course = '';
    public $year_section = '';
    public $violation = '';
    public $offense_type = '';

    public function mount()
    {
        // Optional: Set default values here
        $this->offense_type = 'Minor'; // default to Minor
    }

    public function submit()
    {
        $this->validate([
            'student_id' => 'required|numeric|exists:users,id',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'course' => 'required|string|max:255',
            'year_section' => 'required|string|max:255',
            'violation' => 'required|string|max:255',
            'offense_type' => 'required|in:Minor,Major',
        ]);

        // Only professors can submit
        abort_unless(Auth::user()->hasRole('professor'), 403);

        StudentViolation::create([
            'student_id'    => $this->student_id,
            'last_name'     => $this->last_name,
            'first_name'    => $this->first_name,
            'middle_name'   => $this->middle_name,
            'course'        => $this->course,
            'year_section'  => $this->year_section,
            'violation'     => $this->violation,
            'offense_type'  => $this->offense_type,
            'status'        => 'pending', // default status
            'professor_id'  => Auth::id(), // add professor ID
        ]);

        session()->flash('success', 'Violation submitted successfully!');
        $this->dispatchBrowserEvent('violation-submitted');
        // Optionally reset form after submit
        $this->reset([
            'student_id',
            'last_name',
            'first_name',
            'middle_name',
            'course',
            'year_section',
            'violation',
            'offense_type',
        ]);
    }

    public function render()
    {
        return view('livewire.violation-form');
    }
}
