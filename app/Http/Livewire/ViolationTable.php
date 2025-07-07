<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Violation;

class ViolationTable extends Component
{
    public $violations;

    public function mount()
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }

        $this->violations = Violation::with('student')->latest()->get();
    }

    public function render()
    {
        return view('livewire.violation-table');
    }
}
