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
        // ✅ Manually check if user has the 'school_admin' role
        abort_unless(auth()->user()?->hasRole('school_admin'), 403);

        try {
            $this->totalUsers = User::count();
            $this->totalStudents = Student::count();
            $this->totalViolations = Violation::count();
        } catch (\Exception $e) {
            // Optional: log error or handle gracefully
            $this->addError('load', 'Error loading dashboard statistics.');
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
