@extends('layouts.app')

@section('title', 'School Admin Dashboard')

@section('content')
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">School Admin Dashboard</h1>
            <p class="text-gray-600 mt-1">Welcome! Here's an overview of your school's data.</p>
        </header>

        {{-- Mount the Livewire Dashboard Component --}}
        @livewire('admin.dashboard')

        {{-- Optional fallback message --}}
        <noscript>
            <p class="text-red-600 mt-4">JavaScript is disabled. Livewire components require JavaScript to function properly.</p>
        </noscript>
    </div>
@endsection
