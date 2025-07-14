<div class="p-6 bg-white rounded shadow-md">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="inline-flex items-center text-blue-600 hover:underline mb-4">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Dashboard
    </a>

    <h2 class="text-2xl font-bold mb-4">Student Record</h2>

    <table class="min-w-full table-auto bg-white border border-gray-200 rounded">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2 border-b">#</th>
                <th class="px-4 py-2 border-b">Name</th>
                <th class="px-4 py-2 border-b">Email</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2"><?php echo e($index + 1); ?></td>
                    <td class="px-4 py-2"><?php echo e($student->name); ?></td>
                    <td class="px-4 py-2"><?php echo e($student->email); ?></td>
                    <td class="px-4 py-2">
                        <button class="text-sm text-blue-500 hover:underline">Edit</button>
                        <button class="text-sm text-red-500 hover:underline ml-2">Delete</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/livewire/admin/student-management.blade.php ENDPATH**/ ?>