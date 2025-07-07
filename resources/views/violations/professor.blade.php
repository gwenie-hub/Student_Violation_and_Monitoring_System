@extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-bold">Professor Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}!</p>
    </div>
@endsection
