@extends('layouts.app')

@section('sidebar')
<aside class="w-64 bg-white shadow-md p-6 border-r min-h-screen">
    <ul class="space-y-2 text-black">
        <li>
            <a href="{{ route('disciplinary.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('disciplinary.violations') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                Student Violations
            </a>
        </li>
        <li>
            <a href="{{ route('disciplinary.reports') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                Reports
            </a>
        </li>
        <li>
            <a href="{{ route('disciplinary.notifications') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                Notifications
            </a>
        </li>
        <li class="mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-gray-100">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</aside>
@endsection

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Disciplinary Committee Dashboard</h1>

    {{-- Livewire Violation Records --}}
    @livewire('disciplinary.violation-records')
</div>
@endsection
