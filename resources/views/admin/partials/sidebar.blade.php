
<!-- Modern Sidebar for Admin -->
<aside class="w-full md:w-72 bg-white shadow-lg border-end p-4 d-flex flex-column min-vh-100" style="font-family: 'Inter', sans-serif;">
    @can('admin')
    <nav class="flex-grow-1 mt-3">
        <ul class="nav flex-column gap-1 fw-medium text-primary">
            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-primary hover-bg">
                    <i class="bi bi-people-fill fs-5 text-primary"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.students') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-primary hover-bg">
                    <i class="bi bi-person-lines-fill fs-5 text-primary"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.violations') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-primary hover-bg">
                    <i class="bi bi-exclamation-triangle-fill fs-5 text-primary"></i>
                    <span>Violations</span>
                </a>
            </li>
            <li class="nav-item">
                <button class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-primary hover-bg w-100 border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#settingsMenu" aria-expanded="false" aria-controls="settingsMenu">
                    <i class="bi bi-gear-fill fs-5 text-primary"></i>
                    <span>Settings</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </button>
                <div class="collapse" id="settingsMenu">
                    <ul class="nav flex-column ms-4 mt-1">
                        <li><a href="{{ route('profile.show') }}#profile-info" class="nav-link px-2 py-1 text-primary">Profile Info</a></li>
                        <li><a href="{{ route('profile.show') }}#change-password" class="nav-link px-2 py-1 text-primary">Change Password</a></li>
                        <li><a href="{{ route('profile.show') }}#two-factor" class="nav-link px-2 py-1 text-primary">Two Factor Auth</a></li>
                        <li><a href="{{ route('profile.show') }}#logout-sessions" class="nav-link px-2 py-1 text-primary">Logout Sessions</a></li>
                        <li><a href="{{ route('profile.show') }}#delete-account" class="nav-link px-2 py-1 text-danger">Delete Account</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
    @endcan
</aside>

<style>
    .hover-bg:hover {
        background-color: #f0f8ff;
        transition: background-color 0.2s ease-in-out, transform 0.2s ease;
        transform: scale(1.01);
    }
    .nav-link.active, .nav-link:hover {
        font-weight: 600;
        color: #0d6efd !important;
    }
</style>
