@extends('layouts.app') {{-- or layouts.guest if using Jetstream --}}

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-600 to-blue-600 px-4">
    <div class="w-full max-w-md space-y-6">
        {{-- Logo --}}
        <div class="text-center">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 mx-auto rounded-full shadow-lg">
            </a>
            <h2 class="mt-4 text-2xl font-bold text-black">Forgot Password</h2>
            <p class="text-sm text-black opacity-80">Enter your email to receive a password reset link.</p>
        </div>

        {{-- Forgot Password Form --}}
        <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-900">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" required autofocus class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-300">
                </div>

                {{-- Submit --}}
                <div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
