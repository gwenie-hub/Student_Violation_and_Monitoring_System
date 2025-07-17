<div class="p-6 max-w-7xl mx-auto">

    {{-- Back Button --}}
    <a href="{{ route('superadmin.dashboard') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6 font-semibold">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Dashboard
    </a>

    {{-- Success Message --}}
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    {{-- Filter by Offense --}}
    <div class="w-full md:w-1/3 mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">Filter by Offense</label>
        <select wire:model="offenseType" class="block w-full p-2.5 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">All</option>
            <option value="minor">Minor</option>
            <option value="major">Major</option>
        </select>
    </div>

    {{-- Violation Table --}}
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-200 shadow-sm rounded">
            <thead class="bg-gray-50 text-sm text-left">
                <tr>
                    <th class="border border-gray-200 p-3">Student ID</th>
                    <th class="border border-gray-200 p-3">Name</th>
                    <th class="border border-gray-200 p-3">Course/Section</th>
                    <th class="border border-gray-200 p-3">Violation</th>
                    <th class="border border-gray-200 p-3 text-center">Type</th>
                    <th class="border border-gray-200 p-3">Sanction</th>
                    <th class="border border-gray-200 p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($violations as $v)
                    <tr>
                        <td class="border border-gray-200 p-3 text-sm">{{ $v->student_id }}</td>
                        <td class="border border-gray-200 p-3 text-sm">{{ $v->full_name }}</td>
                        <td class="border border-gray-200 p-3 text-sm">{{ $v->course }} - {{ $v->year_section }}</td>
                        <td class="border border-gray-200 p-3 text-sm">{{ $v->violation }}</td>
                        <td class="border border-gray-200 p-3 text-center text-sm capitalize">{{ $v->offense_type }}</td>
                        <td class="border border-gray-200 p-3 text-sm">{{ $v->sanction }}</td>
                        <td class="border border-gray-200 p-3 text-center">
                            <button 
                                onclick="confirmArchive({{ $v->id }})"
                                class="inline-flex items-center px-3 py-1 text-red-600 hover:bg-red-100 rounded transition duration-150 font-semibold"
                                wire:loading.attr="disabled"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Archive
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 p-4">No violation records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6 flex justify-center">
        {{ $violations->links() }}
    </div>

    {{-- Archive Confirm Script --}}
    <script>
        function confirmArchive(id) {
            if (confirm('Are you sure you want to archive this violation?')) {
                Livewire.emit('archiveViolation', id);
            }
        }
    </script>
</div>
