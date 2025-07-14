@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">📋 All Student Violations</h1>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Student Name</th>
                <th class="py-2 px-4">Course</th>
                <th class="py-2 px-4">Year / Section</th>
                <th class="py-2 px-4">Violation</th>
                <th class="py-2 px-4">Offense Type</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($violations as $violation)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4">{{ $violation->full_name }}</td>
                    <td class="py-2 px-4">{{ $violation->course }}</td>
                    <td class="py-2 px-4">{{ $violation->year_section }}</td>
                    <td class="py-2 px-4">{{ $violation->violation }}</td>
                    <td class="py-2 px-4 capitalize">{{ $violation->offense_type }}</td>
                    <td class="py-2 px-4 font-semibold capitalize text-yellow-600">{{ $violation->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">No student violations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
