<div>
<a href="<?php echo e(route('admin.dashboard')); ?>" class="inline-flex items-center text-blue-600 hover:underline mb-4">
    <!-- Back arrow icon -->
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
    </svg>
    Back to Dashboard
</a>

<h2>User Management</h2>
<!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="border p-2 mb-2">
    <p><strong><?php echo e($user->name); ?></strong> (<?php echo e($user->email); ?>)</p>
    <select wire:model="selectedRole.<?php echo e($user->id); ?>">
        <option value="">-- select role --</option>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </select>
    <button wire:click="assignRole(<?php echo e($user->id); ?>)">Assign</button>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/livewire/admin/user-management.blade.php ENDPATH**/ ?>