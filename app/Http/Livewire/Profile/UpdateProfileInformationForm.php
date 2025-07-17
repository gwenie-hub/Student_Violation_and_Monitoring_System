<?php
namespace App\Http\Livewire\Profile;
use App\Models\SystemLog;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    public $state = [];

    public function mount()
    {
        $user = Auth::user();

        $this->state = [
            'fname' => $user->fname,
            'mname' => $user->mname,
            'lname' => $user->lname,
            'email' => $user->email,
        ];
    }

    public function updateProfileInformation()
    {
        $this->resetErrorBag();

        $this->validate([
            'state.fname' => ['required', 'string', 'max:255'],
            'state.mname' => ['nullable', 'string', 'max:255'],
            'state.lname' => ['required', 'string', 'max:255'],
            'state.email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore(Auth::id()),
            ],
        ]);


        $user = Auth::user();
        $user->update([
            'fname' => $this->state['fname'],
            'mname' => $this->state['mname'],
            'lname' => $this->state['lname'],
            'email' => $this->state['email'],
        ]);

        // Log profile update
        SystemLog::create([
            'user_id' => $user->id,
            'name' => $user->name ?? ($user->fname . ' ' . $user->lname),
            'action' => 'updated profile information',
        ]);

        $this->dispatch('saved'); // For <x-action-message>
        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile.update-profile-information-form');
    }
}
