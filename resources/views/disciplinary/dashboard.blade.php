@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <h3 class="mt-4">All Reported Violations</h3>

    @if($violations->count() > 0)
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Violation</th>
                    <th>Reported By</th>
                    <th>Date Reported</th>
                    <th>Sanction</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($violations as $violation)
                    <tr>
                        <td>{{ $violation->student->name ?? 'Unknown Student' }}</td>
                        <td>{{ $violation->description }}</td>
                        <td>{{ \App\Models\User::find($violation->reported_by)?->name ?? 'Unknown' }}</td>
                        <td>{{ $violation->created_at->format('F j, Y') }}</td>
                        <td>{{ $violation->sanction ?? 'None' }}</td>
                        <td>
                            <a href="{{ route('disciplinary.edit', $violation->id) }}" class="btn btn-sm btn-primary">
                                {{ $violation->sanction ? 'Edit Sanction' : 'Apply Sanction' }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="mt-3">No violations have been reported yet.</p>
    @endif
</div>
@endsection
