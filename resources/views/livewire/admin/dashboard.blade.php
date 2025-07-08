<div class="p-4">
    <h1 class="text-2xl font-bold">Super Admin Dashboard</h1>
    <p class="mt-2 text-gray-600">Welcome, {{ auth()->user()->name }}</p>

    @extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">👑 Super Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Users -->
        <a href="{{ route('admin.users') }}" class="bg-white shadow-md p-5 rounded-xl hover:bg-blue-50 transition">
            <h2 class="text-xl font-semibold">👥 Manage Users</h2>
            <p class="text-gray-600">Add/edit/delete users and assign roles.</p>
        </a>

        <!-- Students -->
        <a href="{{ route('admin.students') }}" class="bg-white shadow-md p-5 rounded-xl hover:bg-green-50 transition">
            <h2 class="text-xl font-semibold">🎓 Manage Students</h2>
            <p class="text-gray-600">View and update student records.</p>
        </a>

        <!-- Violations -->
        <a href="{{ route('violations.index') }}" class="bg-white shadow-md p-5 rounded-xl hover:bg-red-50 transition">
            <h2 class="text-xl font-semibold">⚠️ All Violations</h2>
            <p class="text-gray-600">Monitor violations submitted by professors.</p>
        </a>

        <!-- Counseling Reports -->
        <a href="{{ route('counselor.reports') }}" class="bg-white shadow-md p-5 rounded-xl hover:bg-yellow-50 transition">
            <h2 class="text-xl font-semibold">📋 Counseling Reports</h2>
            <p class="text-gray-600">Access guidance counselor reports.</p>
        </a>

    </div>
</div>
@endsection


</div>
