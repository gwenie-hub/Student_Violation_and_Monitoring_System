<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            overflow-x: hidden;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: row;
        }
        .hover-bg:hover {
            background-color: #e7f1ff;
            transition: background-color 0.2s, transform 0.2s;
            transform: scale(1.01);
        }
        .nav-link.active, .nav-link:hover {
            font-weight: 600;
            color: #0d6efd !important;
            background: #e7f1ff;
        }
        .burger-btn {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            outline: none !important;
        }
        .burger-btn .bi {
            color: #0d6efd;
        }
        .offcanvas-md {
            border-right: 1px solid #e5e7eb;
        }
        .offcanvas-md.offcanvas-start {
            width: 270px !important;
            max-width: 90vw;
            transition: width 0.3s cubic-bezier(.4,0,.2,1);
            box-shadow: 0 0 24px 0 rgba(0,0,0,0.04);
        }
        .offcanvas-header {
            background: #fff;
        }
        .offcanvas-backdrop {
            display: none !important;
        }
        .sidebar-profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }
        .sidebar-profile img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #0d6efd;
        }
        .sidebar-profile .name {
            font-weight: 600;
            color: #0d6efd;
        }
        .sidebar-profile .role {
            font-size: 0.95rem;
            color: #6c757d;
        }
        .main-content {
            flex-grow: 1;
            min-width: 0;
            padding: 2rem 2.5rem;
            background: #f8fafc;
            overflow-x: auto;
        }
        @media (max-width: 991.98px) {
            .main-content {
                padding: 1.25rem 1rem;
            }
        }
        @media (max-width: 767.98px) {
            .main-content {
                padding: 1rem 0.5rem;
            }
            .offcanvas-md.offcanvas-start {
                width: 85vw !important;
                min-width: 200px;
                max-width: 320px;
            }
        }
        @media (max-width: 575.98px) {
            .main-content {
                padding: 0.5rem 0.25rem;
            }
            .offcanvas-md.offcanvas-start {
                width: 100vw !important;
                min-width: 0;
            }
        }
        /* Hide scrollbar for sidebar on mobile for a cleaner look */
        @media (max-width: 767.98px) {
            #sidebar .offcanvas-body {
                scrollbar-width: none;
                -ms-overflow-style: none;
            }
            #sidebar .offcanvas-body::-webkit-scrollbar {
                display: none;
            }
        }
    </style>
</head>


<body class="min-vh-100">
    <!-- Sidebar Toggle Button (Mobile) -->
    <button class="btn burger-btn d-md-none position-fixed top-0 start-0 m-3 z-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-label="Open sidebar">
        <i class="bi bi-list fs-3"></i>
    </button>

    <div class="container-fluid g-0 min-vh-100">
        <div class="row g-0 min-vh-100 flex-nowrap">
            <!-- Sidebar (Offcanvas for mobile, static for desktop) -->
            <nav id="sidebar" class="offcanvas-md offcanvas-start col-auto bg-white shadow-lg border-end p-0" tabindex="-1" aria-labelledby="sidebarLabel" style="max-width: 18rem; width: 100%;">
                <div class="offcanvas-header d-md-none border-bottom">
                    <h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0 d-flex flex-column min-vh-100">
                    <div class="sidebar-profile my-3">
                        @livewire('admin.sidebar-photo-upload')
                    </div>
                    <ul class="nav flex-column fw-medium text-primary flex-grow-1">
                        <li class="nav-item">
                            <a href="{{ route('superadmin.dashboard') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                                <i class="bi bi-speedometer2 fs-5 text-primary"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('superadmin.add-user') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                                <i class="bi bi-person-plus-fill fs-5 text-primary"></i>
                                <span>Add User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('superadmin.manage-accounts') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                                <i class="bi bi-people-fill fs-5 text-primary"></i>
                                <span>Manage Accounts</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('superadmin.student-records') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                                <i class="bi bi-journal-text fs-5 text-primary"></i>
                                <span>Student Records</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('superadmin.system-logs') }}" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                                <i class="bi bi-clipboard-data fs-5 text-primary"></i>
                                <span>System Logs</span>
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
                                    <li><a href="{{ route('profile.show', ['section' => 'profile-info']) }}" class="nav-link px-2 py-1 text-primary">Profile Info</a></li>
                                    <li><a href="{{ route('profile.show', ['section' => 'change-password']) }}" class="nav-link px-2 py-1 text-primary">Change Password</a></li>
                                    <li><a href="{{ route('profile.show', ['section' => 'two-factor']) }}" class="nav-link px-2 py-1 text-primary">Two Factor Auth</a></li>
                                    <li><a href="{{ route('profile.show', ['section' => 'logout-sessions']) }}" class="nav-link px-2 py-1 text-primary">Logout Sessions</a></li>
                                    <li><a href="{{ route('profile.show', ['section' => 'delete-account']) }}" class="nav-link px-2 py-1 text-danger">Delete Account</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mt-2">
                            <form method="POST" action="{{ route('custom.logout') }}" class="w-100">
                                @csrf
                                <button type="submit" class="btn d-flex align-items-center gap-2 w-100 text-danger bg-light border-0 rounded px-3 py-2 fw-semibold">
                                    <i class="bi bi-box-arrow-right fs-5"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="main-content col px-0">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-close sidebar on nav click (mobile only) and fix Offcanvas JS errors
        document.addEventListener('DOMContentLoaded', function () {
            var sidebar = document.getElementById('sidebar');
            if (!sidebar || typeof bootstrap === 'undefined' || typeof bootstrap.Offcanvas === 'undefined') return;

            // Only initialize Offcanvas on mobile
            function isMobile() {
                return window.innerWidth < 768;
            }

            var sidebarOffcanvas = null;
            function getSidebarOffcanvas() {
                if (!sidebarOffcanvas && isMobile()) {
                    sidebarOffcanvas = bootstrap.Offcanvas.getOrCreateInstance(sidebar);
                }
                return sidebarOffcanvas;
            }

            var navLinks = sidebar.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    if (isMobile() && sidebar.classList.contains('show')) {
                        var offcanvas = getSidebarOffcanvas();
                        if (offcanvas) {
                            setTimeout(function() {
                                offcanvas.hide();
                            }, 150);
                        }
                    }
                });
            });

            // Prevent body scroll when sidebar is open (mobile)
            sidebar.addEventListener('show.bs.offcanvas', function () {
                document.body.style.overflow = 'hidden';
            });
            sidebar.addEventListener('hidden.bs.offcanvas', function () {
                document.body.style.overflow = '';
            });
        });
    </script>
</body>
</html>
