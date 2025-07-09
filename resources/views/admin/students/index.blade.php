@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">🎓 Manage Students</h1>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">LRN</th>
                <th class="py-2 px-4">Grade Level</th>
                <th class="py-2 px-4">Section</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $loop->iteration }}</td>
                <td class="py-2 px-4">{{ $student->name }}</td>
                <td class="py-2 px-4">{{ $student->lrn }}</td>
                <td class="py-2 px-4">{{ $student->grade_level }}</td>
                <td class="py-2 px-4">{{ $student->section }}</td>
                <td class="py-2 px-4">
                    <a href="#" class="text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
