<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?> 
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="bg-gray-100 text-gray-900">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg border-r">
            <?php
                $user = Auth::user();
            ?>

            <?php if($user->hasRole('super_admin')): ?>
                <?php echo $__env->make('partials.sidebar-superadmin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php elseif($user->hasRole('school_admin')): ?>
                <?php echo $__env->make('partials.sidebar-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php elseif($user->hasRole('professor')): ?>
                <?php echo $__env->make('partials.sidebar-professor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php elseif($user->hasRole('disciplinary_committee')): ?>
                <?php echo $__env->make('partials.sidebar-disciplinary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php elseif($user->hasRole('parent')): ?>
                <?php echo $__env->make('partials.sidebar-parent', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script>
        window.addEventListener('violation-submitted', function () {
            setTimeout(function() {
                window.location.href = '/dashboard';
            }, 1200); // Wait for flash message
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\StudentViolatioMonitoringSystem\resources\views/layouts/app.blade.php ENDPATH**/ ?>