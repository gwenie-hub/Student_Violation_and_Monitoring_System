<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StudentViolation;
use App\Models\ArchivedStudentViolation;

class StudentRecords extends Component
{
    use WithPagination;

    public $offenseType = '';

    protected $queryString = ['offenseType'];

    protected $listeners = [
        'filterByOffense' => 'setOffenseType',
        'archiveViolation' => 'archiveViolation',
    ];

    public function setOffenseType($value)
    {
        $this->offenseType = $value;
        $this->resetPage();
    }

    public function updatedOffenseType()
    {
        $this->resetPage();
    }

    public function archiveViolation($id)
    {
        $violation = StudentViolation::findOrFail($id);

        ArchivedStudentViolation::create([
            'student_id'    => $violation->student_id,
            'full_name'     => $violation->full_name,
            'course'        => $violation->course,
            'year_section'  => $violation->year_section,
            'violation'     => $violation->violation,
            'offense_type'  => $violation->offense_type,
            'sanction'      => $violation->sanction,
        ]);

        $violation->delete();

        session()->flash('message', 'Violation has been archived successfully.');
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
