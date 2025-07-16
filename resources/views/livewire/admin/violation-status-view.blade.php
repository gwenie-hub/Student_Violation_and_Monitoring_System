<div class="min-h-screen bg-gray-50 flex items-center justify-center py-10 px-4">
    <div class="w-full max-w-6xl bg-white shadow-lg rounded-lg border border-blue-100 overflow-hidden">
        {{-- Flash Message --}}
        @if(session('message'))
            <div class="px-6 pt-6">
                <div class="flex items-center justify-between bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded-md">
                    <span class="text-sm font-medium">{{ session('message') }}</span>
                    <button type="button" class="hover:text-blue-900" onclick="this.closest('div').remove()">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between px-6 pt-6 pb-4 border-b border-blue-100 gap-3">
            <h2 class="text-xl sm:text-2xl font-bold text-blue-800 flex items-center gap-2">
                @switch($status)
                    @case('approved')
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        @break
                    @case('pending')
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                        </svg>
                        @break
                    @default
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                        </svg>
                @endswitch
                <span>{{ ucfirst($status) }} Violations</span>
            </h2>
            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 bg-blue-50 border border-blue-200 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-100 transition text-sm font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-blue-50 text-blue-800 uppercase text-sm font-semibold">
                    <tr>
                        <th class="px-6 py-3 text-left">Student Name</th>
                        <th class="px-6 py-3 text-left">Course / Section</th>
                        <th class="px-6 py-3 text-left">Violation</th>
                        <th class="px-6 py-3 text-left">Offense Type</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @forelse ($violations as $violation)
                        <tr class="border-t hover:bg-blue-50 transition">
                            <td class="px-6 py-4 font-medium">{{ $violation->full_name }}</td>
                            <td class="px-6 py-4">{{ $violation->course }} / {{ $violation->year_section }}</td>
                            <td class="px-6 py-4">{{ $violation->violation }}</td>
                            <td class="px-6 py-4 capitalize">{{ $violation->offense_type }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    @if($violation->status === 'approved') bg-green-100 text-green-700
                                    @elseif($violation->status === 'pending') bg-yellow-100 text-yellow-700
                                    @elseif($violation->status === 'rejected') bg-red-100 text-red-700
                                    @else bg-gray-100 text-gray-600 @endif">
                                    {{ ucfirst($violation->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    @if($status === 'pending')
                                        <button wire:click="approve({{ $violation->id }})"
                                                class="flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition text-sm shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M5 13l4 4L19 7" />
                                            </svg>
                                            Approve
                                        </button>
                                        <button wire:click="reject({{ $violation->id }})"
                                                class="flex items-center gap-1 bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition text-sm shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Reject
                                        </button>
                                    @endif
                                    <button wire:click="delete({{ $violation->id }})"
                                            class="flex items-center gap-1 bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition text-sm shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center px-6 py-12 text-gray-400">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 mb-2 text-blue-200" fill="none" stroke="currentColor"
                                         stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-sm">No {{ $status }} violations found.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
