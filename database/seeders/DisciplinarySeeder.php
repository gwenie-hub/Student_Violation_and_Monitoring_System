<?php

// database/seeders/DisciplinarySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DisciplinarySeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::firstOrCreate(['name' => 'disciplinary_committee', 'guard_name' => 'web']);

        $user = User::firstOrCreate(
            ['email' => 'disciplinary@example.com'],
            [
                'fname' => 'Disciplinary',
                'mname' => 'Committee',
                'lname' => 'Member',
                'password' => Hash::make('password'), // Change for prod
            ]
        );

        $user->assignRole($role);
    }
}

