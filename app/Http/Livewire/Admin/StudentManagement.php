<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use Livewire\Component;

class StudentManagement extends Component
{
    public $name, $section, $parent_email;

    public function addStudent()
    {
        Student::create([
            'name' => $this->name,
            'section' => $this->section,
            'parent_email' => $this->parent_email,
        ]);

        $this->reset(['name', 'section', 'parent_email']);
    }

    public function render()
    {
        return view('livewire.admin.student-management', [
            'students' => Student::all()
        ]);
    }
}
