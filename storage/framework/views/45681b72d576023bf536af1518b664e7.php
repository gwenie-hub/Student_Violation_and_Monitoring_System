<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Approved Violations</h2>
    <table class="w-full table-auto border-collapse bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="p-3 text-left">Student</th>
                <th class="p-3 text-left">Violation</th>
                <th class="p-3 text-left">Date</th>
                <th class="p-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3"><?php echo e($violation->student->name); ?></td>
                    <td class="p-3"><?php echo e($violation->violationType->name); ?></td>
                    <td class="p-3"><?php echo e($violation->created_at->format('M d, Y')); ?></td>
                    <td class="p-3 text-green-600 font-bold">Approved</td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4" class="p-3 text-center">No approved violations.</td></tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/livewire/admin/approved-violations.blade.php ENDPATH**/ ?>