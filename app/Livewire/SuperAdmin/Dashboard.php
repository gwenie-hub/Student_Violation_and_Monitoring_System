<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;
use App\Models\Student;
use App\Models\Violation;

class Dashboard extends Component
{
    public $totalUsers = 0;
    public $totalStudents = 0;
    public $totalViolations = 0;

    public function mount()
    {
        $this->totalUsers = User::count();
        $this->totalStudents = Student::count();
        $this->totalViolations = Violation::count();
    }

    public function render()
    {
        return view('livewire.super-admin.dashboard');
    }
}
