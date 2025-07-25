
<aside class="w-100 d-flex flex-column bg-white shadow-sm border-end min-vh-100" style="font-family: 'Inter', sans-serif;">
    @livewire('admin.sidebar-photo-upload')
    <nav class="flex-grow-1 mt-3">
        <ul class="nav flex-column gap-1 fw-medium">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-dark sidebar-link">
                    <i class="bi bi-house-door-fill fs-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.student-violations') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-dark sidebar-link">
                    <i class="bi bi-journal-text fs-5"></i>
                    <span>Add Student</span>
                </a>
            </li>
            <li class="nav-item">
                <button id="toggleSettingsMenu" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-dark sidebar-link w-100 border-0 bg-transparent">
                    <i class="bi bi-gear-fill fs-5"></i>
                    <span>Settings</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </button>
                <div id="settingsMenuContainer" class="d-none ms-4 mt-1">
                    <ul class="nav flex-column gap-1">
                        <li><a href="{{ route('profile.show', ['section' => 'profile-info']) }}" class="nav-link px-2 py-1 text-dark">Profile Info</a></li>
                        <li><a href="{{ route('profile.show', ['section' => 'change-password']) }}" class="nav-link px-2 py-1 text-dark">Change Password</a></li>
                        <li><a href="{{ route('profile.show', ['section' => 'two-factor']) }}" class="nav-link px-2 py-1 text-dark">Two Factor Auth</a></li>
                        <li><a href="{{ route('profile.show', ['section' => 'logout-sessions']) }}" class="nav-link px-2 py-1 text-dark">Logout Sessions</a></li>
                        <li><a href="{{ route('profile.show', ['section' => 'delete-account']) }}" class="nav-link px-2 py-1 text-danger">Delete Account</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item mt-2">
                <form method="POST" action="{{ route('custom.logout') }}" class="w-100">
                    @csrf
                    <button type="submit" class="btn d-flex align-items-center gap-2 w-100 text-danger bg-white border border-danger rounded px-3 py-2 fw-semibold sidebar-link">
                        <i class="bi bi-box-arrow-right fs-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>

        </ul>
    </nav>
</aside>
