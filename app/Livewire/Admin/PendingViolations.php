<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\StudentViolation;

class PendingViolations extends Component
{
    public function approve($id)
    {
        $violation = StudentViolation::findOrFail($id);
        if ($violation->status === 'pending') {
            $violation->status = 'approved';
            $violation->save();
        }
    }

    public function reject($id)
    {
        $violation = StudentViolation::findOrFail($id);
        if ($violation->status === 'pending') {
            $violation->status = 'rejected';
            $violation->save();
        }
    }

    public function delete($id)
    {
        $violation = StudentViolation::where('status', 'pending')->findOrFail($id);
        $violation->delete();
    }

    public function render()
    {
        // Just fetch pending records, no relations
        $violations = StudentViolation::where('status', 'pending')
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.admin.pending-violations', compact('violations'));
    }
}
