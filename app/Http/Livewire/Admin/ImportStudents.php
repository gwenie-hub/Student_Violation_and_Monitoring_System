<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Student;

class ImportStudents extends Component
{
    use WithFileUploads;

    public $csv_file;

    public function import()
    {
        $this->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $path = $this->csv_file->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $header = array_map('strtolower', $data[0]);
        unset($data[0]);

        foreach ($data as $row) {
            $row = array_combine($header, $row);

            if (!isset($row['name']) || !isset($row['section']) || !isset($row['parent_email'])) {
                continue;
            }

            Student::create([
                'name' => $row['name'],
                'section' => $row['section'],
                'parent_email' => $row['parent_email'],
            ]);
        }

        session()->flash('message', 'Students imported successfully!');
        $this->csv_file = null;
    }

    public function render()
    {
        return view('livewire.admin.import-students');
    }
}
