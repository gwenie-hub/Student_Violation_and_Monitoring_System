<div>
    <h2 class="text-lg font-bold mb-4">Violation Reports</h2>

    @foreach ($violations as $violation)
        <div class="p-4 border mb-3 rounded">
            <p><strong>Student:</strong> {{ $violation->student->name }}</p>
            <p><strong>Violation:</strong> {{ $violation->violation_type }}</p>
            <p><strong>Status:</strong> {{ $violation->status }}</p>

            @if ($violation->status == 'pending')
                <select wire:model="sanction.{{ $violation->id }}">
                    <option value="">-- Select Sanction --</option>
                    <option value="Verbal Warning">Verbal Warning</option>
                    <option value="Written Warning">Written Warning</option>
                    <option value="Suspension">Suspension</option>
                </select>

                <button wire:click="verify({{ $violation->id }})" class="bg-green-600 text-white px-3 py-1 rounded">
                    Verify
                </button>
                <button wire:click="reject({{ $violation->id }})" class="bg-red-600 text-white px-3 py-1 rounded">
                    Reject
                </button>
            @else
                <p><strong>Sanction:</strong> {{ $violation->sanction }}</p>
            @endif
        </div>
    @endforeach

    <div>
    <h1 class="text-xl font-bold">Manage Violations</h1>
</div>

</div>
