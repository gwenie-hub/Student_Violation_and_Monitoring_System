<div class="p-6">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="inline-block mb-4 text-blue-600 hover:underline">← Back to Dashboard</a>

    <h2 class="text-2xl font-bold mb-4">All Student Violations</h2>

    <table class="w-full table-auto bg-white border shadow-sm rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Student Name</th>
                <th class="px-4 py-2 text-left">Course / Section</th>
                <th class="px-4 py-2 text-left">Violation</th>
                <th class="px-4 py-2 text-left">Offense Type</th>
                <th class="px-4 py-2 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2"><?php echo e($violation->full_name); ?></td>
                    <td class="px-4 py-2"><?php echo e($violation->course); ?> / <?php echo e($violation->year_section); ?></td>
                    <td class="px-4 py-2"><?php echo e($violation->violation); ?></td>
                    <td class="px-4 py-2 capitalize"><?php echo e($violation->offense_type); ?></td>
                    <td class="px-4 py-2 capitalize font-semibold
                        <?php if($violation->status === 'approved'): ?> text-green-600
                        <?php elseif($violation->status === 'pending'): ?> text-yellow-600
                        <?php elseif($violation->status === 'rejected'): ?> text-red-600
                        <?php endif; ?>">
                        <?php echo e($violation->status); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-6">No violations found.</td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/livewire/admin/all-violations.blade.php ENDPATH**/ ?>