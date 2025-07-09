<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Student;

class ParentSeeder extends Seeder
{
    public function run(): void
    {
        // Create the student (NO login, just a record)
        $student = Student::create([
            'student_number' => 'S' . Str::random(5),
        ]);

        // Create the parent user
        $parent = User::create([
            'name' => 'Parent User',
            'email' => 'parent@example.com',
            'password' => Hash::make('password'),
            'student_id' => $student->id, // Link to student
        ]);

        // Assign role to parent
        $parent->assignRole('parent');
    }
}
