<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\StudentViolation;

class ViolationStatusView extends Component
{
    public $status;

    public function mount($status)
    {
        $this->status = $status;
    }

    public function approve($id)
    {
        $violation = StudentViolation::findOrFail($id);
        if ($violation->status === 'pending') {
            $violation->update(['status' => 'approved']);
        }
    }

    public function reject($id)
    {
        $violation = StudentViolation::findOrFail($id);
        $violation->update(['status' => 'declined']);
        session()->flash('message', 'Violation has been rejected.');
    }

    public function delete($id)
    {
        StudentViolation::findOrFail($id)->delete();
        session()->flash('message', 'Violation deleted successfully.');
    }

    public function render()
    {
        $violations = StudentViolation::where('status', $this->status)
            ->latest()
            ->get();

        return view('livewire.admin.violation-status-view', [
            'violations' => $violations,
            'status' => $this->status,
        ]);
    }
}
