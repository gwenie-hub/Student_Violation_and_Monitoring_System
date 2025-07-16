<?php

namespace App\Http\Livewire\Disciplinary;

use Livewire\Component;
use App\Models\StudentViolation;

class ViolationRecords extends Component
{
    public $type;

    public function render()
    {
        $query = StudentViolation::whereRaw('LOWER(status) = ?', ['approved']);

        if ($this->type) {
            $query->whereRaw('LOWER(offense_type) = ?', [strtolower($this->type)]);
        }

        $violations = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.disciplinary.violation-records', [
            'violations' => $violations,
        ]);
    }

    public function filter()
    {
        // Just triggers re-render with current filter
    }

    public function resetFilters()
    {
        $this->type = null;
    }
}
