

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('partials.sidebar-disciplinary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Violation Tracking</h1>

    
    <div class="bg-white shadow rounded p-4">
        <table class="min-w-full border text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border px-4 py-2 text-left">Student</th>
                    <th class="border px-4 py-2 text-left">Violation</th>
                    <th class="border px-4 py-2 text-left">Date Reported</th>
                    <th class="border px-4 py-2 text-left">Status</th>
                    <th class="border px-4 py-2 text-left">Sanction</th>
                </tr>
            </thead>
            <tbody>
                
                <?php $__currentLoopData = $violations ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="px-4 py-2"><?php echo e($violation->student->name ?? 'N/A'); ?></td>
                        <td class="px-4 py-2"><?php echo e($violation->description ?? 'N/A'); ?></td>
                        <td class="px-4 py-2"><?php echo e($violation->created_at->format('M d, Y')); ?></td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-xs <?php echo e($violation->notify_status == 'success' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'); ?>">
                                <?php echo e(ucfirst($violation->notify_status ?? 'Pending')); ?>

                            </span>
                        </td>
                        <td class="px-4 py-2"><?php echo e($violation->sanction ?? '—'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(empty($violations) || count($violations) == 0): ?>
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">No violations to track at the moment.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/disciplinary/tracking.blade.php ENDPATH**/ ?>