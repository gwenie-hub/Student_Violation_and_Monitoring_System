<x-guest-layout>
    <x-authentication-card>
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 mx-auto rounded-full shadow-lg">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
