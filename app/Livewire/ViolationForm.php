<?php

namespace App\Livewire;

use Livewire\Component;

class ViolationForm extends Component
{
    public $last_name;
    public $first_name;
    public $middle_name;
    public $course;
    public $year_section;
    public $violation;
    public $offense_type;

    public function submit()
    {
        $this->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'course' => 'required|string',
            'year_section' => 'required|string',
            'violation' => 'required|string',
            'offense_type' => 'required|in:Minor,Major',
        ]);

        // Save logic here...

        session()->flash('message', 'Violation submitted!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.violation-form');
    }
}
