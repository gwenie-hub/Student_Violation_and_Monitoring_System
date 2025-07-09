<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ProfessorSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Safe: Create or get existing role
        $role = Role::firstOrCreate(['name' => 'professor']);

        // Create user
        $user = User::firstOrCreate(
            ['email' => 'philippedelgado75@gmail.com'],
            ['name' => 'Prof. Easy', 'password' => bcrypt('123papamo')]
        );

        // Assign role if not already assigned
        if (! $user->hasRole('professor')) {
            $user->assignRole($role);
        }
    }
}
