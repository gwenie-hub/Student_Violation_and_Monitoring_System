@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100 text-black">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-6 border-r">
        <!-- Logo -->
        <div class="mb-6 text-center">
            <img src="{{ asset('images/logo4.png') }}" alt="Logo" class="h-16 mx-auto mb-3">
            <h2 class="text-xl font-bold text-gray-800">Disciplinary Menu</h2>
        </div>

        <!-- Navigation -->
        <nav class="space-y-2 text-black">
            <a href="{{ route('disciplinary.dashboard') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Dashboard Overview</a>
            <a href="{{ route('violations.index') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Violation Records</a>
            <a href="{{ route('sanctions.apply') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Apply Sanctions</a>
            <a href="{{ route('parents.notify') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Notify Parents</a>
            <a href="{{ route('tracking.status') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Status Tracking</a>
            <a href="{{ route('reports.index') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Reports</a>

            <!-- Proper Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="w-full text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <h1 class="text-2xl font-bold text-gray-800">Welcome, {{ auth()->user()->name }}</h1>
        <h3 class="mt-4 text-xl font-semibold text-gray-700">All Reported Violations</h3>

        @if($violations->count() > 0)
            <div class="overflow-x-auto mt-4">
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">Student Name</th>
                            <th class="border px-4 py-2">Violation</th>
                            <th class="border px-4 py-2">Reported By</th>
                            <th class="border px-4 py-2">Date Reported</th>
                            <th class="border px-4 py-2">Sanction</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($violations as $violation)
                            <tr class="bg-white border-t hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $violation->student->name ?? 'Unknown Student' }}</td>
                                <td class="border px-4 py-2">{{ $violation->description }}</td>
                                <td class="border px-4 py-2">{{ \App\Models\User::find($violation->reported_by)?->name ?? 'Unknown' }}</td>
                                <td class="border px-4 py-2">{{ $violation->created_at->format('F j, Y') }}</td>
                                <td class="border px-4 py-2">{{ $violation->sanction ?? 'None' }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('disciplinary.edit', $violation->id) }}" class="bg-blue-600 text-white text-sm px-3 py-1 rounded hover:bg-blue-700">
                                        {{ $violation->sanction ? 'Edit Sanction' : 'Apply Sanction' }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="mt-3 text-gray-600">No violations have been reported yet.</p>
        @endif
    </main>
</div>
@endsection
