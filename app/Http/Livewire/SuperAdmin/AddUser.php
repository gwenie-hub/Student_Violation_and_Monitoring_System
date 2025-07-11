<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Http\Livewire\SuperAdmin\AddUser;

class AddUser extends Component
{
    public $name, $email, $password, $role;
    public $roles;

    public function mount()
    {
        $this->roles = Role::whereIn('name', ['professor', 'parent'])->get();
    }

    public function createUser()
    {
        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->assignRole($this->role);

        session()->flash('success', 'User created successfully.');

        $this->reset(['name', 'email', 'password', 'role']);
    }

    public function render()
    {
        return view('livewire.super-admin.add-user')
            ->layout('components.layouts.app'); // This is the correct layout path
    }
}
