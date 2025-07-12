

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-6">
    
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Dashboard
    </a>

    <h3 class="text-2xl font-bold mb-4 capitalize"><?php echo e($status); ?> Violations</h3>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Student</th>
                    <th class="px-4 py-2 border">Description</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Date</th>
                    <?php if($status === 'pending'): ?>
                        <th class="px-4 py-2 border">Actions</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border"><?php echo e($violation->id); ?></td>
                        <td class="px-4 py-2 border"><?php echo e($violation->student->name ?? 'N/A'); ?></td>
                        <td class="px-4 py-2 border"><?php echo e($violation->description); ?></td>
                        <td class="px-4 py-2 border capitalize"><?php echo e($violation->status); ?></td>
                        <td class="px-4 py-2 border"><?php echo e($violation->created_at->format('Y-m-d')); ?></td>
                        <?php if($status === 'pending'): ?>
                            <td class="px-4 py-2 border">
                                <form action="<?php echo e(route('violations.updateStatus', $violation->id)); ?>" method="POST" class="flex gap-2">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <button name="action" value="approved" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm">
                                        Accept
                                    </button>
                                    <button name="action" value="declined" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                        Decline
                                    </button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No pending violations found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/violations/filtered.blade.php ENDPATH**/ ?>