@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">System Logs</h2>

    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Action</th>
                <th class="px-4 py-2">Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $log->user->name ?? 'System' }}</td>
                <td class="px-4 py-2">{{ $log->action }}</td>
                <td class="px-4 py-2">{{ $log->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
