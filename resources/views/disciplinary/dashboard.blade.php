@extends('layouts.app')

@section('sidebar')
@include('partials.sidebar-disciplinary')
@endsection

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Disciplinary Committee Dashboard</h1>
    @livewire('disciplinary.violation-records')
</div>
@endsection
