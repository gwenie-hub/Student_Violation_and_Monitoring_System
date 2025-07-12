<aside class="w-64 bg-white shadow-lg border-r p-6">
    <div class="text-center mb-6">
        <img src="{{ asset('images/logo5.png') }}" alt="Logo" class="h-16 w-16 mx-auto mb-3">
        <h2 class="text-xl font-bold text-gray-800">Parent Panel</h2>
    </div>

    <nav class="flex flex-col space-y-2 text-gray-800">
        <a href="{{ route('parent.dashboard') }}" class="hover:bg-gray-200 px-3 py-2 rounded">My Child's Record</a>
        <a href="{{ route('notifications.index') }}" class="hover:bg-gray-200 px-3 py-2 rounded">Notifications</a>

        <form method="POST" action="{{ route('logout') }}" class="pt-4">
            @csrf
            <button type="submit" class="text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded w-full">Logout</button>
        </form>
    </nav>
</aside>
