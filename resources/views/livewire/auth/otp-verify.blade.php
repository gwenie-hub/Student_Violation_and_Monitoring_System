<div class="max-w-md mx-auto mt-10">
    <h1 class="text-xl font-bold mb-4">Verify OTP</h1>

    @if (session('error'))
        <div class="text-red-600 mb-2">{{ session('error') }}</div>
    @endif

    <input type="text" wire:model="otp" maxlength="6" placeholder="Enter 6-digit OTP" class="border p-2 w-full mb-2">

    <button wire:click="verify" class="bg-blue-600 text-white px-4 py-2 rounded">Verify</button>
</div>
