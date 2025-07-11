<div class="py-6">
<a href="{{ route('superadmin.dashboard') }}" class="inline-flex items-center text-blue-600 hover:underline mb-4">
        <!-- Arrow Icon -->
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Dashboard
    </a>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Search and Table goes here -->

        <div class="mb-4">
            <input
                type="text"
                wire:model.debounce.300ms="search"
                placeholder="Search students..."
                class="rounded-lg border-gray-300 shadow-sm w-full sm:w-1/3"
            >
        </div>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <!-- Table goes here -->
        </div>

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</div>
