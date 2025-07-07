<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserManagement extends Component
{
    public $users, $roles, $selectedRole = [];

    public function mount()
    {
        $this->users = User::all();
        $this->roles = Role::all();
    }

    public function assignRole($userId)
    {
        $user = User::find($userId);
        $user->syncRoles([$this->selectedRole[$userId]]);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.user-management');
    }
}

