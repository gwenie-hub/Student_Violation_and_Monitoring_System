@extends('layouts.app')

@section('sidebar')
    {{-- Sidebar with Logo on Top --}}
    <div class="space-y-6">
        {{-- Logo --}}
        <div class="flex items-center justify-center mb-4">
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-16 w-16">
        </div>

                        <!-- Guidance Sidebar -->
                <nav class="sidebar bg-success text-black vh-100 p-3">
                <h4 class="mb-4">School Admin</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                    <a class="nav-link text-black" href="dashboard.php">Dashboard Overview</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-black" href="unreviewed_violations.php">View Unreviewed Violations</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-black" href="categorize_violations.php">Categorize Violations</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-black" href="update_status.php">Update Violation Status</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-black" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-black" href="notifications.php">Notifications</a>
                    </li>
                    <li class="nav-item mt-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link text-danger bg-transparent border-0 p-0">
                    Logout
                </button>
            </form>
        </li>
                </ul>
                </nav>


@endsection

@section('content')
    {{-- Main Panel --}}
    <div class="bg-white rounded-xl shadow p-6">
        @livewire('admin.manage-violations')
    </div>
@endsection
