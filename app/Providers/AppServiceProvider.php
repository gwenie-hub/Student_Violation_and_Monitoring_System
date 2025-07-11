<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Spatie\Permission\Http\Middleware\RoleMiddleware;
use Spatie\Permission\Http\Middleware\PermissionMiddleware;
use Spatie\Permission\Http\Middleware\RoleOrPermissionMiddleware;
use Livewire\Livewire;
use App\Http\Livewire\Admin\ManageViolations;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot(): void
{
    $router = app(Router::class);

    $router->aliasMiddleware('role', RoleMiddleware::class);
    $router->aliasMiddleware('permission', PermissionMiddleware::class);
    $router->aliasMiddleware('role_or_permission', RoleOrPermissionMiddleware::class);

    // ✅ Register Livewire component manually
    Livewire::component('admin.manage-violations', \App\Http\Livewire\Admin\ManageViolations::class);
    Blade::component('authentication-card', \App\View\Components\AuthenticationCard::class);
    Blade::component('authentication-card-logo', \App\View\Components\AuthenticationCardLogo::class);

}
}
