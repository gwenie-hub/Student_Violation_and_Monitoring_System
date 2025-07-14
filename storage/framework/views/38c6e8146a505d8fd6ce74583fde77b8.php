

<?php $__env->startSection('content'); ?>
<div class="p-6 max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">My Submitted Violations</h2>

    <?php if($violations->count()): ?>
        <table class="w-full border-collapse bg-white rounded shadow">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 border">Student</th>
                    <th class="px-4 py-2 border">Course</th>
                    <th class="px-4 py-2 border">Violation</th>
                    <th class="px-4 py-2 border">Offense Type</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="px-4 py-2">
                            <?php echo e($violation->last_name); ?>, <?php echo e($violation->first_name); ?> <?php echo e($violation->middle_name); ?>

                        </td>
                        <td class="px-4 py-2"><?php echo e($violation->course); ?> - <?php echo e($violation->year_section); ?></td>
                        <td class="px-4 py-2"><?php echo e($violation->violation); ?></td>
                        <td class="px-4 py-2"><?php echo e($violation->offense_type); ?></td>
                        <td class="px-4 py-2">
                            <?php if($violation->status === 'approved'): ?>
                                <span class="text-green-600 font-semibold">Approved</span>
                            <?php else: ?>
                                <span class="text-yellow-600 font-semibold capitalize"><?php echo e($violation->status); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-2"><?php echo e($violation->created_at->format('M d, Y')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="mt-4">
            <?php echo e($violations->links()); ?>

        </div>
    <?php else: ?>
        <p class="text-gray-600">You haven't submitted any violations yet.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/professor/violations/my-submissions.blade.php ENDPATH**/ ?>