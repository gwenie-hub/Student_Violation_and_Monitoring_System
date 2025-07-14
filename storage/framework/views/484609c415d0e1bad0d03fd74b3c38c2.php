<?php $__env->startSection('content'); ?>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">My Reported Violations</h1>

        <div class="bg-white shadow rounded-xl p-4">
            <?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="border-b py-2">
                    <strong><?php echo e($violation->student_name); ?></strong> - <?php echo e($violation->offense); ?>

                    <br>
                    <small class="text-gray-500"><?php echo e($violation->created_at->format('M d, Y')); ?></small>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p>No reported violations found.</p>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/professor/violations/index.blade.php ENDPATH**/ ?>