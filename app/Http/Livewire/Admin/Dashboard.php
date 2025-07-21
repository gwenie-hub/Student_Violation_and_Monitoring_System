<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Student;
use App\Models\Violation;

class Dashboard extends Component
{
    public $totalUsers = 0;
    public $totalStudents = 0;
    public $totalViolations = 0;

    public function render()
    {
        $students = \App\Models\StudentViolation::latest()->paginate(10);
        return view('livewire.admin.dashboard', compact('students'));
    }
}
