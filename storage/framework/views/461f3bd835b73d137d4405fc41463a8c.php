<?php $__env->startSection('sidebar'); ?>
<aside class="w-64 bg-white shadow-md p-6 border-r min-h-screen">
    <ul class="space-y-2 text-black">
        <li><a href="<?php echo e(route('disciplinary.dashboard')); ?>" class="block px-3 py-2 rounded hover:bg-gray-100">Dashboard</a></li>
        <li><a href="<?php echo e(route('disciplinary.violations')); ?>" class="block px-3 py-2 rounded bg-gray-200">Student Violations</a></li>
        <li><a href="<?php echo e(route('disciplinary.reports')); ?>" class="block px-3 py-2 rounded hover:bg-gray-100">Reports</a></li>
        <li><a href="<?php echo e(route('disciplinary.notifications')); ?>" class="block px-3 py-2 rounded hover:bg-gray-100">Notifications</a></li>
        <li class="mt-4">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-gray-100">Logout</button>
            </form>
        </li>
    </ul>
</aside>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Student Violations</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Student</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Violation</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Type</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-6 py-4"><?php echo e($violation->student->name); ?></td>
                        <td class="px-6 py-4"><?php echo e($violation->description); ?></td>
                        <td class="px-6 py-4 capitalize"><?php echo e($violation->type); ?></td>
                        <td class="px-6 py-4"><?php echo e($violation->created_at->format('M d, Y')); ?></td>
                        <td class="px-6 py-4">
                            <a href="<?php echo e(route('disciplinary.edit', $violation->id)); ?>" class="text-blue-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No violations found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php echo e($violations->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/disciplinary/violations.blade.php ENDPATH**/ ?>