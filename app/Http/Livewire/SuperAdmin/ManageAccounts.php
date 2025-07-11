<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ManageAccounts extends Component
{
    use WithPagination;

    public $search = '';

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success', 'User deleted successfully.');
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.super-admin.manage-accounts', compact('users'));
    }
}
