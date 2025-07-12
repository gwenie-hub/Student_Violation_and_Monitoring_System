@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-semibold mb-4">Reports</h1>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-6 py-3">Student</th>
                    <th class="px-6 py-3">Violation</th>
                    <th class="px-6 py-3">Date</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse($reports as $report)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $report->student->name ?? 'Unknown' }}</td>
                        <td class="px-6 py-4">{{ $report->violation_type }}</td>
                        <td class="px-6 py-4">{{ $report->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">No reports available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $reports->links() }}
    </div>
</div>
@endsection
