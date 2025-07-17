
@push('head')
    <!-- Bootstrap Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body, .font-roboto { font-family: 'Roboto', Arial, sans-serif !important; }
        .table-modern th, .table-modern td { vertical-align: middle !important; }
    </style>
@endpush

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
        <a href="{{ route('professor.violations.create') }}"
           class="block hover:bg-gray-200 px-3 py-2 rounded {{ request()->routeIs('professor.violations.create') ? 'bg-gray-300 font-bold' : '' }}">
            Submit Violation
        </a>
        <a href="{{ route('professor.violations.index') }}"
           class="block hover:bg-gray-200 px-3 py-2 rounded {{ request()->routeIs('professor.violations.index') ? 'bg-gray-300 font-bold' : '' }}">
            Edit Violation Report
        </a>
        <a href="{{ route('professor.violations.my') }}"
           class="block hover:bg-gray-200 px-3 py-2 rounded {{ request()->routeIs('professor.violations.my') ? 'bg-gray-300 font-bold' : '' }}">
            My Submissions
        </a>
        <a href="#"
           class="block hover:bg-gray-200 px-3 py-2 rounded {{ request()->routeIs('notifications.index') ? 'bg-gray-300 font-bold' : '' }}">
            Notifications
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('custom.logout') }}" class="mt-4">
            @csrf
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

    <a href="{{ route('professor.violations.create') }}"
       class="mb-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Create Violation
    </a>

    <!-- Approved Violations Table -->
    <div class="overflow-x-auto rounded-3 shadow border bg-white font-roboto">
        <table class="w-full text-left min-w-[600px] align-middle table-modern text-sm">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Student</th>
                    <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Violation</th>
                    <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Date</th>
                    <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($violations as $violation)
                    <tr class="border-b group transition hover:bg-blue-50 {{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-3 py-2">
                            <span class="fw-medium text-gray-900">{{ $violation->last_name }}, {{ $violation->first_name }} {{ $violation->middle_name }}</span>
                        </td>
                        <td class="px-3 py-2 text-gray-700">{{ $violation->violation }}</td>
                        <td class="px-3 py-2 text-gray-600">{{ \Carbon\Carbon::parse($violation->created_at)->format('M d, Y') }}</td>
                        <td class="px-3 py-2">
                            <span class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill text-xs fw-semibold bg-success bg-opacity-10 text-success border border-success-subtle">
                                <i class="bi bi-check-circle-fill me-1"></i> Approved
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-3 py-6 text-center text-gray-400">No approved violations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $violations->links() }}
    </div>
</main>
@endsection
