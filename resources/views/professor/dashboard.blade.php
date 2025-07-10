@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r min-h-screen p-6">
        <!-- Logo -->
        <div class="mb-6">
            <img src="{{ asset('images/logo3.png') }}" alt="Logo" class="h-12 mx-auto mb-4">
            <h2 class="text-xl font-bold text-center text-black">Professor Menu</h2>
        </div>

        <!-- Navigation -->
        <nav class="space-y-2 text-black">
            <a href="{{ route('professor.dashboard') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Dashboard Overview</a>
            <a href="{{ route('violations.create') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Submit Violation</a>
            <a href="{{ route('violations.index') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Edit Violation Report</a>
            <a href="{{ route('violations.my') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">My Submissions</a>
            <a href="{{ route('notifications.index') }}" class="block hover:bg-gray-200 px-3 py-2 rounded">Notifications</a>
            <li class="nav-item mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link text-danger bg-transparent border-0 p-0">
                    Logout
                </button>
            </form>
        </li>
        </nav>
    </aside>

    <!-- Main Dashboard Content -->
    <main class="flex-1 p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Professor Dashboard</h2>

        <p class="mb-4 text-gray-600">Welcome, Professor {{ Auth::user()->name }}!</p>

        <a href="{{ route('violations.create') }}" class="mb-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Create Violation
        </a>

        <input type="text" wire:model="search" placeholder="Search student..." class="mb-4 px-4 py-2 border rounded-lg w-full" />

        <table class="w-full table-auto text-left border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Student</th>
                    <th class="px-4 py-2">Violation</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($violations as $violation)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $violation->student->name ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $violation->description }}</td>
                        <td class="px-4 py-2">{{ $violation->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-sm
                                {{ $violation->status === 'pending' ? 'bg-yellow-200 text-yellow-800'
                                    : ($violation->status === 'accepted' ? 'bg-green-200 text-green-800'
                                    : 'bg-red-200 text-red-800') }}">
                                {{ ucfirst($violation->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">No violations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $violations->links() }}
        </div>
    </main>
</div>
@endsection
