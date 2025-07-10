@extends('layouts.app')

@section('sidebar')
<aside class="w-64 bg-white shadow-md p-6 border-r min-h-screen">
    {{-- Logo --}}
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-16 w-16">
    </div>

    {{-- Role Title --}}
    <h2 class="text-xl font-semibold text-center mb-4 text-gray-800">Disciplinary Committee</h2>

    {{-- Sidebar Links --}}
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
        {{-- Removed "Sanction Decisions" link because route is undefined --}}
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
                <button type="submit" class="w-fu
