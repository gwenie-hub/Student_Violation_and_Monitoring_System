@extends('layouts.app')

@section('sidebar')
    @include('partials.sidebar-disciplinary')
@endsection

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Violation Tracking</h1>

    {{-- Example Tracking Table --}}
    <div class="bg-white shadow rounded p-4">
        <table class="min-w-full border text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border px-4 py-2 text-left">Student</th>
                    <th class="border px-4 py-2 text-left">Violation</th>
                    <th class="border px-4 py-2 text-left">Date Reported</th>
                    <th class="border px-4 py-2 text-left">Status</th>
                    <th class="border px-4 py-2 text-left">Sanction</th>
                </tr>
            </thead>
            <tbody>
                {{-- Example data loop --}}
                @foreach ($violations ?? [] as $violation)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $violation->student->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $violation->description ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $violation->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-xs {{ $violation->notify_status == 'success' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ ucfirst($violation->notify_status ?? 'Pending') }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $violation->sanction ?? '—' }}</td>
                    </tr>
                @endforeach

                @if(empty($violations) || count($violations) == 0)
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No violations to track at the moment.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
