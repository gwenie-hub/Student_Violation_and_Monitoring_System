<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SidebarPhotoUpload extends Component
{
    use WithFileUploads;

    public $photo;
    public $currentPhoto;

    public function mount()
    {
        $this->currentPhoto = auth()->user()->profile_photo_path;
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image', // No size restriction
        ]);

        $user = auth()->user();

        // Delete old photo if exists
        if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        // Store new photo
        $path = $this->photo->store('profile_photos', 'public');

        // Save to correct column
        $user->profile_photo_path = $path;
        $user->save();

        $this->currentPhoto = $path;

        session()->flash('success', 'Profile photo updated.');
    }

    public function render()
    {
        return view('livewire.admin.sidebar-photo-upload');
    }
}
