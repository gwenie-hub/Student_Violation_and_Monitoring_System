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

    // ✅ Register Livewire components manually
    Livewire::component('admin.manage-violations', \App\Http\Livewire\Admin\ManageViolations::class);
    Livewire::component('admin.sidebar-photo-upload', \App\Http\Livewire\Admin\SidebarPhotoUpload::class);
    Livewire::component('profile.update-profile-information-form', \App\Http\Livewire\Profile\UpdateProfileInformationForm::class);
    Livewire::component('admin.user-management', \App\Http\Livewire\Admin\UserManagement::class);
    Livewire::component('admin.student-management', \App\Http\Livewire\Admin\StudentManagement::class);
    Livewire::component('admin.role-management', \App\Http\Livewire\Admin\RoleManagement::class);
    Livewire::component('disciplinary.violation-records', \App\Http\Livewire\Disciplinary\ViolationRecords::class);    
    Livewire::component('super-admin.add-user', \App\Http\Livewire\SuperAdmin\AddUser::class);
    Blade::component('authentication-card', \App\View\Components\AuthenticationCard::class);
    Blade::component('authentication-card-logo', \App\View\Components\AuthenticationCardLogo::class);

}
}
