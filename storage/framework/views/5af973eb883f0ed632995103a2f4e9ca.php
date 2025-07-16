<?php $__env->startSection('content'); ?>
<div class="container mx-auto">
    <h2 class="text-xl font-semibold mb-4">Profile Settings</h2>

    
    <?php if(session('status')): ?>
        <div class="alert alert-success mb-4">
            <?php echo e(session('status')); ?>

        </div>
    <?php elseif(session('message')): ?>
        <div class="alert alert-success mb-4">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

    
    <div x-data="{ show: false, message: '' }"
         x-on:saved.window="show = true; message = '<?php echo e(session('message') ?? 'Saved.'); ?>'; setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition
         class="alert alert-success mb-4">
        <span x-text="message"></span>
    </div>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.update-profile-information-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3684948584-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <hr class="my-6">

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.update-password-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3684948584-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <hr class="my-6">

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.two-factor-authentication-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3684948584-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <hr class="my-6">

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.logout-other-browser-sessions-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3684948584-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <?php if(Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures()): ?>
        <hr class="my-6">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.delete-user-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-3684948584-4', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\StudentViolationAndMonitoring_System\resources\views/profile/show.blade.php ENDPATH**/ ?>