@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">👑 Super Admin Dashboard</h1>
    <p class="mb-8 text-gray-600">Welcome, {{ auth()->user()->name }}</p>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-blue-100 p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Users</h2>
            <p class="text-3xl font-bold">{{ $totalUsers }}</p>
        </div>
        <div class="bg-green-100 p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Students</h2>
            <p class="text-3xl font-bold">{{ $totalStudents }}</p>
        </div>
        <div class="bg-red-100 p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Violations</h2>
            <p class="text-3xl font-bold">{{ $totalViolations }}</p>
        </div>
        <div class="bg-purple-100 p-4 rounded shadow">
            <h2 class="text-xl font-semibold">Reports</h2>
            <p class="text-3xl font-bold">Coming Soon</p>
        </div>
    </div>

    <!-- Quick Access Links -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <a href="{{ route('admin.users') }}" class="bg-white shadow-md p-5 rounded-xl hover:bg-blue-50 transition">
            <h2 class="text-xl font-semibold">👥 Manage Users</h2>
            <p class="text-gray-600">Add/edit/delete users and assign roles.</p>
        </a>

        <a href="{{ route('admin.students') }}" class="bg-white shadow-md p-5 rounded-xl hover:bg-green-50 transition">
            <h2 class="text-xl font-semibold">🎓 Manage Students</h2>
            <p class="text-gray-600">View and update student records.</p>
        </a>

        <a href="{{ route('violations.index') }}" class="bg-white shadow-md p-5 rounded-xl hover:bg-red-50 transition">
            <h2 class="text-xl font-semibold">⚠️ All Violations</h2>
            <p class="text-gray-600">Monitor violations submitted by professors.</p>
        </a>

        <a href="{{ route('counselor.reports') }}" class="bg-white shadow-md p-5 rounded-xl hover:bg-yellow-50 transition">
            <h2 class="text-xl font-semibold">📋 Counseling Reports</h2>
            <p class="text-gray-600">Access guidance counselor reports.</p>
        </a>
    </div>

    <!-- Chart Placeholders -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-4 rounded shadow h-64">
            <h3 class="text-lg font-bold mb-2">📊 Violations per Month</h3>
            <p class="text-gray-500">[Chart Placeholder]</p>
        </div>

        <div class="bg-white p-4 rounded shadow h-64">
            <h3 class="text-lg font-bold mb-2">🧩 Violations by Type</h3>
            <p class="text-gray-500">[Chart Placeholder]</p>
        </div>
    </div>
    <p>Hello from Super Admin Dashboard!</p>

</div>
@endsection
