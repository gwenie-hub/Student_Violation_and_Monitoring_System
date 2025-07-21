@extends('layouts.app')

@section('sidebar')
@include('partials.sidebar-disciplinary')
@endsection

@section('content')
<div class="p-6">
    @livewire('disciplinary.violation-records')
</div>
@endsection
