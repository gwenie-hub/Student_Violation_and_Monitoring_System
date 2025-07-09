@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-700 via-purple-600 to-red-500 text-black">
    <div class="flex">
        {{-- Sidebar --}}
        <aside class="w-64 min-h-screen bg-black bg-opacity-50 p-4 hidden md:block">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 rounded-full shadow-lg">
            </div>
            <h2 class="text-xl font-bold mb-4 text-center">👑 Super Admin</h2>
            <nav class="space-y-2">
                <a href="{{ route('superadmin.dashboard') }}" class="block px-4 py-2 rounded-lg bg-black bg-opacity-10 hover:bg-opacity-20 transition">📊 Dashboard</a>
                <a href="{{ route('admin.users') }}" class="block px-4 py-2 rounded-lg hover:bg-opacity-20 transition">👥 Manage Users</a>
                <a href="{{ route('admin.students') }}" class="block px-4 py-2 rounded-lg hover:bg-opacity-20 transition">🎓 Manage Students</a>
                <a href="{{ route('admin.roles') }}" class="block px-4 py-2 rounded-lg hover:bg-opacity-20 transition">🛡️ Manage Roles</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 rounded-lg hover:bg-opacity-20 transition">🚪 Logout</button>
                </form>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Super Admin Dashboard</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-black bg-opacity-90 rounded-xl shadow-lg p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">Total Users</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</p>
                </div>

                <div class="bg-black bg-opacity-90 rounded-xl shadow-lg p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">Total Students</h3>
                    <p class="text-3xl font-bold text-green-600">{{ $totalStudents }}</p>
                </div>

                <div class="bg-black bg-opacity-90 rounded-xl shadow-lg p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">Total Violations</h3>
                    <p class="text-3xl font-bold text-red-600">{{ $totalViolations }}</p>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
