<?php $__env->startPush('head'); ?>
    <!-- Bootstrap Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body, .font-roboto { font-family: 'Roboto', Arial, sans-serif !important; }
        .table-modern th, .table-modern td { vertical-align: middle !important; }
    </style>
<?php $__env->stopPush(); ?>




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
        <a href="<?php echo e(route('professor.violations.create')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('professor.violations.create') ? 'bg-gray-300 font-bold' : ''); ?>">
            Submit Violation
        </a>
        <a href="<?php echo e(route('professor.violations.index')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('professor.violations.index') ? 'bg-gray-300 font-bold' : ''); ?>">
            Edit Violation Report
        </a>
        <a href="<?php echo e(route('professor.violations.my')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('professor.violations.my') ? 'bg-gray-300 font-bold' : ''); ?>">
            My Submissions
        </a>
        <a href="#"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('notifications.index') ? 'bg-gray-300 font-bold' : ''); ?>">
            Notifications
        </a>

        <!-- Logout -->
        <form method="POST" action="<?php echo e(route('custom.logout')); ?>" class="mt-4">
            <?php echo csrf_field(); ?>
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

    <a href="<?php echo e(route('professor.violations.create')); ?>"
       class="mb-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Create Violation
    </a>

    <!-- Approved Violations Table -->
    <div class="overflow-x-auto rounded-3 shadow border bg-white font-roboto">
        <table class="w-full text-left min-w-[600px] align-middle table-modern text-sm">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Student</th>
                    <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Violation</th>
                    <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Date</th>
                    <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b group transition hover:bg-blue-50 <?php echo e($loop->even ? 'bg-gray-50' : 'bg-white'); ?>">
                        <td class="px-3 py-2">
                            <span class="fw-medium text-gray-900"><?php echo e($violation->last_name); ?>, <?php echo e($violation->first_name); ?> <?php echo e($violation->middle_name); ?></span>
                        </td>
                        <td class="px-3 py-2 text-gray-700"><?php echo e($violation->violation); ?></td>
                        <td class="px-3 py-2 text-gray-600"><?php echo e(\Carbon\Carbon::parse($violation->created_at)->format('M d, Y')); ?></td>
                        <td class="px-3 py-2">
                            <span class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill text-xs fw-semibold bg-success bg-opacity-10 text-success border border-success-subtle">
                                <i class="bi bi-check-circle-fill me-1"></i> Approved
                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-3 py-6 text-center text-gray-400">No approved violations found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        <?php echo e($violations->links()); ?>

    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/professor/dashboard.blade.php ENDPATH**/ ?>