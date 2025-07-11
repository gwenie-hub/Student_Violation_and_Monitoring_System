<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App Layout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-6 px-4">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>
