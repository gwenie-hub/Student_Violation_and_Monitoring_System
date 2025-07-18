<?php $__env->startSection('content'); ?>
<main class="flex-grow-1 py-4 px-2 px-sm-4 px-md-5 bg-light text-black w-100">
    <h1 class="fw-bold mb-4 fs-2 text-center text-md-start">Super Admin Dashboard</h1>

    <div class="row g-4 justify-content-center">
        
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-white rounded-4 shadow-sm p-4 border h-100 d-flex flex-column align-items-center align-items-md-start">
                <h3 class="fs-5 fw-semibold mb-2 text-secondary">Total Users</h3>
                <p class="display-5 fw-bold text-primary mb-0"><?php echo e($totalUsers); ?></p>
            </div>
        </div>

        
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-white rounded-4 shadow-sm p-4 border h-100 d-flex flex-column align-items-center align-items-md-start">
                <h3 class="fs-5 fw-semibold mb-2 text-secondary">Total Student Violations</h3>
                <p class="display-5 fw-bold text-danger mb-0"><?php echo e($totalViolations); ?></p>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/super-admin/dashboard.blade.php ENDPATH**/ ?>