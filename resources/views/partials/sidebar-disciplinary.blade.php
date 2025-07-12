<!-- resources/views/partials/sidebar-disciplinary.blade.php -->

<aside class="w-64 bg-white shadow-lg border-r p-6">
    <!-- Logo & Title -->
    <div class="text-center mb-6">
        <img src="{{ asset('images/logo4.png') }}" alt="Logo" class="h-16 w-16 mx-auto mb-3">
        <h2 class="text-xl font-bold text-gray-800">Disciplinary Menu</h2>
    </div>

    <!-- Navigation Links -->
    <nav class="flex flex-col space-y-2 text-gray-800">
        <a href="{{ route('disciplinary.dashboard') }}" class="hover:bg-gray-200 px-3 py-2 rounded">
            Dashboard Overview
        </a>
        <a href="{{ route('disciplinary.violations') }}" class="hover:bg-gray-200 px-3 py-2 rounded">
            Violation Records
        </a>
        <a href="{{ route('sanctions.apply') }}" class="hover:bg-gray-200 px-3 py-2 rounded">
            Apply Sanctions
        </a>
        <a href="{{ route('parents.notify') }}" class="hover:bg-gray-200 px-3 py-2 rounded">
            Notify Parents
        </a>
        <a href="{{ route('tracking.status') }}" class="hover:bg-gray-200 px-3 py-2 rounded">
            Status Tracking
        </a>
        <a href="{{ route('disciplinary.reports') }}" class="hover:bg-gray-200 px-3 py-2 rounded">
            Reports
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="pt-4">
            @csrf
            <button type="submit" class="text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded w-full">
                Logout
            </button>
        </form>
    </nav>
</aside>
