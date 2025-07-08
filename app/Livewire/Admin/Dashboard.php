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
    public $hasLoadError = false;

    public function mount()
    {
        // Fetch data safely
        try {
            $this->totalUsers = User::count();
            $this->totalStudents = Student::count();
            $this->totalViolations = Violation::count();
        } catch (\Exception $e) {
            $this->hasLoadError = true;
        }
    }

    public function authorize()
    {
        // Laravel 12+ Livewire supports this for auth checks
        abort_unless(auth()->user()?->hasRole('school_admin'), 403);
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'hasLoadError' => $this->hasLoadError
        ]);
    }
}
