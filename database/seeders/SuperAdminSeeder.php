<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure the role exists
        Role::firstOrCreate(['name' => 'super_admin']);

        // Create or update the user
        User::updateOrInsert(
            ['email' => 'lezzahgwenn@gmail.com'], // unique identifier
            [
                'fname' => 'Super',
                'mname' => 'Admin',
                'lname' => 'Gwenn',
                'password' => Hash::make('gwen100803'),
            ]
        );

        // Retrieve the user
        $user = User::where('email', 'lezzahgwenn@gmail.com')->first();

        // Assign role if not already assigned
        if (!$user->hasRole('super_admin')) {
            $user->assignRole('super_admin');
        }
    }
    
}
