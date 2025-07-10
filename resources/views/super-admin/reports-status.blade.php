@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Reports & Status Logs</h2>

    @if ($reports->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded">
            No reports or logs found.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Violation Type</th>
                        <th class="px-6 py-3">Student Name</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Date Reported</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                    @foreach ($reports as $report)
                        <tr>
                            <td class="px-6 py-4">{{ $report->type }}</td>
                            <td class="px-6 py-4">{{ $report->student->name }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-medium
                                    {{ $report->status === 'pending' ? 'bg-yellow-200 text-yellow-800' :
                                       ($report->status === 'approved' ? 'bg-green-200 text-green-800' :
                                       'bg-red-200 text-red-800') }}">
                                    {{ ucfirst($report->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $report->created_at->format('F j, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination (if using ->paginate()) --}}
        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    @endif
</div>
@endsection
