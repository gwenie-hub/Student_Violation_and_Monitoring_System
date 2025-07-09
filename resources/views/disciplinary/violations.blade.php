@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Violations</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Violation</th>
                    <th>Sanction</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($violations as $violation)
                    <tr>
                        <td>{{ $violation->student->name ?? 'Unknown' }}</td>
                        <td>{{ $violation->description }}</td>
                        <td>{{ $violation->sanction ?? 'Pending' }}</td>
                        <td>{{ $violation->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('disciplinary.edit', $violation->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $violations->links() }}
    </div>
@endsection
