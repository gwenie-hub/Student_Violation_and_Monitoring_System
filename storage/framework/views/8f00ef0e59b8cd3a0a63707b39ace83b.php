<?php $__env->startSection('sidebar'); ?>
<aside class="w-64 bg-white border-r min-h-screen p-6">
    <!-- Logo -->
    <div class="mb-6">
        <img src="<?php echo e(asset('images/logo3.png')); ?>" alt="Logo" class="h-12 mx-auto mb-4">
        <h2 class="text-xl font-bold text-center text-black">Professor Menu</h2>
    </div>

    <!-- Navigation -->
    <nav class="space-y-2 text-black">
        <a href="<?php echo e(route('professor.dashboard')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('professor.dashboard') ? 'bg-gray-300 font-bold' : ''); ?>">
            Dashboard Overview
        </a>
        <a href="<?php echo e(route('violations.create')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('violations.create') ? 'bg-gray-300 font-bold' : ''); ?>">
            Submit Violation
        </a>
        <a href="<?php echo e(route('violations.index')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('violations.index') ? 'bg-gray-300 font-bold' : ''); ?>">
            Edit Violation Report
        </a>
        <a href="<?php echo e(route('violations.my')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('violations.my') ? 'bg-gray-300 font-bold' : ''); ?>">
            My Submissions
        </a>
        <a href="<?php echo e(route('notifications.index')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('notifications.index') ? 'bg-gray-300 font-bold' : ''); ?>">
            Notifications
        </a>

        <!-- Logout -->
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-4">
            <?php echo csrf_field(); ?>
            <button type="submit"
                    class="text-red-600 hover:bg-red-100 px-3 py-2 rounded w-full text-left">
                Logout
            </button>
        </form>
    </nav>
</aside>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<main class="flex-1 p-6 bg-white rounded-xl shadow-md">

    <h2 class="text-2xl font-bold mb-4 text-gray-700">Professor Dashboard</h2>
    <p class="mb-4 text-gray-600">Welcome, Professor <?php echo e(Auth::user()->name); ?>!</p>

    <!-- Success Alert -->
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('violations.create')); ?>"
       class="mb-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Create Violation
    </a>

    <!-- Search bar (Livewire-ready) -->
    <input type="text" wire:model="search" placeholder="Search student..."
           class="mb-4 px-4 py-2 border rounded-lg w-full" />


    <!-- Approved Violations Table -->
    <table class="w-full table-auto text-left border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Student</th>
                <th class="px-4 py-2">Violation</th>
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-t">
                    <td class="px-4 py-2">
                        <?php echo e($violation->last_name); ?>, <?php echo e($violation->first_name); ?> <?php echo e($violation->middle_name); ?>

                    </td>
                    <td class="px-4 py-2"><?php echo e($violation->violation); ?></td>
                    <td class="px-4 py-2"><?php echo e(\Carbon\Carbon::parse($violation->created_at)->format('M d, Y')); ?></td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 rounded text-sm bg-green-200 text-green-800">
                            Approved
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        <form action="<?php echo e(route('violations.destroy', $violation->id)); ?>" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this violation?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                DELETE
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">No approved violations found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


    <!-- Pagination -->
    <div class="mt-4">
        <?php echo e($violations->links()); ?>

    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/professor/dashboard.blade.php ENDPATH**/ ?>