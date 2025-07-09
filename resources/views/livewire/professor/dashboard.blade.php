<div class="p-6 bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-700">Professor Dashboard</h2>

    <input type="text" wire:model="search" placeholder="Search student..." class="mb-4 px-4 py-2 border rounded-lg w-full" />

    <table class="w-full table-auto text-left border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Student</th>
                <th class="px-4 py-2">Violation</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($violations as $violation)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $violation->student->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $violation->description }}</td>
                    <td class="px-4 py-2">{{ $violation->created_at->format('M d, Y') }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded text-sm {{ $violation->status === 'pending' ? 'bg-yellow-200 text-yellow-800' : ($violation->status === 'accepted' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800') }}">
                            {{ ucfirst($violation->status) }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">No violations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $violations->links() }}
    </div>
</div>
