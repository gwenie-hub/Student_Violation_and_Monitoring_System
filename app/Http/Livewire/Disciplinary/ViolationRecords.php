<?php

namespace App\Http\Livewire\Disciplinary;

use Livewire\Component;
use App\Models\Violation;

class ViolationRecords extends Component
{
    public function render()
    {
        return view('livewire.disciplinary.violation-records', [
            'violations' => Violation::with('student')->latest()->get(),
        ]);
    }
}
