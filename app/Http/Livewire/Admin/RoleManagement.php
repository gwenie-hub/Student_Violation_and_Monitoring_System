<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleManagement extends Component
{
    public function render()
    {
        $roles = Role::all();

        return view('livewire.admin.role-management', [
            'roles' => $roles,
        ]);
    }
}
