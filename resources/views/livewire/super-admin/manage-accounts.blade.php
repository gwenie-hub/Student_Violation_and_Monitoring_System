<div class="p-4">
    <!-- 🔙 Back to Dashboard -->
    <a href="{{ route('superadmin.dashboard') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
        <!-- Heroicons Left Arrow -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Dashboard
    </a>

    @if (session()->has('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <input type="text" wire:model.debounce.300ms="search" placeholder="Search users..." class="mb-4 w-full p-2 border rounded">

    <table class="w-full table-auto border-collapse border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Name</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Role</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td class="border p-2">{{ $user->name }}</td>
                    <td class="border p-2">{{ $user->email }}</td>
                    <td class="border p-2">{{ $user->getRoleNames()->join(', ') }}</td>
                    <td class="border p-2">
                        <button wire:click="deleteUser({{ $user->id }})" class="text-red-600 hover:underline">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border p-2 text-center">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
