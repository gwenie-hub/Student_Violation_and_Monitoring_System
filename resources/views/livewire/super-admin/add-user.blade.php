<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Add User</h1>

    @if (session()->has('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="createUser" class="space-y-4">
        <input type="text" wire:model="name" placeholder="Name" class="w-full border p-2">
        <input type="email" wire:model="email" placeholder="Email" class="w-full border p-2">
        <input type="password" wire:model="password" placeholder="Password" class="w-full border p-2">

        <select wire:model="role" class="w-full border p-2">
            <option value="">Select Role</option>
            @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Create</button>
    </form>
</div>
