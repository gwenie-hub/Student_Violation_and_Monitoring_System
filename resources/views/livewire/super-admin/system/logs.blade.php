<div class="p-6 bg-white rounded shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">System Logs</h2>

    @if($logs->isEmpty())
        <div class="text-gray-500 text-center py-10">
            No logs found.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">#</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">User</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($logs as $index => $log)
                        <tr>
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $log->user->name ?? 'System' }}</td>
                            <td class="px-4 py-2">{{ $log->action }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
