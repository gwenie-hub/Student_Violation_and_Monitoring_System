@extends('layouts.app')

{{-- ✅ Sidebar goes here --}}
@section('sidebar')
<aside class="w-64 bg-white border-r min-h-screen p-6">
    <!-- Logo -->
    <div class="mb-6">
        <img src="{{ asset('images/logo3.png') }}" alt="Logo" class="h-12 mx-auto mb-4">
        <h2 class="text-xl font-bold text-center text-black">Professor Menu</h2>
    </div>

    <!-- Navigation -->
    <nav class="space-y-2 text-black">
        <a href="{{ route('professor.dashboard') }}"
           class="block hover:bg-gray-200 px-3 py-2 rounded {{ request()->routeIs('professor.dashboard') ? 'bg-gray-300 font-bold' : '' }}">
            Dashboard Overview
        </a>
        <a href="{{ route('violations.create') }}"
           class="block hover:bg-gray-200 px-3 py-2 rounded {{ request()->routeIs('violations.create') ? 'bg-gray-300 font-bold' : '' }}">
            Submit Violation
        </a>
        <a href="{{ route('violations.index') }}"
           class="block hover:bg-gray-200 px-3 py-2 rounded {{ request()->routeIs('violations.index') ? 'bg-gray-300 font-bold' : '' }}">
            Edit Violation Report
        </a>
        <a href="{{ route('violations.my') }}"
           class="block hover:bg-gray-200 px-3 py-2 rounded {{ request()->routeIs('violations.my') ? 'bg-gray-300 font-bold' : '' }}">
            My Submissions
        </a>
        <a href="{{ route('notifications.index') }}"
           class="block hover:bg-gray-200 px-3 py-2 rounded {{ request()->routeIs('notifications.index') ? 'bg-gray-300 font-bold' : '' }}">
            Notifications
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit"
                    class="text-red-600 hover:bg-red-100 px-3 py-2 rounded w-full text-left">
                Logout
            </button>
        </form>
    </nav>
</aside>
@endsection

{{-- ✅ Main content --}}
@section('content')
<main class="flex-1 p-6 bg-white rounded-xl shadow-md">

    <h2 class="text-2xl font-bold mb-4 text-gray-700">Professor Dashboard</h2>
    <p class="mb-4 text-gray-600">Welcome, Professor {{ Auth::user()->name }}!</p>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('violations.create') }}"
       class="mb-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Create Violation
    </a>

    <!-- Search bar (Livewire-ready) -->
    <input type="text" wire:model="search" placeholder="Search student..."
           class="mb-4 px-4 py-2 border rounded-lg w-full" />

    <!-- Violations Table -->
    <table class="w-full table-auto text-left border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Student</th>
                <th class="px-4 py-2">Violation</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
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
                                : ($violation->status === 'approved' ? 'bg-green-200 text-green-800'
                                : 'bg-red-200 text-red-800') }}">
                            {{ ucfirst($violation->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        <form action="{{ route('violations.destroy', $violation->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this violation?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">No violations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $violations->links() }}
    </div>
</main>
@endsection
