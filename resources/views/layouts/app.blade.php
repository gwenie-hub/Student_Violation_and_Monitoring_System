<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Violation Monitoring System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex min-h-screen">
        
        {{-- Sidebar area --}}
        @yield('sidebar')

        {{-- Main content area --}}
        <div class="flex-1">
            {{-- Optional: top navbar --}}
            {{-- @include('components.navbar') --}}
            
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @livewireScripts
</body>
</html>
