@extends('layouts.app') {{-- Change 'layouts.app' to your actual layout if different --}}

@section('content')
    <h1 class="text-3xl font-bold mb-6">Invite New User</h1>
    @livewire('super-admin.add-user')
@endsection
