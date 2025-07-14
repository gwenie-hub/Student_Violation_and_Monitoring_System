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

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Disciplinary Committee Dashboard</h1>

    
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('disciplinary.violation-records');

$__html = app('livewire')->mount($__name, $__params, 'lw-4237145929-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/disciplinary/dashboard.blade.php ENDPATH**/ ?>