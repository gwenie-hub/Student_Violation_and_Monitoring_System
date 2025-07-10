

<?php $__env->startSection('sidebar'); ?>
    
    <aside class="w-64 bg-white shadow-md p-6 border-r min-h-screen">
        
        <div class="flex justify-center mb-6">
            <img src="<?php echo e(asset('images/logo2.png')); ?>" alt="Logo" class="h-16 w-16">
        </div>

        
        <h2 class="text-xl font-semibold text-center mb-4 text-gray-800">School Admin</h2>
        <ul class="space-y-2 text-black">
            <li>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Dashboard Overview
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.violations')); ?>" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    View Unreviewed Violations
                </a>
            </li>
            <li>
                <a href="#" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Categorize Violations
                </a>
            </li>
            <li>
                <a href="#" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Update Violation Status
                </a>
            </li>
            <li>
                <a href="#" class="block hover:bg-gray-100 px-3 py-2 rounded">
                    Reports
                </a>
            </li>
            <li>
                <a href="#" class="block hover:bg-gray-100 px-3 py-2 rounded">
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

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col flex-1 ml-4 mt-4">
        
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Student Violation Records</h1>

        
        <div class="bg-white rounded-xl shadow p-6">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.manage-violations');

$__html = app('livewire')->mount($__name, $__params, 'lw-3083219743-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>