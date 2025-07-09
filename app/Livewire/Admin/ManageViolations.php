<?php

namespace App\Http\Livewire\Admin;

use Livewire\Features\SupportComponentTraits\Component as BaseComponent;
use App\Models\Violation;

class ManageViolations extends BaseComponent
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

        $violations = $query->latest()->get();

        return view('livewire.admin.manage-violations', compact('violations'));
    }
}
