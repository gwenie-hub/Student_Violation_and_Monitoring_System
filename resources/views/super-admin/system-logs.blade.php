@extends('layouts.app')

@section('content')
<style>
    .logs-container {
        min-height: 100vh;
        padding: 2rem;
        background-color: #f3f4f6; /* Tailwind's gray-100 */
    }

    .logs-header {
        font-size: 1.875rem; /* text-3xl */
        font-weight: 700;
        color: #1f2937; /* Tailwind's gray-800 */
        margin-bottom: 1.5rem;
    }

    .logs-table {
        width: 100%;
        border-collapse: collapse;
    }

    .logs-table thead {
        background-color: #e5e7eb; /* gray-200 */
        color: #374151; /* gray-700 */
    }

    .logs-table th,
    .logs-table td {
        padding: 1rem;
        text-align: left;
        font-size: 0.875rem;
    }

    .logs-table tbody tr {
        border-top: 1px solid #d1d5db; /* gray-300 */
        transition: background-color 0.2s;
    }

    .logs-table tbody tr:hover {
        background-color: #f9fafb; /* hover effect */
    }

    .logs-empty {
        text-align: center;
        padding: 1.5rem;
        color: #6b7280; /* gray-500 */
    }

    .pagination-container {
        margin-top: 1.5rem;
    }

    @media (max-width: 768px) {
        .logs-table thead {
            display: none;
        }

        .logs-table tbody tr {
            display: block;
            margin-bottom: 1rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .logs-table td {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #f3f4f6;
        }

        .logs-table td:last-child {
            border-bottom: none;
        }

        .logs-table td::before {
            content: attr(data-label);
            font-weight: 600;
            color: #4b5563;
        }
    }
</style>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="logs-container">
    <h1 class="logs-header">System Logs</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="logs-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logs as $log)
                    <tr>
                        <td data-label="ID">{{ $log->id }}</td>
                        <td data-label="User ID">{{ $log->user_id }}</td>
                        <td data-label="Name">{{ $log->name ?? 'System' }}</td>
                        <td data-label="Action">{{ ucfirst($log->action) }}</td>
                        <td data-label="Timestamp">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="logs-empty">No logs available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        {{ $logs->links() }}
    </div>
</div>

<script>
    $(document).ready(function () {
        if ($(window).width() < 768) {
            console.log('Mobile view active: Table reflow engaged.');
        }
    });
</script>
@endsection
