<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parent Dashboard
        </h2>
    </x-slot>

    @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{ auth()->user()->name }}</h1>

        @if ($student)
            <h2>Child: {{ $student->student_number }}</h2>

            @if ($violations->isEmpty())
                <p>No violations recorded for your child.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Violation</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($violations as $violation)
                            <tr>
                                <td>{{ $violation->created_at->format('Y-m-d') }}</td>
                                <td>{{ $violation->type }}</td>
                                <td>{{ $violation->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @else
            <p>No student linked to your account.</p>
        @endif
    </div>
@endsection
