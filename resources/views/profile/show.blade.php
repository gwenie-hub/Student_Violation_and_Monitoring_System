@extends('layouts.app')

@section('content')
<style>
    :root {
        --main-blue: #1d3557;
        --main-red: #e63946;
        --main-white: #fff;
        --main-light-blue: #e3eafc;
        --main-light-red: #fde7eb;
        --main-gray: #f1f3f5;
        --main-dark: #22223b;
    }
    .profile-card {
        border-radius: 1.1rem;
        box-shadow: 0 2px 12px 0 rgba(29,53,87,0.13);
        border: 2.5px solid var(--main-blue);
        background: var(--main-white);
        padding: 2rem 2.5rem 2rem 2.5rem;
        max-width: 900px;
        margin: 0 auto;
    }
    .profile-card h1 {
        color: var(--main-blue);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .profile-card .alert-success {
        background: var(--main-light-blue);
        color: var(--main-blue);
        border: 1.5px solid var(--main-blue);
        font-weight: 600;
    }
    .profile-card .alert-danger {
        background: var(--main-light-red);
        color: var(--main-red);
        border: 1.5px solid var(--main-red);
        font-weight: 600;
    }
</style>
<div class="profile-card mt-5 mb-5">
    <h1 class="h3 mb-4">Profile Settings</h1>

    @if (session('status'))
        <div class="alert alert-success mb-4">{{ session('status') }}</div>
    @elseif (session('message'))
        <div class="alert alert-success mb-4">{{ session('message') }}</div>
    @endif

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
