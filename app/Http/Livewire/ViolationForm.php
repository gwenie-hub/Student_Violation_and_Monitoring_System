<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Violation;
use Illuminate\Support\Facades\Auth;

class ViolationForm extends Component
{
    public $description, $severity_level = 'low';

    protected $rules = [
        'description' => 'required|string|min:5',
        'severity_level' => 'required|in:low,medium,high',
    ];

    public function submit()
    {
        $this->validate();

        Violation::create([
            'student_id' => Auth::id(),
            'description' => $this->description,
            'severity_level' => $this->severity_level,
            'color' => $this->mapColor($this->severity_level),
        ]);

        session()->flash('message', 'Violation submitted successfully.');
        $this->reset();
    }

    private function mapColor($level)
    {
        return match ($level) {
            'low' => 'green',
            'medium' => 'orange',
            'high' => 'red',
            default => 'gray',
        };
    }

    public function render()
    {
        if (!Auth::user()->hasRole('professor')) {
            abort(403);
        }

        return view('livewire.violation-form');
    }
}
