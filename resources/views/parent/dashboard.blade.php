<x-app-layout>
    @section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800">Welcome, {{ auth()->user()->name }}</h1>

        @if ($student)
            <h2 class="mt-4 text-lg font-semibold text-gray-700">Child: {{ $student->student_number }}</h2>

            @if ($violations->isEmpty())
                <p class="mt-3 text-gray-600">No violations recorded for your child.</p>
            @else
                <div class="overflow-x-auto mt-4">
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">Date</th>
                                <th class="border px-4 py-2">Violation</th>
                                <th class="border px-4 py-2">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($violations as $violation)
                                <tr class="bg-white border-t hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ $violation->created_at->format('Y-m-d') }}</td>
                                    <td class="border px-4 py-2">{{ $violation->type }}</td>
                                    <td class="border px-4 py-2">{{ $violation->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @else
            <p class="mt-4 text-gray-600">No student linked to your account.</p>
        @endif
    </div>
    @endsection
</x-app-layout>
