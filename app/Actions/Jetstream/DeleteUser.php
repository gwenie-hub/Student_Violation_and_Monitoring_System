<?php

namespace App\Actions\Jetstream;

use App\Models\User;
use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        // Log system event before deleting
        \App\Actions\System\LogUserAction::log('Deleted account', 'User ID: ' . $user->id);
        $user->delete();
    }
}
