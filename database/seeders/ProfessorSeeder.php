<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ProfessorSeeder extends Seeder
{
    public function run(): void
    {
        // Create or get the 'professor' role
        $role = Role::firstOrCreate(['name' => 'professor']);

        // Try to find existing user
        $user = User::where('email', 'philippedelgado75@gmail.com')->first();

        if (! $user) {
            // If user doesn't exist, create
            $user = User::create([
                'email' => 'philippedelgado75@gmail.com',
                'fname' => 'Professor',
                'mname' => 'Philippe',
                'lname' => 'Delgado',
                'password' => bcrypt('123papamo'),
            ]);
        } else {
            // If user exists, update name fields if needed
            $user->update([
                'fname' => 'Professor',
                'mname' => 'Philippe',
                'lname' => 'Delgado',
            ]);
        }

        // Assign role if not already assigned
        if (! $user->hasRole('professor')) {
            $user->assignRole($role);
        }
    }
}
