@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Violation for {{ $violation->student->name ?? 'Unknown Student' }}</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('disciplinary.update', $violation->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Violation Description</label>
            <input type="text" class="form-control" value="{{ $violation->description }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Sanction</label>
            <input type="text" name="sanction" class="form-control" value="{{ old('sanction', $violation->sanction) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Sanction</button>
        <a href="{{ route('disciplinary.violations') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
