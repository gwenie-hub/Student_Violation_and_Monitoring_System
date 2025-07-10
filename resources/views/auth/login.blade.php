@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-600 to-blue-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">

        {{-- Logo Section --}}
        <div class="text-center">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 mx-auto rounded-full shadow-lg">
            </a>
        </div>

        {{-- Login Form --}}
        <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-900">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" required autofocus class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-300">
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-300">
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center mb-4">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-sm text-gray-700">Remember me</label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
