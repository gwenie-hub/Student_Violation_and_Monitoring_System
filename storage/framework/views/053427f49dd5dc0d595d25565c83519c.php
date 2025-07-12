

<?php $__env->startSection('sidebar'); ?>
<aside class="w-64 bg-white shadow-md p-6 border-r min-h-screen">
    
    <ul class="space-y-2 text-black">
        <li>
            <a href="<?php echo e(route('disciplinary.dashboard')); ?>" class="block px-3 py-2 rounded hover:bg-gray-100">
                Dashboard
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('disciplinary.violations')); ?>" class="block px-3 py-2 rounded hover:bg-gray-100">
                Student Violations
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('disciplinary.reports')); ?>" class="block px-3 py-2 rounded hover:bg-gray-100">
                Reports
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('disciplinary.notifications')); ?>" class="block px-3 py-2 rounded hover:bg-gray-100">
                Notifications
            </a>
        </li>

        <li class="mt-4">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-gray-100">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</aside>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/disciplinary/dashboard.blade.php ENDPATH**/ ?>