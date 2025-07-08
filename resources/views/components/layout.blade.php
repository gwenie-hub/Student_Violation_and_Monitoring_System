<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css') <!-- Vite -->
</head>
<body class="bg-gray-100 text-gray-900">
    @include('layouts.navigation') <!-- If using Jetstream/Livewire navigation -->

    <main>
        @yield('content')
    </main>

    @vite('resources/js/app.js') <!-- Optional if needed -->
</body>
</html>
