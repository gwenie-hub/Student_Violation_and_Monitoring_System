<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Pending Violations</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Student</th>
                <th class="p-2 border">Violation</th>
                <th class="p-2 border">Offense Type</th>
                <th class="p-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($violations as $violation)
                <tr>
                    <td class="p-2 border">{{ $violation->student->full_name ?? 'N/A' }}</td>
                    <td class="p-2 border">{{ $violation->violation }}</td>
                    <td class="p-2 border">{{ $violation->offense_type }}</td>
                    <td class="p-2 border">
                        <button wire:click="approve({{ $violation->id }})" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Approve</button>
                        <button wire:click="decline({{ $violation->id }})" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Decline</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">No pending violations.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
