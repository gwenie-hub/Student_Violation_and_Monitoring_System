<div class="p-6 bg-white shadow rounded-xl">
    <h2 class="text-xl font-bold mb-4 text-gray-700">Student Violation Records</h2>

    <table class="min-w-full table-auto text-sm text-left">
        <thead>
            <tr>
                <th class="px-4 py-2">Student</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($violations as $violation)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $violation->student->name }}</td>
                    <td class="px-4 py-2 capitalize">{{ $violation->type }}</td>
                    <td class="px-4 py-2">{{ $violation->description }}</td>
                    <td class="px-4 py-2 text-sm text-gray-600">{{ $violation->status }}</td>
                    <td class="px-4 py-2">
                        @if($violation->status === 'pending')
                            <button wire:click="acceptViolation({{ $violation->id }})" class="text-green-600 font-semibold hover:underline">Accept</button>
                            <button wire:click="declineViolation({{ $violation->id }})" class="text-red-600 font-semibold hover:underline ml-2">Decline</button>
                        @else
                            <span class="text-gray-500">Reviewed</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
