<!-- Required in <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<!-- Sidebar -->
<aside class="w-100 d-flex flex-column bg-white shadow-sm border-end min-vh-100" style="font-family: 'Inter', sans-serif;">
    {{-- Livewire Profile Photo Upload --}}
    @livewire('admin.sidebar-photo-upload')

    {{-- Navigation --}}
    <nav class="flex-grow-1 mt-3">
        <ul class="nav flex-column gap-1 fw-medium">
            <li class="nav-item">
                <a href="{{ route('parent.dashboard') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-dark sidebar-link">
                    <i class="bi bi-person-lines-fill fs-5"></i>
                    <span>My Child's Record</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-dark sidebar-link">
                    <i class="bi bi-bell-fill fs-5"></i>
                    <span>Notifications</span>
                </a>
            </li>

            <li class="nav-item">
                <button class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-dark sidebar-link w-100 border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#settingsMenu" aria-expanded="false" aria-controls="settingsMenu">
                    <i class="bi bi-gear-fill fs-5"></i>
                    <span>Settings</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </button>
                <div class="collapse" id="settingsMenu">
                    <ul class="nav flex-column ms-4 mt-1">
                        <li><a href="{{ route('profile.show', ['section' => 'profile-info']) }}" class="nav-link px-2 py-1 text-dark">Profile Info</a></li>
                        <li><a href="{{ route('profile.show', ['section' => 'change-password']) }}" class="nav-link px-2 py-1 text-dark">Change Password</a></li>
                        <li><a href="{{ route('profile.show', ['section' => 'two-factor']) }}" class="nav-link px-2 py-1 text-dark">Two Factor Auth</a></li>
                        <li><a href="{{ route('profile.show', ['section' => 'logout-sessions']) }}" class="nav-link px-2 py-1 text-dark">Logout Sessions</a></li>
                        <li><a href="{{ route('profile.show', ['section' => 'delete-account']) }}" class="nav-link px-2 py-1 text-danger">Delete Account</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    {{-- Logout --}}
    <form method="POST" action="{{ route('custom.logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="btn d-flex align-items-center gap-2 w-100 text-danger bg-white border border-danger rounded px-3 py-2 fw-semibold sidebar-link">
            <i class="bi bi-box-arrow-right fs-5"></i>
            <span>Logout</span>
        </button>
    </form>
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
