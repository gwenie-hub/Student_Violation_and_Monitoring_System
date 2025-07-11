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

    public function mount()
    {
        try {
            $this->totalUsers = User::whereHas('roles', fn ($q) => $q->where('name', '!=', 'super_admin'))->count();
            $this->totalStudents = Student::count();
            $this->totalViolations = Violation::count();
        } catch (\Exception $e) {
            $this->addError('load', 'Error loading dashboard statistics.');
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
