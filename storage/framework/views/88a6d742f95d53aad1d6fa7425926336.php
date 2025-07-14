<div>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold capitalize"><?php echo e($status); ?> Violations</h2>
            <a href="<?php echo e(route('admin.dashboard')); ?>"
               class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                ← Back to Dashboard
            </a>
        </div>

        <table class="w-full table-auto bg-white border shadow-sm rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Student Name</th>
                    <th class="px-4 py-2 text-left">Course / Section</th>
                    <th class="px-4 py-2 text-left">Violation</th>
                    <th class="px-4 py-2 text-left">Offense Type</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2"><?php echo e($violation->full_name); ?></td>
                        <td class="px-4 py-2"><?php echo e($violation->course); ?> / <?php echo e($violation->year_section); ?></td>
                        <td class="px-4 py-2"><?php echo e($violation->violation); ?></td>
                        <td class="px-4 py-2 capitalize"><?php echo e($violation->offense_type); ?></td>
                        <td class="px-4 py-2 font-semibold text-yellow-600"><?php echo e(ucfirst($violation->status)); ?></td>
                        <td class="px-4 py-2 space-x-2">
                            <!--[if BLOCK]><![endif]--><?php if($status === 'pending'): ?>
                                <button wire:click="approve(<?php echo e($violation->id); ?>)"
                                        class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                    Approve
                                </button>
                                <button wire:click="reject(<?php echo e($violation->id); ?>)"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Reject
                                </button>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <button wire:click="delete(<?php echo e($violation->id); ?>)"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            No <?php echo e($status); ?> violations found.
                        </td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/livewire/admin/violation-status-view.blade.php ENDPATH**/ ?>