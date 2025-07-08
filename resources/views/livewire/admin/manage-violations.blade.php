<div>
    <div class="mb-4">
        <select wire:model="filter" class="border p-2 rounded">
            <option value="">All Violations</option>
            <option value="major">Major</option>
            <option value="minor">Minor</option>
        </select>
    </div>

    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Student</th>
                <th class="px-4 py-2">Offense</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($violations as $violation)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $violation->student->name }}</td>
                <td class="px-4 py-2">{{ $violation->offense }}</td>
                <td class="px-4 py-2 capitalize">{{ $violation->type }}</td>
                <td class="px-4 py-2 capitalize">{{ $violation->status }}</td>
                <td class="px-4 py-2 space-x-2">
                    <button wire:click="accept({{ $violation->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Accept</button>
                    <button wire:click="decline({{ $violation->id }})" class="bg-red-500 text-white px-2 py-1 rounded">Decline</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
