 

<?php $__env->startSection('content'); ?>
    <h1 class="text-3xl font-bold mb-6">Invite New User</h1>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('super-admin.add-user');

$__html = app('livewire')->mount($__name, $__params, 'lw-721979578-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/super-admin/users/create.blade.php ENDPATH**/ ?>