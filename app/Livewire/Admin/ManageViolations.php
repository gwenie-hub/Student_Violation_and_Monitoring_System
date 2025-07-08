<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Violation;

class ManageViolations extends Component
{
    public $violations;
    public $filterType = 'all';

    public $editId;
    public $editType;
    public $editDescription;

    public function mount()
    {
        $this->loadViolations();
    }

    public function updatedFilterType()
    {
        $this->loadViolations();
    }

    public function loadViolations()
    {
        $query = Violation::with('student')->latest();
        if ($this->filterType !== 'all') {
            $query->where('type', $this->filterType);
        }
        $this->violations = $query->get();
    }

    public function updateStatus($id, $status)
    {
        $violation = Violation::findOrFail($id);
        $violation->status = $status;
        $violation->save();

        $this->loadViolations();
        session()->flash('message', 'Violation status updated.');
    }

    public function edit($id)
    {
        $violation = Violation::findOrFail($id);
        $this->editId = $violation->id;
        $this->editType = $violation->type;
        $this->editDescription = $violation->description;
    }

    public function saveEdit()
    {
        $this->validate([
            'editType' => 'required|in:major,minor',
            'editDescription' => 'required|string|max:500',
        ]);

        $violation = Violation::findOrFail($this->editId);
        $violation->type = $this->editType;
        $violation->description = $this->editDescription;
        $violation->save();

        $this->reset(['editId', 'editType', 'editDescription']);
        $this->loadViolations();
        session()->flash('message', 'Violation updated successfully.');
    }

    public function cancelEdit()
    {
        $this->reset(['editId', 'editType', 'editDescription']);
    }

    public function render()
    {
        return view('livewire.admin.manage-violations');
    }
}
