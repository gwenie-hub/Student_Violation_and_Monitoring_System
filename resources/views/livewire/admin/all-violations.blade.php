<div class="p-6">
    <a href="{{ route('admin.dashboard') }}" class="inline-block mb-4 text-blue-600 hover:underline">← Back to Dashboard</a>

    <h2 class="text-2xl font-bold mb-4">All Student Violations</h2>

    <table class="w-full table-auto bg-white border shadow-sm rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Student Name</th>
                <th class="px-4 py-2 text-left">Course / Section</th>
                <th class="px-4 py-2 text-left">Violation</th>
                <th class="px-4 py-2 text-left">Offense Type</th>
                <th class="px-4 py-2 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($violations as $violation)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $violation->full_name }}</td>
                    <td class="px-4 py-2">{{ $violation->course }} / {{ $violation->year_section }}</td>
                    <td class="px-4 py-2">{{ $violation->violation }}</td>
                    <td class="px-4 py-2 capitalize">{{ $violation->offense_type }}</td>
                    <td class="px-4 py-2 capitalize font-semibold
                        @if($violation->status === 'approved') text-green-600
                        @elseif($violation->status === 'pending') text-yellow-600
                        @elseif($violation->status === 'rejected') text-red-600
                        @endif">
                        {{ $violation->status }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-6">No violations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
