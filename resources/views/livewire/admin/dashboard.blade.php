@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

    <div class="bg-white rounded-xl shadow p-4">
        @livewire('admin.manage-violations')
    </div>

    {{-- Optional: Request form --}}
    {{-- <div class="mt-6 bg-white rounded-xl shadow p-4">
        @livewire('violation-form')
    </div> --}}
</div>
@endsection
