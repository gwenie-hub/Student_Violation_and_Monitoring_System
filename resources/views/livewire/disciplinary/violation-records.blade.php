<div class="p-4 bg-white rounded shadow">
    <h2 class="text-lg font-semibold mb-4">Violation Records</h2>

    <table class="w-full table-auto text-sm border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">Student</th>
                <th class="border px-4 py-2 text-left">Violation</th>
                <th class="border px-4 py-2 text-left">Type</th>
                <th class="border px-4 py-2 text-left">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($violations as $violation)
                <tr>
                    <td class="border px-4 py-2">{{ $violation->student->name ?? 'N/A' }}</td>
                    <td class="border px-4 py-2">{{ $violation->description }}</td>
                    <td class="border px-4 py-2 capitalize">{{ $violation->type }}</td>
                    <td class="border px-4 py-2">{{ $violation->created_at->format('M d, Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center text-gray-500">No violations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
