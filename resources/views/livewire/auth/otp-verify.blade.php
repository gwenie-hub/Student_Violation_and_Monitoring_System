<div class="max-w-md mx-auto mt-20 p-6 bg-white shadow rounded">
    <h2 class="text-2xl font-bold mb-4 text-center">OTP Verification</h2>

    @if (session()->has('error'))
        <div class="bg-red-100 text-red-600 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="verify">
        <label for="otp" class="block mb-2 text-sm font-medium text-gray-700">Enter OTP</label>
        <input wire:model="otp" type="text" id="otp" class="w-full border px-4 py-2 rounded mb-4" required>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Verify
        </button>
    </form>
</div>
