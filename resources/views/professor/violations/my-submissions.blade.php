@extends('layouts.app')

@section('content')
<div class="p-6 max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">My Submitted Violations</h2>

    @if ($violations->count())
        <table class="w-full border-collapse bg-white rounded shadow">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border">Student</th>
                    <th class="px-4 py-2 border">Course</th>
                    <th class="px-4 py-2 border">Violation</th>
                    <th class="px-4 py-2 border">Offense Type</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($violations as $violation)
                    <tr class="border-t">
                        <td class="px-4 py-2">
                            {{ $violation->last_name }}, {{ $violation->first_name }} {{ $violation->middle_name }}
                        </td>
                        <td class="px-4 py-2">{{ $violation->course }} - {{ $violation->year_section }}</td>
                        <td class="px-4 py-2">{{ $violation->violation }}</td>
                        <td class="px-4 py-2">{{ $violation->offense_type }}</td>
                        <td class="px-4 py-2">
                            @if ($violation->status === 'approved')
                                <span class="text-green-600 font-semibold">Approved</span>
                            @else
                                <span class="text-yellow-600 font-semibold capitalize">{{ $violation->status }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $violation->created_at->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $violations->links() }}
        </div>
    @else
        <p class="text-gray-600">You haven't submitted any violations yet.</p>
    @endif
</div>
@endsection
