@extends('layouts.app')

@section('title', 'School Admin Dashboard')

@section('content')
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">School Admin Dashboard</h2>

        {{-- Mount the Livewire component --}}
        @livewire('admin.dashboard')
    </div>
@endsection
