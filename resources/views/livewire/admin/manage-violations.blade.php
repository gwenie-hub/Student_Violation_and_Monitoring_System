<div class="p-6">
    @if (session()->has('message'))
        <div class="mb-4 text-green-600">{{ session('message') }}</div>
    @endif

    <h2 class="text-xl font-bold mb-4">Student Violations</h2>

    <div class="mb-4">
        <label class="block font-medium">Filter by Type:</label>
        <select wire:model="filterType" class="p-2 border rounded">
            <option value="all">All</option>
            <option value="minor">Minor</option>
            <option value="major">Major</option>
        </select>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2">Student</th>
                <th class="p-2">Type</th>
                <th class="p-2">Description</th>
                <th class="p-2">Status</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($violations as $violation)
                <tr class="border-b">
                    <td class="p-2">{{ $violation->student->name ?? 'N/A' }}</td>
                    <td class="p-2">
                        @if ($editId === $violation->id)
                            <select wire:model="editType" class="border p-1 rounded">
                                <option value="minor">Minor</option>
                                <option value="major">Major</option>
                            </select>
                        @else
                            <span class="px-2 py-1 rounded-full text-white text-xs {{ $violation->type === 'major' ? 'bg-red-600' : 'bg-yellow-500' }}">
                                {{ ucfirst($violation->type) }}
                            </span>
                        @endif
                    </td>
                    <td class="p-2">
                        @if ($editId === $violation->id)
                            <textarea wire:model="editDescription" class="border p-1 rounded w-full"></textarea>
                        @else
                            {{ $violation->description }}
                        @endif
                    </td>
                    <td class="p-2">{{ ucfirst($violation->status) }}</td>
                    <td class="p-2 space-x-2">
                        @if ($editId === $violation->id)
                            <button wire:click="saveEdit" class="px-2 py-1 bg-blue-600 text-white rounded">Save</button>
                            <button wire:click="cancelEdit" class="px-2 py-1 bg-gray-400 text-white rounded">Cancel</button>
                        @else
                            @if ($violation->status === 'pending')
                                <button wire:click="updateStatus({{ $violation->id }}, 'accepted')" class="px-2 py-1 bg-green-600 text-white rounded">Accept</button>
                                <button wire:click="updateStatus({{ $violation->id }}, 'declined')" class="px-2 py-1 bg-red-600 text-white rounded">Decline</button>
                            @endif
                            <button wire:click="edit({{ $violation->id }})" class="px-2 py-1 bg-yellow-500 text-white rounded">Edit</button>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="p-4 text-center text-gray-500">No violations found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
