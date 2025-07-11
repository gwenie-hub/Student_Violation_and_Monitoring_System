@extends('layouts.app')

@section('content')
<div class="p-6">

    <a href="{{ route('superadmin.dashboard') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
        <!-- Arrow Left Icon -->
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Dashboard
    </a>

    <h2 class="text-2xl font-bold mb-4 text-gray-800">Reports & Status Logs</h2>

    @if ($reports->isEmpty())
        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded">
            No reports or logs found.
        </div>
    @else
        <table class="w-full border">
            <thead>
                <tr>
                    <th class="px-4 py-2">Violation Type</th>
                    <th class="px-4 py-2">Student</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td class="px-4 py-2">{{ $report->violation_type }}</td>
                        <td class="px-4 py-2">{{ $report->student->name ?? 'Unknown' }}</td>
                        <td class="px-4 py-2">{{ $report->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    @endif
</div>
@endsection
