

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">📋 All Student Violations</h1>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4">#</th>
                <th class="py-2 px-4">Student Name</th>
                <th class="py-2 px-4">Course</th>
                <th class="py-2 px-4">Year / Section</th>
                <th class="py-2 px-4">Violation</th>
                <th class="py-2 px-4">Offense Type</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4"><?php echo e($loop->iteration); ?></td>
                    <td class="py-2 px-4"><?php echo e($violation->full_name); ?></td>
                    <td class="py-2 px-4"><?php echo e($violation->course); ?></td>
                    <td class="py-2 px-4"><?php echo e($violation->year_section); ?></td>
                    <td class="py-2 px-4"><?php echo e($violation->violation); ?></td>
                    <td class="py-2 px-4 capitalize"><?php echo e($violation->offense_type); ?></td>
                    <td class="py-2 px-4 font-semibold capitalize text-yellow-600"><?php echo e($violation->status); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">No student violations found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/admin/student-violations/index.blade.php ENDPATH**/ ?>