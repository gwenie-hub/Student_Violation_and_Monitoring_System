<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class StudentRecords extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteStudent($id)
    {
        $student = User::findOrFail($id);
        $student->delete();

        session()->flash('message', 'Student deleted successfully.');
    }

    public function render()
    {
        $students = User::whereHas('roles', fn ($q) => $q->where('name', 'student'))
            ->where(function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                      ->orWhere('email', 'like', "%{$this->search}%");
            })
            ->orderBy('name')
            ->paginate(5); // smaller page size to reduce memory load

            return view('livewire.super-admin.student-records', [
                'students' => $students,
            ]);
            
        
    }
}
