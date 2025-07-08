<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Violation;

class ManageViolations extends Component
{
    public $filter = null;

    public function accept($violationId)
    {
        Violation::where('id', $violationId)->update(['status' => 'accepted']);
    }

    public function decline($violationId)
    {
        Violation::where('id', $violationId)->update(['status' => 'declined']);
    }

    public function render()
    {
        $violations = Violation::with('student')
            ->when($this->filter, fn($query) => $query->where('type', $this->filter))
            ->latest()->get();

        return view('livewire.admin.manage-violations', compact('violations'));
    }
}
