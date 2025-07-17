<?php $__env->startSection('content'); ?>
<div class="pt-3 pb-4 px-4">
    <h2 class="text-xl fw-semibold mb-3">Submit Violation</h2>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('violation-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-282146706-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/professor/violations/create.blade.php ENDPATH**/ ?>