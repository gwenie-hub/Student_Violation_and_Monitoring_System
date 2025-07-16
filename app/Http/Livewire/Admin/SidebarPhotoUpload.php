<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SidebarPhotoUpload extends Component
{
    use WithFileUploads;

    public $photo;
    public $currentPhoto;

    public function mount()
    {
        $this->currentPhoto = Auth::user()->profile_photo_path;
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image', // Validate that the uploaded file is an image
        ]);

        $user = Auth::user();

        // Delete old photo if it exists
        if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        // Store new photo in storage/app/public/profile_photos
        $path = $this->photo->store('profile_photos', 'public');

        // Update user profile
        $user->update([
            'profile_photo_path' => $path,
        ]);

        // Update Livewire state
        $this->currentPhoto = $path;

        session()->flash('success', 'Profile photo updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.sidebar-photo-upload');
    }
}
