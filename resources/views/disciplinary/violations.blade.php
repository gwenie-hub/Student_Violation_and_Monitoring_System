@extends('layouts.app')

@section('sidebar')
    {{-- Sidebar for Disciplinary Committee --}}
    <aside class="w-64 bg-white shadow-md p-6 border-r min-h-screen">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-16 w-16">
        </div>

        <h2 class="text-xl font-semibold text-center mb-4 text-gray-800">Disciplinary Committee</h2>

        <ul class="space-y-2 text-black">
            <li>
                <a href="{{ route('disciplinary.dashboard') }}" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('disciplinary.violations') }}" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Student Violations
                </a>
            </li>
            {{-- Removed the broken route disciplinary.actions --}}
            <li>
                <a href="{{ route('disciplinary.reports') }}" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Reports
                </a>
            </li>
            <li>
                <a href="{{ route('disciplinary.notifications') }}" class="block hover:bg-gray-100 px-3 py-2 rounded">
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
