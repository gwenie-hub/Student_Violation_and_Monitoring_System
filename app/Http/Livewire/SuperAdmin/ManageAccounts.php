<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ManageAccounts extends Component
{
    use WithPagination;

    public $roleFilter = '';
    protected $paginationTheme = 'bootstrap';

    public function updatedRoleFilter()
    {
        $this->resetPage();
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        DB::transaction(function () use ($user) {
            DB::table('archives')->insert([
                'user_id' => $user->id,
                'name' => trim("{$user->fname} {$user->mname} {$user->lname}"),
                'email' => $user->email,
                'roles' => $user->getRoleNames()->join(', '),
                'archived_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $user->delete();
        });

        session()->flash('success', 'User deleted and archived successfully.');
        $this->resetPage();
    }

    public function render()
    {
        $query = User::query();

        if ($this->roleFilter) {
            $query->whereHas('roles', function ($q) {
                $q->where('name', $this->roleFilter);
            });
        }

        $users = $query->with('roles')->latest()->paginate(10);
        $roles = Role::all();

        return view('livewire.super-admin.manage-accounts', compact('users', 'roles'));
    }
}
