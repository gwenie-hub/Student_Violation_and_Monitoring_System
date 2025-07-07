<div>
    <h2 class="text-xl font-bold mb-4">All Violations</h2>
    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Student</th>
                <th class="p-2">Description</th>
                <th class="p-2">Severity</th>
                <th class="p-2">Submitted</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($violations as $violation)
                <tr class="border-t">
                    <td class="p-2">{{ $violation->student->name ?? 'N/A' }}</td>
                    <td class="p-2">{{ $violation->description }}</td>
                    <td class="p-2 text-{{ $violation->color }}">{{ ucfirst($violation->severity_level) }}</td>
                    <td class="p-2">{{ $violation->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
