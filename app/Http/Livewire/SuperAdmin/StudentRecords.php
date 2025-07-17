<?php
namespace App\Http\Livewire\SuperAdmin;
use App\Models\SystemLog;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StudentViolation;
use App\Models\ArchivedStudentViolation;

class StudentRecords extends Component
{
    use WithPagination;

    public $offenseType = '';

    protected $listeners = ['archiveViolation'];

    public function updatingOffenseType()
    {
        $this->resetPage();
    }

    public function archiveViolation($id)
    {
        $violation = StudentViolation::findOrFail($id);

        // Insert all fields into archive table
        $archiveData = $violation->toArray();
        unset($archiveData['id']); // Remove id to avoid conflict
        ArchivedStudentViolation::create($archiveData);

        // Log archive action
        SystemLog::create([
            'user_id' => auth()->id(),
            'name' => auth()->user()->name ?? (auth()->user()->fname . ' ' . auth()->user()->lname),
            'action' => 'archived violation ID: ' . $violation->id,
        ]);

        // Delete original
        $violation->delete();

        // Flash message for UI
        session()->flash('message', 'Violation has been archived successfully.');

        // Optional: dispatch to show toast in frontend (Livewire v3+)
        $this->dispatch('violationArchived');
    }

    public function render()
    {
        $query = StudentViolation::query();

        if (!empty($this->offenseType)) {
            $query->where('offense_type', $this->offenseType);
        }

        return view('livewire.super-admin.student-records', [
            'violations' => $query->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
