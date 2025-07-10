<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddUser extends Component
{
    public $name, $email, $password, $role;

    public function createUser()
    {
        // Sample validation & logic
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $user = \App\Models\User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $user->assignRole($this->role);

        session()->flash('success', 'User created successfully.');
    }

    public function render()
    {
        return view('livewire.super-admin.add-user', [
            'roles' => Role::all(),
        ])->layout('layouts.app'); // ✅ This MUST point to a real layout
    }
}
