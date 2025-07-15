<?php

namespace App\Livewire\Profile;

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
        $user = Auth::user();

        $this->validate([
            'state.fname' => ['required', 'string', 'max:255'],
            'state.mname' => ['nullable', 'string', 'max:255'],
            'state.lname' => ['required', 'string', 'max:255'],
            'state.email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update([
            'fname' => $this->state['fname'],
            'mname' => $this->state['mname'],
            'lname' => $this->state['lname'],
            'email' => $this->state['email'],
        ]);

        $this->dispatch('saved'); // used by <x-action-message />
        session()->flash('status', 'Profile updated!');
    }

    public function render()
    {
        return view('livewire.profile.update-profile-information-form');
    }
}
