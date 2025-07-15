<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ParentSeeder extends Seeder
{
    public function run(): void
    {
        // Make sure role exists
        $role = Role::firstOrCreate(['name' => 'parent', 'guard_name' => 'web']);

        // Avoid duplicate seeding
        $existing = User::where('email', 'parent@example.com')->first();
        if (!$existing) {
            $parentUser = User::create([
                'fname' => 'Parent',
                'mname' => 'Of',
                'lname' => 'Student',
                'email' => 'parent@example.com',
                'password' => Hash::make('password'), // 🔒 Change in production!
            ]);

            $parentUser->assignRole($role);        
        }
    }
}
