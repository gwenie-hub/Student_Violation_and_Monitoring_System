<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $students = \App\Models\StudentViolation::with('student')->latest()->paginate(10);
        return view('admin.dashboard', compact('students'));
    }
}
