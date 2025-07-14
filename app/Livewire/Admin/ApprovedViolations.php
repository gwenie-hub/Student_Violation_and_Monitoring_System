<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\StudentViolation;

class ApprovedViolations extends Component
{
    public function render()
    {
        $violations = StudentViolation::with(['student', 'violationType'])
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('livewire.admin.approved-violations', compact('violations'));
    }
}
