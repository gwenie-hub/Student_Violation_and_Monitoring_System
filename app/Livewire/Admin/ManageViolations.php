<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Violation;
use App\Models\Student;

class ManageViolations extends Component
{
    public $violations;

    public function mount()
    {
        $this->violations = Violation::with('student')->latest()->get();
    }

    public function acceptViolation($id)
    {
        $violation = Violation::findOrFail($id);
        $violation->status = 'accepted';
        $violation->save();
        $this->mount();
    }

    public function declineViolation($id)
    {
        $violation = Violation::findOrFail($id);
        $violation->status = 'declined';
        $violation->save();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.manage-violations');
    }
}
