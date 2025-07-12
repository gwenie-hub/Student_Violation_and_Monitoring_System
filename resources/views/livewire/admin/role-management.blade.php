<div class="p-6 bg-white rounded shadow">
<a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-blue-600 hover:underline mb-4">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Dashboard
    </a>
    <h1 class="text-xl font-bold mb-4">Role Management</h1>

    @forelse ($roles as $role)
        <div class="border p-3 rounded mb-2">
            <strong>ID:</strong> {{ $role->id }}<br>
            <strong>Name:</strong> {{ $role->name }}<br>
            <strong>Guard:</strong> {{ $role->guard_name }}
        </div>
    @empty
        <p class="text-gray-600">No roles found.</p>
    @endforelse
</div>
