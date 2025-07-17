<?php

namespace App\Livewire;
use App\Models\SystemLog;

use Livewire\Component;
use App\Models\StudentViolation;
use Illuminate\Support\Facades\Auth;
class ViolationForm extends Component
{
    public $student_id;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $course;
    public $year_section;
    public $violation;
    public $offense_type;

    protected $rules = [
        'student_id'    => 'required|numeric',
        'last_name'     => 'required|string',
        'first_name'    => 'required|string',
        'middle_name'   => 'nullable|string',
        'course'        => 'required|string',
        'year_section'  => 'required|string',
        'violation'     => 'required|string',
        'offense_type'  => 'required|in:Minor,Major',
    ];

    public function submit()
    {
        $this->validate();

        $violation = StudentViolation::create([
            'student_id'    => $this->student_id,
            'last_name'     => $this->last_name,
            'first_name'    => $this->first_name,
            'middle_name'   => $this->middle_name,
            'course'        => $this->course,
            'year_section'  => $this->year_section,
            'violation'     => $this->violation,
            'offense_type'  => $this->offense_type,
            'status'        => 'pending',
            'reported_by'   => Auth::id(),
        ]);

        // Log creation
        SystemLog::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name ?? (Auth::user()->fname . ' ' . Auth::user()->lname),
            'action' => 'created student violation ID: ' . $violation->id,
        ]);

        session()->flash('success', 'Violation submitted successfully.');

        $this->reset(); // optional: reset form fields
    }

    public function render()
    {
        return view('livewire.violation-form');
    }
}
