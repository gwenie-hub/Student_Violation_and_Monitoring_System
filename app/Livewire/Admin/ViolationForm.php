<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Violation;
use App\Models\Student;

class ViolationForm extends Component
{
    public $student_id, $offense, $type;

    public function submit()
    {
        $this->validate([
            'student_id' => 'required|exists:students,id',
            'offense' => 'required|string|max:255',
            'type' => 'required|in:major,minor',
        ]);

        Violation::create([
            'student_id' => $this->student_id,
            'offense' => $this->offense,
            'type' => $this->type,
            'status' => 'pending'
        ]);

        session()->flash('message', 'Violation submitted.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.violation-form', [
            'students' => Student::all()
        ]);
    }
}
