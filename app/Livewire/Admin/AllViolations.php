<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\StudentViolation;

class AllViolations extends Component
{
    public function render()
    {
        $violations = StudentViolation::latest()->get();

        return view('livewire.admin.all-violations', [
            'violations' => $violations,
        ]);
    }
}
