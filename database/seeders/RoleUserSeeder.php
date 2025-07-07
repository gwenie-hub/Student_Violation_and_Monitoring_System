<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'super_admin',
            'school_admin',
            'professor',
            'disciplinary_officer',
        ];

        foreach ($roles as $roleName) {
            // Create role
            $role = Role::firstOrCreate(['name' => $roleName]);

            // Create user
            $user = User::firstOrCreate(
                ['email' => "$roleName@example.com"],
                ['name' => ucfirst(str_replace('_', ' ', $roleName)), 'password' => bcrypt('password')]
            );

            // Assign role
            if (! $user->hasRole($roleName)) {
                $user->assignRole($role);
            }
        }

        // Optionally create a "parent" user if needed
        Role::firstOrCreate(['name' => 'parent']);

        // ✅ Create 'parent' role
        $parentRole = Role::firstOrCreate(['name' => 'parent']);

        // ✅ Create a parent user (linked to a student later)
        $parent = User::firstOrCreate(
        ['email' => 'parent@example.com'],
        ['name' => 'Parent Sample', 'password' => bcrypt('password')]
        );

        if (! $parent->hasRole('parent')) {
        $parent->assignRole('parent');
        }
    }
}
