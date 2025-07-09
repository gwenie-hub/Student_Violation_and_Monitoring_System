<div class="mt-6">
    <h2 class="text-xl font-bold mb-4">Student Violation Records</h2>

    <div class="mb-4">
        <label class="mr-2 font-semibold">Filter by Type:</label>
        <select wire:model="filter" class="border px-2 py-1 rounded">
            <option value="">All</option>
            <option value="major">Major</option>
            <option value="minor">Minor</option>
        </select>
    </div>

    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Student</th>
                <th class="px-4 py-2 border">Offense</th>
                <th class="px-4 py-2 border">Type</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($violations as $violation)
                <tr>
                    <td class="px-4 py-2 border">{{ $violation->student->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $violation->offense }}</td>
                    <td class="px-4 py-2 border capitalize">{{ $violation->type }}</td>
                    <td class="px-4 py-2 border capitalize">{{ $violation->status }}</td>
                    <td class="px-4 py-2 border space-x-2">
                        <button wire:click="accept({{ $violation->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Accept</button>
                        <button wire:click="decline({{ $violation->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Decline</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 text-center">No violations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
