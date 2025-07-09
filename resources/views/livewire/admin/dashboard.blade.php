@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

    {{-- Container for the violation management --}}
    <div class="bg-white rounded-xl shadow p-4">
        {{-- This loads the Livewire component for managing student violations --}}
        @livewire('admin.manage-violations')
    </div>

    {{-- Optional: Show a form to request new student violations --}}
    {{-- 
    <div class="mt-6 bg-white rounded-xl shadow p-4">
        @livewire('violation-form')
    </div>
    --}}
</div>
@endsection
