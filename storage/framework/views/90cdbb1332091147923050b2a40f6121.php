<?php $__env->startSection('content'); ?>
<main class="flex-1 p-8 text-black">
    <h1 class="text-3xl font-bold mb-8 text-black">Dashboard Cards</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold">Total Users</h3>
            <p class="text-3xl font-bold text-blue-600"><?php echo e($totalUsers); ?></p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold">Total Students</h3>
            <p class="text-3xl font-bold text-green-600"><?php echo e($totalStudents); ?></p>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-lg font-semibold">Total Violations</h3>
            <p class="text-3xl font-bold text-red-600"><?php echo e($totalViolations); ?></p>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/super-admin/dashboard.blade.php ENDPATH**/ ?>