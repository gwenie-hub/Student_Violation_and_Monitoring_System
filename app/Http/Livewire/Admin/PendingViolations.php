<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Violation;
use Illuminate\Support\Facades\Auth;

class PendingViolations extends Component
{
    public function approve($violationId)
    {
        $violation = Violation::findOrFail($violationId);
        $violation->status = 'approved';
        $violation->approved_by = Auth::id();
        $violation->approved_at = now();
        $violation->save();

        session()->flash('message', 'Violation approved successfully.');
    }

    public function decline($violationId)
    {
        $violation = Violation::findOrFail($violationId);
        $violation->status = 'declined';
        $violation->save();

        session()->flash('message', 'Violation declined.');
    }

    public function render()
    {
        $violations = Violation::where('status', 'pending')
            ->with('student')
            ->latest()
            ->get();

        return view('livewire.admin.pending-violations', compact('violations'));
    }
}
