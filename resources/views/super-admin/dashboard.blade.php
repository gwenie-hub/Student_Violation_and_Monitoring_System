<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-medium text-gray-700">Total Users</h3>
        <p class="text-3xl text-blue-600 font-bold">{{ $totalUsers }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-medium text-gray-700">Total Students</h3>
        <p class="text-3xl text-green-600 font-bold">{{ $totalStudents }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-medium text-gray-700">Total Violations</h3>
        <p class="text-3xl text-red-600 font-bold">{{ $totalViolations }}</p>
    </div>
</div>
@extends('layouts.app')

@section('content')
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Super Admin Dashboard</h2>

        {{-- Mount the Livewire component --}}
        <livewire:super-admin.dashboard />
    </div>
@endsection
