<?php

namespace App\Livewire\Disciplinary;

use Livewire\Component;
use App\Models\Violation;

class ViolationRecords extends Component
{
    public function render()
    {
        $violations = Violation::with('student')->latest()->get();

        return view('livewire.disciplinary.violation-records', compact('violations'));
    }
}
