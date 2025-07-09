<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SchoolAdminSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'school_admin']);

        User::updateOrInsert(
            ['id' => 2],
            [
                'name' => 'School Admin',
                'email' => 'philippedelgado20@gmail.com',
                'password' => Hash::make('pphilippe20'),
            ]
        );

        $user = User::find(2);
        if (!$user->hasRole('school_admin')) {
            $user->assignRole('school_admin');
        }
    }
}
