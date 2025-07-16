<div class="max-w-4xl mx-auto py-10 px-4">
    {{-- Back Link --}}
    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-blue-600 hover:underline mb-6">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Dashboard
    </a>

    {{-- Page Header --}}
    <h2 class="text-2xl font-bold text-gray-800 mb-6">User Management</h2>

    {{-- User List --}}
    <div class="space-y-4">
        @foreach($users as $user)
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-4">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <p class="text-lg font-medium text-gray-800">{{ $user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    </div>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
                        <select wire:model="selectedRole.{{ $user->id }}"
                                class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="">-- Select role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                        <button wire:click="assignRole({{ $user->id }})"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition">
                            Assign
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
