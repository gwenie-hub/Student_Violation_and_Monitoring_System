<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Models\SystemLog;

class LogUserActivity
{
    public function handleLogin(Login $event)
    {
        SystemLog::create([
            'user_id' => $event->user->id,
            'name' => $event->user->name,
            'action' => 'logged in',
        ]);
    }

    public function handleLogout(Logout $event)
    {
        SystemLog::create([
            'user_id' => $event->user->id ?? null,
            'name' => $event->user->name ?? 'Unknown',
            'action' => 'logged out',
        ]);
    }
}
