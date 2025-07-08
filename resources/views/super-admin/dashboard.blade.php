@extends('layouts.app')

@section('content')
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Super Admin Dashboard</h2>

        {{-- Mount the Livewire component --}}
        <livewire:super-admin.dashboard />
    </div>
@endsection
