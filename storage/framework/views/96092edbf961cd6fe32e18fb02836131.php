<?php $__env->startSection('content'); ?>
<style>
    :root {
        --main-blue: #1d3557;
        --main-red: #e63946;
        --main-white: #fff;
        --main-light-blue: #e3eafc;
        --main-light-red: #fde7eb;
        --main-gray: #f1f3f5;
        --main-dark: #22223b;
    }
    .profile-card {
        border-radius: 1.1rem;
        box-shadow: 0 2px 12px 0 rgba(29,53,87,0.13);
        border: 2.5px solid var(--main-blue);
        background: var(--main-white);
        padding: 2rem 2.5rem 2rem 2.5rem;
        max-width: 900px;
        margin: 0 auto;
    }
    .profile-card h1 {
        color: var(--main-blue);
        font-weight: 700;
        margin-bottom: 1.5rem;
    }
    .profile-card .alert-success {
        background: var(--main-light-blue);
        color: var(--main-blue);
        border: 1.5px solid var(--main-blue);
        font-weight: 600;
    }
    .profile-card .alert-danger {
        background: var(--main-light-red);
        color: var(--main-red);
        border: 1.5px solid var(--main-red);
        font-weight: 600;
    }
</style>
<div class="profile-card mt-5 mb-5">
    <h1 class="h3 mb-4">Profile Settings</h1>

    <?php if(session('status')): ?>
        <div class="alert alert-success mb-4"><?php echo e(session('status')); ?></div>
    <?php elseif(session('message')): ?>
        <div class="alert alert-success mb-4"><?php echo e(session('message')); ?></div>
    <?php endif; ?>

    <div x-data="{ show: false, message: '' }"
         x-on:saved.window="show = true; message = '<?php echo e(session('message') ?? 'Saved.'); ?>'; setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition
         class="alert alert-success mb-4">
        <span x-text="message"></span>
    </div>

    <?php $section = request('section', 'profile-info'); ?>

    <?php if($section === 'profile-info'): ?>
        <div id="profile-info"></div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.update-profile-information-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-2346533638-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php elseif($section === 'change-password'): ?>
        <div id="change-password"></div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.update-password-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-2346533638-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php elseif($section === 'two-factor'): ?>
        <div id="two-factor"></div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.two-factor-authentication-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-2346533638-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php elseif($section === 'logout-sessions'): ?>
        <div id="logout-sessions"></div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.logout-other-browser-sessions-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-2346533638-3', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php elseif($section === 'delete-account' && Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures()): ?>
        <div id="delete-account"></div>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.delete-user-form');

$__html = app('livewire')->mount($__name, $__params, 'lw-2346533638-4', $__slots ?? [], get_defined_vars());

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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/profile/show.blade.php ENDPATH**/ ?>