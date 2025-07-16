<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App Layout</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-6 px-4">
        <?php echo e($slot); ?>

    </div>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>