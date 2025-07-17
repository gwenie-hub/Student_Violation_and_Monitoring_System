<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Listeners\LogUserActivity;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            [LogUserActivity::class, 'handleLogin'],
        ],
        Logout::class => [
            [LogUserActivity::class, 'handleLogout'],
        ],
    ];

    public function boot(): void
    {
        parent::boot();
    }
}
