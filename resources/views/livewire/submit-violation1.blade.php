<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Violation;

class SubmitViolation extends Component
{
    public $student_id;
    public $description;

    public function submit()
    {
        $this->validate([
            'student_id' => 'required|exists:users,id',
            'description' => 'required|string|min:5',
        ]);

        Violation::create([
            'student_id' => $this->student_id,
            'description' => $this->description,
        ]);

        $this->reset(['student_id', 'description']);

        session()->flash('message', 'Violation submitted successfully!');
    }

    public function render()
    {
        return view('livewire.submit-violation', [
            'students' => User::where('role', 'student')->get()
        ]);
    }
}
