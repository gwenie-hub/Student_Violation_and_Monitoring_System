<!-- Bootstrap 5 (if not already added) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Google Font: Roboto -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<!-- Custom Styles -->
<style>
    body, .sidebar, a, h1, h2, h3, h4, h5, h6 {
        font-family: 'Roboto', sans-serif;
    }

    .sidebar a {
        transition: background 0.3s, color 0.3s;
    }

    .sidebar a:hover {
        background-color: #f1f1f1;
    }

    .sidebar .active {
        background-color: #e7f1ff;
        font-weight: 500;
    }

    .card-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
    }

    .card-box {
        transition: all 0.3s ease;
    }
</style>


@extends('layouts.app')

@section('sidebar')
    {{-- Sidebar for School Admin --}}
    <aside class="w-64 bg-white shadow-sm p-4 border-end min-vh-100 sidebar">
        {{-- Logo --}}
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-16 w-16 mx-auto">
        </div>

        {{-- Navigation --}}
        <h2 class="h5 fw-bold text-center text-primary mb-4">School Admin</h2>
        <ul class="nav flex-column text-dark">
            <li class="nav-item mb-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-link px-3 py-2 {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard Overview
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{ route('admin.violations') }}" class="nav-link px-3 py-2">
                    <i class="bi bi-exclamation-triangle me-2"></i> View Unreviewed Violations
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#" class="nav-link px-3 py-2">
                    <i class="bi bi-tags me-2"></i> Categorize Violations
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#" class="nav-link px-3 py-2">
                    <i class="bi bi-pencil-square me-2"></i> Update Violation Status
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#" class="nav-link px-3 py-2">
                    <i class="bi bi-bar-chart-line me-2"></i> Reports
                </a>
            </li>
            <li class="nav-item mb-3">
                <a href="#" class="nav-link px-3 py-2">
                    <i class="bi bi-bell me-2"></i> Notifications
                </a>
            </li>
            <li class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </aside>
@endsection

@section('content')
<div class="container py-4">
    <div class="row g-4">
        <div class="col-md-6">
            <a href="{{ route('admin.violations.status', 'approved') }}" class="text-decoration-none">
                <div class="card-box bg-success text-white rounded p-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-check-circle-fill fs-3 me-3"></i>
                        <h4 class="mb-0 fw-semibold">Approved Violations</h4>
                    </div>
                    <p class="mt-2 mb-0">View all approved violations.</p>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('admin.violations.status', 'pending') }}" class="text-decoration-none">
                <div class="card-box bg-warning text-dark rounded p-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-hourglass-split fs-3 me-3"></i>
                        <h4 class="mb-0 fw-semibold">Pending Violations</h4>
                    </div>
                    <p class="mt-2 mb-0">Review all pending violations.</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
