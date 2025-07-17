<?php
namespace App\Http\Livewire\SuperAdmin;
use App\Models\SystemLog;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCredentials;
use Spatie\Permission\Models\Role;

class AddUser extends Component
{
    public $email, $fname, $mname, $lname, $role;
    public $availableRoles = [];

    public function mount()
    {
        // Authorization: only superadmin can access
        if (!auth()->user() || !auth()->user()->hasRole('super_admin')) {
            abort(403, 'Unauthorized');
        }

        // Fetch roles from database for dropdown
        $this->availableRoles = Role::pluck('name')->toArray();
    }

    protected function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'role'  => 'required|in:' . implode(',', $this->availableRoles),
        ];
    }

    public function addUser()
    {
        $this->validate();

        $tempPassword = Str::random(10);

        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($tempPassword),
            'fname' => $this->fname,
            'mname' => $this->mname,
            'lname' => $this->lname,
        ]);

        // Assign role via Spatie
        $user->assignRole($this->role);

        // Send email with credentials
        Mail::to($user->email)->send(new SendCredentials($user, $tempPassword));

        // Log the invitation in system logs
        SystemLog::create([
            'user_id' => auth()->id(),
            'name' => auth()->user()->name ?? (auth()->user()->fname . ' ' . auth()->user()->lname),
            'action' => 'invited user: ' . $user->email,
        ]);

        session()->flash('success', 'User invited successfully and credentials sent.');

        // Reset form fields
        $this->reset(['email', 'fname', 'mname', 'lname', 'role']);
    }

    public function render()
    {
        return view('livewire.super-admin.add-user');
    }
}
