@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar-disciplinary')
@endsection

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6 text-blue-800">Violation Reports</h1>

    {{-- Filters --}}
    <div class="bg-white p-4 rounded shadow mb-6">
        <form method="GET" action="{{ route('disciplinary.reports') }}" class="flex gap-4 flex-wrap">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                <input type="date" name="from" value="{{ request('from') }}" class="border px-3 py-2 rounded w-full">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                <input type="date" name="to" value="{{ request('to') }}" class="border px-3 py-2 rounded w-full">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="type" class="border px-3 py-2 rounded w-full">
                    <option value="">All</option>
                    <option value="minor" {{ request('type') === 'minor' ? 'selected' : '' }}>Minor</option>
                    <option value="major" {{ request('type') === 'major' ? 'selected' : '' }}>Major</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Filter
                </button>
            </div>
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white shadow rounded p-4 overflow-x-auto">
        <table class="min-w-full border text-sm">
            <thead class="bg-blue-50 text-blue-800 uppercase text-xs">
                <tr>
                    <th class="border px-4 py-2 text-left">Student ID</th>
                    <th class="border px-4 py-2 text-left">Name</th>
                    <th class="border px-4 py-2 text-left">Violation</th>
                    <th class="border px-4 py-2 text-left">Type</th>
                    <th class="border px-4 py-2 text-left">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($violations as $violation)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $violation->student_id }}</td>
                        <td class="px-4 py-2">
                            {{ $violation->last_name ?? 'N/A' }},
                            {{ $violation->first_name ?? '' }}
                            {{ $violation->middle_name ?? '' }}
                        </td>
                        <td class="px-4 py-2">{{ $violation->violation ?? 'N/A' }}</td>
                        <td class="px-4 py-2 capitalize">{{ $violation->offense_type ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($violation->created_at)->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No reports found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if (method_exists($violations, 'links'))
        <div class="mt-4 flex justify-end">
            {{ $violations->appends(request()->all())->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
