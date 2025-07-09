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
        $query = Violation::query();

        if ($this->filter === 'major') {
            $query->where('type', 'major');
        } elseif ($this->filter === 'minor') {
            $query->where('type', 'minor');
        }

        $violations = $query->orderBy('created_at', 'desc')->get();

        return view('livewire.admin.manage-violations', compact('violations'));
    }
}
