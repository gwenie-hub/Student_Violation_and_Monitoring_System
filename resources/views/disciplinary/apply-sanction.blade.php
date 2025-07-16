@extends('layouts.app')

@section('sidebar')
    @if(auth()->user()->hasRole('admin'))
        @include('partials.sidebar-admin')
    @elseif(auth()->user()->hasRole('professor'))
        @include('partials.sidebar-professor')
    @elseif(auth()->user()->hasRole('superadmin'))
        @include('partials.sidebar-superadmin')
    @elseif(auth()->user()->hasRole('disciplinary_committee'))
        @include('partials.sidebar-disciplinary')
    @endif
@endsection

@section('content')
<div class="p-4">
    <h1 class="text-xl font-bold mb-4 flex items-center gap-2">
        <i class="fas fa-exclamation-circle text-blue-600"></i> Student Violations
    </h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4 text-sm">
            <i class="fas fa-check-circle mr-1"></i>{{ session('success') }}
        </div>
    @endif

    {{-- Form to apply sanction --}}
    <div class="bg-white rounded shadow p-4 max-w-xl">
        <form action="{{ route('disciplinary.sanctions.apply.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="violation_id" class="block text-sm font-medium text-gray-700">Select Violation</label>
                <select name="violation_id" id="violation_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                    <option value="">-- Choose Violation --</option>
                    @foreach ($violations as $violation)
                        @if (!$violation->sanction)
                            <option value="{{ $violation->id }}">
                                [{{ $violation->student_id }}] {{ $violation->first_name }} {{ $violation->middle_name }} {{ $violation->last_name }} - {{ $violation->violation }} ({{ $violation->offense_type }})
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="sanction" class="block text-sm font-medium text-gray-700">Sanction</label>
                <select name="sanction" id="sanction" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                    <option value="">-- Choose Sanction --</option>
                    @foreach(['Warning', 'Community Service', 'Suspension - 1 Day', 'Suspension - 3 Days', 'Parental Conference'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                    <i class="fas fa-check mr-1"></i> Apply Sanction
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
