<x-guest-layout>
    <x-authentication-card>
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 h-16 mx-auto rounded-full shadow-lg">
            <x-authentication-card-logo />
        </x-slot>

        @if(session('status'))
            <div class="mb-4 text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf

            <div>
                <x-label for="otp" value="Enter OTP" />
                <x-input id="otp" class="block mt-1 w-full" type="text" name="otp" required autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-button class="ml-4">
                    Verify OTP
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
