@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">System Logs</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium">User</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Action</th>
                    <th class="px-6 py-3 text-left text-sm font-medium">Timestamp</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($logs as $log)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $log->user?->name ?? 'System' }}</td>
                        <td class="px-6 py-4">{{ $log->action }}</td>
                        <td class="px-6 py-4">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center px-6 py-4 text-gray-500">No logs available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>
</div>
@endsection
