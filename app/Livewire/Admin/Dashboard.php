<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Student;
use App\Models\Violation;

class Dashboard extends Component
{
    public $totalStudents, $totalViolations;

    public function mount()
    {
        $this->totalStudents = Student::count();
        $this->totalViolations = Violation::count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
