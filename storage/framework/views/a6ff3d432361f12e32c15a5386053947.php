<div class="p-6 bg-white rounded shadow">
<a href="<?php echo e(route('admin.dashboard')); ?>" class="inline-flex items-center text-blue-600 hover:underline mb-4">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Dashboard
    </a>
    <h1 class="text-xl font-bold mb-4">Role Management</h1>

    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="border p-3 rounded mb-2">
            <strong>ID:</strong> <?php echo e($role->id); ?><br>
            <strong>Name:</strong> <?php echo e($role->name); ?><br>
            <strong>Guard:</strong> <?php echo e($role->guard_name); ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-600">No roles found.</p>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/livewire/admin/role-management.blade.php ENDPATH**/ ?>