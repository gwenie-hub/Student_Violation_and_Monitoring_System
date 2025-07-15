<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,            // Roles: superadmin, schooladmin, parent, disciplinary
            SuperAdminSeeder::class,     // Super Admin user with role
            SchoolAdminSeeder::class,    // School Admin user with role
            ParentSeeder::class,         // Parent user with linked student
            DisciplinarySeeder::class,   // Disciplinary Committee 
            ProfessorSeeder::class,      // Professor user with role
        ]);
    }
    

}

