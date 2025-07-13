<div class="p-4 bg-white rounded shadow">
    <h2 class="text-lg font-semibold mb-4">Violation Records</h2>

    <table class="w-full table-auto text-sm border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">Student</th>
                <th class="border px-4 py-2 text-left">Violation</th>
                <th class="border px-4 py-2 text-left">Type</th>
                <th class="border px-4 py-2 text-left">Date</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo e($violation->student->name ?? 'N/A'); ?></td>
                    <td class="border px-4 py-2"><?php echo e($violation->description); ?></td>
                    <td class="border px-4 py-2 capitalize"><?php echo e($violation->type); ?></td>
                    <td class="border px-4 py-2"><?php echo e($violation->created_at->format('M d, Y')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center text-gray-500">No violations found.</td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/livewire/disciplinary/violation-records.blade.php ENDPATH**/ ?>