@extends('layouts.app')

@section('sidebar')
    {{-- Sidebar for School Admin --}}
    <aside class="w-64 bg-white shadow-md p-6 border-r min-h-screen">
        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-16 w-16">
        </div>

        {{-- Navigation --}}
        <h2 class="text-xl font-semibold text-center mb-4 text-gray-800">School Admin</h2>
        <ul class="space-y-2 text-black">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Dashboard Overview
                </a>
            </li>
            <li>
                <a href="{{ route('admin.violations') }}" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    View Unreviewed Violations
                </a>
            </li>
            <li>
                <a href="#" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Categorize Violations
                </a>
            </li>
            <li>
                <a href="#" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Update Violation Status
                </a>
            </li>
            <li>
                <a href="#" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Reports
                </a>
            </li>
            <li>
                <a href="#" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Notifications
                </a>
            </li>
            <li class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </aside>
@endsection

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard Overview</h1>

        {{-- Violation Status Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('violations.status', ['status' => 'approved']) }}">
                <div class="bg-green-500 text-black p-6 rounded-lg shadow hover:bg-green-600 transition">
                    <h2 class="text-xl font-semibold">Approved Violations</h2>
                    <p class="mt-2">View all approved violations</p>
                </div>
            </a>

            <a href="{{ route('violations.status', ['status' => 'pending']) }}">
                <div class="bg-yellow-400 text-black p-6 rounded-lg shadow hover:bg-yellow-500 transition">
                    <h2 class="text-xl font-semibold">Pending Violations</h2>
                    <p class="mt-2">Review all pending violations</p>
                </div>
            </a>
        </div>
    </div>
@endsection
