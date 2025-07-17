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

    @php $section = request('section', 'profile-info'); @endphp

    @if ($section === 'profile-info')
        <div id="profile-info"></div>
        @livewire('profile.update-profile-information-form')
    @elseif ($section === 'change-password')
        <div id="change-password"></div>
        @livewire('profile.update-password-form')
    @elseif ($section === 'two-factor')
        <div id="two-factor"></div>
        @livewire('profile.two-factor-authentication-form')
    @elseif ($section === 'logout-sessions')
        <div id="logout-sessions"></div>
        @livewire('profile.logout-other-browser-sessions-form')
    @elseif ($section === 'delete-account' && Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        <div id="delete-account"></div>
        @livewire('profile.delete-user-form')
    @endif
</div>
@endsection
