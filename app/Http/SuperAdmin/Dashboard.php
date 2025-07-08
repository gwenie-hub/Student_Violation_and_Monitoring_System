<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;
use App\Models\Student;
use App\Models\Violation;

class Dashboard extends Component
{
    public $totalUsers;
    public $totalStudents;
    public $totalViolations;

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
