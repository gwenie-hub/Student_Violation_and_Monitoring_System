<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">System Logs</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium">ID</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">User ID</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Name</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Action</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Timestamp</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3"><?php echo e($log->id); ?></td>
                        <td class="px-4 py-3"><?php echo e($log->user_id); ?></td>
                        <td class="px-4 py-3"><?php echo e($log->name ?? 'System'); ?></td>
                        <td class="px-4 py-3"><?php echo e(ucfirst($log->action)); ?></td>
                        <td class="px-4 py-3"><?php echo e($log->created_at->format('Y-m-d H:i')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 text-gray-500">No logs available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php echo e($logs->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/super-admin/system-logs.blade.php ENDPATH**/ ?>