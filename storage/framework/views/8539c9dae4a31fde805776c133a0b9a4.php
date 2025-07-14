<div class="mt-6">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="inline-flex items-center text-blue-600 hover:underline mb-4">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Dashboard
    </a>
    <h2 class="text-lg font-semibold mb-4">Student Violation Records</h2>

    <div class="mb-4">
        <label class="mr-2 font-semibold">Filter by Type:</label>
        <select wire:model="filter" class="border px-2 py-1 rounded">
            <option value="">All</option>
            <option value="major">Major</option>
            <option value="minor">Minor</option>
        </select>
    </div>

    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Student</th>
                <th class="px-4 py-2 border">Offense</th>
                <th class="px-4 py-2 border">Type</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Action</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-2 border"><?php echo e($violation->student->name ?? 'N/A'); ?></td>
                    <td class="px-4 py-2 border"><?php echo e($violation->offense); ?></td>
                    <td class="px-4 py-2 border capitalize"><?php echo e($violation->type); ?></td>
                    <td class="px-4 py-2 border capitalize"><?php echo e($violation->status); ?></td>
                    <td class="px-4 py-2 border space-x-2">
                        <button wire:click="accept(<?php echo e($violation->id); ?>)" class="bg-green-500 text-white px-2 py-1 rounded">Accept</button>
                        <button wire:click="decline(<?php echo e($violation->id); ?>)" class="bg-red-500 text-white px-2 py-1 rounded">Decline</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-4 py-2 text-center">No violations found.</td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/livewire/admin/manage-violations.blade.php ENDPATH**/ ?>