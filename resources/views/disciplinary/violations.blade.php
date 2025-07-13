@extends('layouts.app')

@section('sidebar')
<aside class="w-64 bg-white shadow-md p-6 border-r min-h-screen">
    <ul class="space-y-2 text-black">
        <li><a href="{{ route('disciplinary.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Dashboard</a></li>
        <li><a href="{{ route('disciplinary.violations') }}" class="block px-3 py-2 rounded bg-gray-200">Student Violations</a></li>
        <li><a href="{{ route('disciplinary.reports') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Reports</a></li>
        <li><a href="{{ route('disciplinary.notifications') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Notifications</a></li>
        <li class="mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-gray-100">Logout</button>
            </form>
        </li>
    </ul>
</aside>
@endsection

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Student Violations</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Student</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Violation</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Type</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($violations as $violation)
                    <tr>
                        <td class="px-6 py-4">{{ $violation->student->name }}</td>
                        <td class="px-6 py-4">{{ $violation->description }}</td>
                        <td class="px-6 py-4 capitalize">{{ $violation->type }}</td>
                        <td class="px-6 py-4">{{ $violation->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('disciplinary.edit', $violation->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No violations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $violations->links() }}
    </div>
</div>
@endsection
