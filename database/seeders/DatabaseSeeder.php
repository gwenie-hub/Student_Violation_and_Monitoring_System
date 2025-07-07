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
        RoleSeeder::class,
        SuperAdminSeeder::class,    // Seed the super admin user
        SchoolAdminSeeder::class,
    ]);
}



}
