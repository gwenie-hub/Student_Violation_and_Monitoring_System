<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Tailwind via Vite --}}
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Top Navigation -->
    @include('layouts.navigation')

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg border-r">
            @php
                $user = Auth::user();
            @endphp

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
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    @livewireScripts
</body>
</html>
