@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">My Reported Violations</h1>

        <div class="bg-white shadow rounded-xl p-4">
            @forelse ($violations as $violation)
                <div class="border-b py-2">
                    <strong>{{ $violation->student_name }}</strong> - {{ $violation->offense }}
                    <br>
                    <small class="text-gray-500">{{ $violation->created_at->format('M d, Y') }}</small>
                </div>
            @empty
                <p>No reported violations found.</p>
            @endforelse
        </div>
    </div>
@endsection
