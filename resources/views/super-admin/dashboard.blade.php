@extends('layouts.app')

@section('content')
<main class="flex-1 p-8 bg-gray-100 text-black">
    <h1 class="text-3xl font-bold mb-8">Super Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Total Users --}}
        <div class="bg-white rounded-2xl shadow-md p-6 border">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">Total Users</h3>
            <p class="text-4xl font-extrabold text-blue-600">{{ $totalUsers }}</p>
        </div>

        {{-- Total Student Violations --}}
        <div class="bg-white rounded-2xl shadow-md p-6 border">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">Total Student Violations</h3>
            <p class="text-4xl font-extrabold text-red-600">{{ $totalViolations }}</p>
        </div>
    </div>
</main>
@endsection
