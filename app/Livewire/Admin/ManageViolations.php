<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\StudentViolation;

class ManageViolations extends Component
{
    public $violations;

    public function mount()
    {
        $this->loadPendingViolations();
    }

    public function loadPendingViolations()
    {
        $this->violations = StudentViolation::where('status', 'pending')->get();
    }

    public function approve($id)
    {
        $violation = StudentViolation::find($id);
        if ($violation) {
            $violation->status = 'approved';
            $violation->save();

            session()->flash('message', 'Violation approved.');
            $this->loadPendingViolations();
        }
    }

    public function decline($id)
    {
        $violation = StudentViolation::find($id);
        if ($violation) {
            $violation->status = 'declined';
            $violation->save();

            session()->flash('message', 'Violation declined.');
            $this->loadPendingViolations();
        }
    }

    public function render()
    {
        return view('livewire.admin.manage-violations');
    }
}
