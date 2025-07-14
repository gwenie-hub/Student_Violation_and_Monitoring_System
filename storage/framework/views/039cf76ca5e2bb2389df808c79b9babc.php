<div class="p-6">
    <a href="<?php echo e(route('superadmin.dashboard')); ?>" class="inline-flex items-center text-blue-600 hover:underline mb-4">
        <!-- Arrow Icon -->
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Dashboard
    </a>

    <h1 class="text-xl font-bold mb-4">Add New User</h1>

    <form wire:submit.prevent="createUser">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input wire:model.lazy="name" type="text"
                   class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input wire:model.lazy="email" type="email"
                   class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input wire:model.lazy="password" type="password"
                   class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select wire:model="role"
                    class="mt-1 block w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                <option value="">-- Select Role --</option>
                <option value="professor">Professor</option>
                <option value="parent">Parent</option>
            </select>
        </div>

        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none">
            Create User
        </button>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/livewire/super-admin/add-user.blade.php ENDPATH**/ ?>