@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-xl font-semibold mb-4">Profile Settings</h2>

    {{-- ✅ Laravel Flash Message --}}
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @elseif (session('message'))
        <div class="alert alert-success mb-4">
            {{ session('message') }}
        </div>
    @endif

    {{-- ✅ Livewire Flash Hook --}}
    <div x-data="{ show: false, message: '' }"
         x-on:saved.window="show = true; message = '{{ session('message') ?? 'Saved.' }}'; setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition
         class="alert alert-success mb-4">
        <span x-text="message"></span>
    </div>

    @livewire('profile.update-profile-information-form')

    <hr class="my-6">

    @livewire('profile.update-password-form')

    <hr class="my-6">

    @livewire('profile.two-factor-authentication-form')

    <hr class="my-6">

    @livewire('profile.logout-other-browser-sessions-form')

    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        <hr class="my-6">
        @livewire('profile.delete-user-form')
    @endif
</div>
@endsection
