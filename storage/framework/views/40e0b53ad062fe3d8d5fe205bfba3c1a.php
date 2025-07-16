<?php $__env->startSection('content'); ?>
<main class="flex-1 p-8 bg-gray-100 text-black">
    <h1 class="text-3xl font-bold mb-8">Super Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <div class="bg-white rounded-2xl shadow-md p-6 border">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">Total Users</h3>
            <p class="text-4xl font-extrabold text-blue-600"><?php echo e($totalUsers); ?></p>
        </div>

        
        <div class="bg-white rounded-2xl shadow-md p-6 border">
            <h3 class="text-lg font-semibold mb-2 text-gray-700">Total Student Violations</h3>
            <p class="text-4xl font-extrabold text-red-600"><?php echo e($totalViolations); ?></p>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\StudentViolatioMonitoringSystem\resources\views/super-admin/dashboard.blade.php ENDPATH**/ ?>