<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Violation;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ParentSeeder extends Seeder
{
    public function run(): void
    {
        // Create Parent Role if it doesn't exist
        $parentRole = Role::firstOrCreate(['name' => 'parent']);

        // Create a Parent User
        $parent = User::create([
            'name' => 'Parent User',
            'email' => 'parent@example.com',
            'password' => Hash::make('password'), // use secure passwords in production
        ]);
        $parent->assignRole($parentRole);

        // Create Student and link to parent
        $student = Student::create([
            'user_id' => $parent->id,
            'name' => 'Child One',
            'email' => 'student@example.com',
            'grade_level' => 'Grade 10',
            'section' => 'A',
        ]);

        // Create 15 violations for pagination testing
        for ($i = 1; $i <= 15; $i++) {
            Violation::create([
                'student_id' => $student->id,
                'reported_by' => 1, // ID of any existing professor user
                'description' => "Violation #$i description",
                'status' => $i % 3 == 0 ? 'resolved' : ($i % 2 == 0 ? 'accepted' : 'pending'),
            ]);
        }
    }
}
