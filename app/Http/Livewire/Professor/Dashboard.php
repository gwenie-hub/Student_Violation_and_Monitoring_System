<?php

namespace App\Http\Livewire\Professor;

use Livewire\Component;
use App\Models\Violation;

class Dashboard extends Component
{
    public $search = '';

    public function render()
    {
        $violations = Violation::with('student')
            ->whereHas('student', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.professor.dashboard', compact('violations'));
    }
}
