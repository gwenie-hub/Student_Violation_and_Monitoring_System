<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\SystemLog;

class SidebarPhotoUpload extends Component
{
    use WithFileUploads;

    public $photo;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image',
        ]);

        $user = Auth::user();

        // Delete old photo if exists
        if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        // Store new photo on public disk inside profile_photos folder
        $path = $this->photo->store('profile_photos', 'public');

        // Make sure file is publicly visible
        Storage::disk('public')->setVisibility($path, 'public');

        // Update user profile_photo_path and check if update succeeded
        $updated = $user->update(['profile_photo_path' => $path]);

        if (!$updated) {
            session()->flash('error', 'Failed to update profile photo path in the database.');
            \Log::error('Failed to update profile_photo_path for user ID: ' . $user->id);
            return;
        }

        // Refresh the authenticated user instance to get new photo path immediately
        Auth::setUser($user->fresh());

        // Log profile photo update
        SystemLog::create([
            'user_id' => $user->id,
            'name' => $user->name ?? ($user->fname . ' ' . $user->lname),
            'action' => 'updated profile photo',
        ]);

        session()->flash('success', 'Profile photo updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.sidebar-photo-upload');
    }
}
