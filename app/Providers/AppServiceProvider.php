<?php

namespace App\Providers;

use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\RoleOrPermissionMiddleware;
use Illuminate\Routing\Router;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
{
    $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
}
public function boot(): void
{
    $router = app(Router::class);

    $router->aliasMiddleware('role', RoleMiddleware::class);
    $router->aliasMiddleware('permission', PermissionMiddleware::class);
    $router->aliasMiddleware('role_or_permission', RoleOrPermissionMiddleware::class);
}
}
