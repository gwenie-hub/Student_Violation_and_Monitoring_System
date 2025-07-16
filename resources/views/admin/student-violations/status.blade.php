@extends('layouts.app')

@section('content')
    <div class="pt-4 px-4">
        <h2 class="text-xl font-semibold mb-3 capitalize">{{ request()->status }} Violations</h2>

        {{-- Render Livewire SPA component --}}
        @livewire('admin.violation-status-view', ['status' => request()->status])
    </div>
@endsection
