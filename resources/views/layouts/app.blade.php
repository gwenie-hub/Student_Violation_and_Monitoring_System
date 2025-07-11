<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')  {{-- ← Fix here --}}
        </div>
    </div>

    @livewireScripts
</body>
</html>
