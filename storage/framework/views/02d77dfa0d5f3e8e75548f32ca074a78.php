<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php echo $__env->yieldContent('content'); ?>  
        </div>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/layouts/app.blade.php ENDPATH**/ ?>