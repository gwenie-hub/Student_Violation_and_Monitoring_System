<?php
namespace App\Http\Livewire\SuperAdmin;
use App\Models\SystemLog;

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
            // Archive user info
            DB::table('archives')->insert([
                'user_id' => $user->id,
                'name' => trim(collect([$user->fname, $user->mname, $user->lname])->filter()->implode(' ')),
                'email' => $user->email,
                'fname' => $user->fname,
                'mname' => $user->mname,
                'lname' => $user->lname,
                'roles' => $user->getRoleNames()->join(', '),
                'archived_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Archive all student violations reported by this user
            $violations = \App\Models\StudentViolation::where('reported_by', $user->id)->get();
            foreach ($violations as $violation) {
                \App\Models\ArchivedStudentViolation::create([
                    'student_id'    => $violation->student_id,
                    'first_name'    => $violation->first_name,
                    'middle_name'   => $violation->middle_name,
                    'last_name'     => $violation->last_name,
                    'course'        => $violation->course,
                    'year_section'  => $violation->year_section,
                    'violation'     => $violation->violation,
                    'offense_type'  => $violation->offense_type,
                    'sanction'      => $violation->sanction ?? '',
                    'reported_by'   => $violation->reported_by,
                ]);
                $violation->delete();
            }

            $user->delete();
        });

        // Log user deletion
        SystemLog::create([
            'user_id' => auth()->id(),
            'name' => auth()->user()->name ?? (auth()->user()->fname . ' ' . auth()->user()->lname),
            'action' => 'deleted user: ' . $user->email,
        ]);

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
