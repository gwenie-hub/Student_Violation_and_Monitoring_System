@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100 text-black">
    <!-- Sidebar -->
    @include('partials.sidebar') <!-- extract sidebar to partial for cleaner code -->

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Violation Records</h1>
            <a href="{{ route('violations.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Add Violation</a>
        </div>

        @if($violations->count())
            <div class="overflow-x-auto mt-6">
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Student</th>
                            <th class="border px-4 py-2">Violation</th>
                            <th class="border px-4 py-2">Reported By</th>
                            <th class="border px-4 py-2">Date</th>
                            <th class="border px-4 py-2">Sanction</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($violations as $violation)
                            <tr class="bg-white border-t hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $violation->student->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">{{ $violation->description }}</td>
                                <td class="border px-4 py-2">{{ $violation->reporter->name ?? 'N/A' }}</td>
                                <td class="border px-4 py-2">{{ $violation->created_at->format('M d, Y') }}</td>
                                <td class="border px-4 py-2">{{ $violation->sanction ?? 'None' }}</td>
                                <td class="border px-4 py-2 space-x-2">
                                    <a href="{{ route('violations.edit', $violation->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('violations.destroy', $violation->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $violations->links() }}
                </div>
            </div>
        @else
            <p class="mt-4 text-gray-600">No violations found.</p>
        @endif
    </main>
</div>
@endsection
