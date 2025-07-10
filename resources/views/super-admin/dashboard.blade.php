@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gradient-to-br from-blue-700 via-purple-600 to-red-500 text-black">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-6 border-r">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="w-16 h-16 rounded-full shadow-md">
        </div>

        <!-- Navigation -->
        <h2 class="text-xl font-semibold text-center mb-4 text-gray-800">Super Admin</h2>
        <ul class="space-y-2 text-black">
            <li><a href="/super-admin/dashboard" class="block hover:bg-gray-100 px-3 py-2 rounded">Dashboard Overview</a></li>
            <li><a href="/user_management" class="block hover:bg-gray-100 px-3 py-2 rounded">User Management</a></li>
            <li class="ml-4"><a href="/add_user" class="block hover:bg-gray-100 px-3 py-2 rounded">➤ Add User</a></li>
            <li class="ml-4"><a href="/manage_accounts" class="block hover:bg-gray-100 px-3 py-2 rounded">➤ Manage Accounts</a></li>
            <li><a href="/student_records" class="block hover:bg-gray-100 px-3 py-2 rounded">Student Records</a></li>
            <li><a href="/system_logs" class="block hover:bg-gray-100 px-3 py-2 rounded">System Logs</a></li>
            <li><a href="/reports" class="block hover:bg-gray-100 px-3 py-2 rounded">Reports & Status Logs</a></li>

            <!-- Functional Logout -->
            <li class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- Main Content with gap -->
    <main class="flex-1 ml-4 p-8 text-black">
        <h1 class="text-3xl font-bold mb-8 text-white">Super Admin Dashboard</h1>

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

</div>
@endsection
