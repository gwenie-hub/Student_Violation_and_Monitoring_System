

<?php $__env->startSection('sidebar'); ?>
    
    <aside class="w-64 bg-white shadow-md p-6 border-r min-h-screen">
        <div class="flex justify-center mb-6">
            <img src="<?php echo e(asset('images/logo2.png')); ?>" alt="Logo" class="h-16 w-16">
        </div>

        <h2 class="text-xl font-semibold text-center mb-4 text-gray-800">Disciplinary Committee</h2>

        <ul class="space-y-2 text-black">
            <li>
                <a href="<?php echo e(route('disciplinary.dashboard')); ?>" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('disciplinary.violations')); ?>" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Student Violations
                </a>
            </li>
            
            <li>
                <a href="<?php echo e(route('disciplinary.reports')); ?>" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Reports
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('disciplinary.notifications')); ?>" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Notifications
                </a>
            </li>
            <li class="mt-4">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </aside>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/disciplinary/violations.blade.php ENDPATH**/ ?>