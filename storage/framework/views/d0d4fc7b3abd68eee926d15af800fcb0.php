<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Add User</h1>

    <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
        <div class="text-green-600"><?php echo e(session('success')); ?></div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <form wire:submit.prevent="createUser" class="space-y-4">
        <input type="text" wire:model="name" placeholder="Name" class="w-full border p-2">
        <input type="email" wire:model="email" placeholder="Email" class="w-full border p-2">
        <input type="password" wire:model="password" placeholder="Password" class="w-full border p-2">

        <select wire:model="role" class="w-full border p-2">
            <option value="">Select Role</option>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Create</button>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/livewire/super-admin/add-user.blade.php ENDPATH**/ ?>