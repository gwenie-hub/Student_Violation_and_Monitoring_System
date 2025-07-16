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
<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="fas fa-user-edit me-2"></i>
            <h5 class="mb-0">Edit Violation Sanction</h5>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Please fix the following:</h6>
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('disciplinary.update', $violation->id) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label fw-semibold">Student ID</label>
                        <div class="form-control bg-light">{{ $violation->student_id }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Student Name</label>
                        <div class="form-control bg-light">
                            {{ $violation->last_name }}, {{ $violation->first_name }} {{ $violation->middle_name }}
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label fw-semibold">Violation</label>
                        <div class="form-control bg-light">{{ $violation->violation }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Offense Type</label>
                        <div class="form-control bg-light text-capitalize">{{ $violation->offense_type }}</div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="sanction" class="form-label fw-semibold">Select Sanction <i class="fas fa-gavel ms-1 text-muted"></i></label>
                    <select name="sanction" id="sanction" class="form-select" required>
                        <option value="">-- Choose a sanction --</option>
                        @foreach(['Warning', 'Community Service', 'Suspension - 1 Day', 'Suspension - 3 Days', 'Parental Conference'] as $option)
                            <option value="{{ $option }}" {{ old('sanction', $violation->sanction) === $option ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success shadow-sm px-4">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
