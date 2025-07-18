<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FontAwesome & Tailwind -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        #mainSidebar {
            display: flex;
            flex-direction: column;
            height: 100vh;
            width: 16rem; /* Tailwind w-64 */
            position: fixed;
            top: 0;
            left: 0;
            z-index: 50;
            background-color: white;
            border-right: 1px solid #e5e7eb;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        #mainSidebar.show {
            transform: translateX(0);
        }

        .sidebar-content {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
            position: relative;
        }

        .sidebar-content::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-content::-webkit-scrollbar-thumb {
            background-color: #a78bfa; /* purple-400 */
            border-radius: 3px;
        }

        .sidebar-content::-webkit-scrollbar-track {
            background-color: #f3f4f6; /* gray-100 */
        }

        #scrollDownBtn {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            background: #a78bfa;
            color: white;
            border: none;
            padding: 0.5rem;
            border-radius: 9999px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            cursor: pointer;
        }

        #scrollDownBtn:hover {
            background: #7c3aed;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="flex min-h-screen relative">

    <!-- Sidebar (hidden by default) -->
    <aside id="mainSidebar">
        <!-- Close Button -->
        <div class="flex justify-end p-4">
            <button id="closeSidebar" class="text-gray-500 text-xl">
                <i class="fas fa-xmark"></i>
            </button>
        </div>

        <!-- Sidebar Content -->
        <div class="sidebar-content" id="sidebarScrollArea">
            @php $user = Auth::user(); @endphp
            @if ($user->hasRole('super_admin'))
                @include('partials.sidebar-superadmin')
            @elseif ($user->hasRole('school_admin'))
                @include('partials.sidebar-admin')
            @elseif ($user->hasRole('professor'))
                @include('partials.sidebar-professor')
            @elseif ($user->hasRole('disciplinary_committee'))
                @include('partials.sidebar-disciplinary')
            @elseif ($user->hasRole('parent'))
                @include('partials.sidebar-parent')
            @endif
        </div>
    </aside>

    <!-- Page Content -->
    <div class="flex-1">
        <!-- Header -->
        <div class="bg-white p-3 shadow z-50 w-full flex justify-between items-center sticky top-0">
            <button id="toggleSidebar" class="text-purple-700 text-xl">
                <i class="fas fa-bars"></i>
            </button>
            <span class="font-semibold text-lg">{{ config('app.name', 'Laravel') }}</span>
        </div>

        <!-- Main Content -->
        <main class="p-4 mt-4">
            @yield('content')
        </main>
    </div>
</div>

<!-- JavaScript Sidebar Toggle + Scroll Down -->
<script>
    $(document).ready(function () {
        const sidebar = $('#mainSidebar');
        const scrollArea = $('#sidebarScrollArea');

        // Open sidebar
        $('#toggleSidebar').on('click', function () {
            sidebar.addClass('show');
        });

        // Close sidebar
        $('#closeSidebar').on('click', function () {
            sidebar.removeClass('show');
        });

        // Scroll down button
        $('#scrollDownBtn').on('click', function () {
            scrollArea.animate({
                scrollTop: scrollArea[0].scrollHeight
            }, 500);
        });
    });
</script>

@livewireScripts
</body>
</html>
