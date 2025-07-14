<div>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold capitalize">{{ $status }} Violations</h2>
            <a href="{{ route('admin.dashboard') }}"
               class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                ← Back to Dashboard
            </a>
        </div>

        <table class="w-full table-auto bg-white border shadow-sm rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Student Name</th>
                    <th class="px-4 py-2 text-left">Course / Section</th>
                    <th class="px-4 py-2 text-left">Violation</th>
                    <th class="px-4 py-2 text-left">Offense Type</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($violations as $violation)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $violation->full_name }}</td>
                        <td class="px-4 py-2">{{ $violation->course }} / {{ $violation->year_section }}</td>
                        <td class="px-4 py-2">{{ $violation->violation }}</td>
                        <td class="px-4 py-2 capitalize">{{ $violation->offense_type }}</td>
                        <td class="px-4 py-2 font-semibold text-yellow-600">{{ ucfirst($violation->status) }}</td>
                        <td class="px-4 py-2 space-x-2">
                            @if ($status === 'pending')
                                <button wire:click="approve({{ $violation->id }})"
                                        class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                    Approve
                                </button>
                                <button wire:click="reject({{ $violation->id }})"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Reject
                                </button>
                            @endif
                            <button wire:click="delete({{ $violation->id }})"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            No {{ $status }} violations found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
