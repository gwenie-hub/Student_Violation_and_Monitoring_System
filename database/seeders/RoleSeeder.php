<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'super_admin']);
        Role::firstOrCreate(['name' => 'school_admin']);
        Role::firstOrCreate(['name' => 'professor']);
        Role::firstOrCreate(['name' => 'parent']); 
        Role::firstOrCreate(['name' => 'disciplinary_committee']);
    }
}
