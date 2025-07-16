{{-- Include Bootstrap CSS, Bootstrap Icons, and Inter Font --}}
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<aside class="w-full md:w-72 bg-white shadow-lg border-end p-4 d-flex flex-column min-vh-100" style="font-family: 'Inter', sans-serif;">
    
    {{-- Livewire User Photo Upload & Display --}}
    <div class="d-flex flex-column align-items-center mb-4">
        @livewire('admin.sidebar-photo-upload')
    </div>

    {{-- Navigation --}}
    <nav class="flex-grow-1 mt-3">
        <ul class="nav flex-column gap-1 fw-medium text-primary">
            <li class="nav-item">
                <a href="{{ route('disciplinary.dashboard') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                    <i class="bi bi-speedometer2 fs-5 text-primary"></i>
                    <span>Dashboard Overview</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                    <i class="bi bi-envelope-fill fs-5 text-primary"></i>
                    <span>Notify Parents</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('profile.show') }}"
                   class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg {{ request()->routeIs('profile.show') ? 'active' : '' }}">
                    <i class="bi bi-gear-fill fs-5 text-primary"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}" class="mt-4">
        @csrf
        <button type="submit" class="btn d-flex align-items-center gap-2 w-100 text-danger bg-light border-0 rounded px-3 py-2 fw-semibold">
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
