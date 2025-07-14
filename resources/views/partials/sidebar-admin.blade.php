<aside class="w-64 bg-white shadow-lg border-r p-6">
    <div class="text-center mb-6">
        <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-16 w-16 mx-auto mb-3">
        <h2 class="text-xl font-bold text-gray-800">School Admin</h2>
    </div>

    <nav class="flex flex-col space-y-2 text-gray-800">
        <a href="{{ route('admin.dashboard') }}" class="hover:bg-gray-200 px-3 py-2 rounded">Dashboard</a>
        <a href="{{ route('admin.users') }}" class="hover:bg-gray-200 px-3 py-2 rounded">Manage Users</a>
        <a href="{{ route('admin.student-violations') }}" class="hover:bg-gray-200 px-3 py-2 rounded">Student Records</a>
        <a href="{{ route('admin.violations') }}" class="hover:bg-gray-200 px-3 py-2 rounded">Violations</a>
        <a href="{{ route('admin.roles') }}" class="hover:bg-gray-200 px-3 py-2 rounded">Roles</a>

        <form method="POST" action="{{ route('logout') }}" class="pt-4">
            @csrf
            <button type="submit" class="text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded w-full">Logout</button>
        </form>
    </nav>
</aside>
