<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Super Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- optional -->
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">

    {{ $slot }}

    @livewireScripts
</body>
</html>
