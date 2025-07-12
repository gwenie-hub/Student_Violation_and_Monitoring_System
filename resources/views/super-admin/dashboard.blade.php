@extends('layouts.app')

@section('content')
<main class="flex-1 p-8 text-black">
    <h1 class="text-3xl font-bold mb-8 text-black">Dashboard Cards</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold">Total Users</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold">Total Students</h3>
            <p class="text-3xl font-bold text-green-600">{{ $totalStudents }}</p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold">Total Violations</h3>
            <p class="text-3xl font-bold text-red-600">{{ $totalViolations }}</p>
        </div>
    </div>
</main>
@endsection
