@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-lg">

    {{-- 🔙 Back Arrow --}}
    <a href="{{ route('superadmin.dashboard') }}" class="text-blue-600 hover:underline flex items-center mb-4">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Dashboard
    </a>

    <h1 class="mb-4 text-xl font-semibold">System Logs</h1>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Action</th>
                <th class="px-4 py-2">Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $log->user->name ?? 'System' }}</td>
                    <td class="px-4 py-2">{{ $log->action }}</td>
                    <td class="px-4 py-2">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-4 text-center text-gray-500">No logs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>
</div>
@endsection
