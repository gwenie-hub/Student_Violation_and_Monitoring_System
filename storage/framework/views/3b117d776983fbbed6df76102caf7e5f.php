<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Violation Monitoring System</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex min-h-screen">

        
        <div class="flex-1">
            
            

            <main class="p-6">
                <?php echo e($slot); ?> 
            </main>
        </div>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/layouts/super-admin.blade.php ENDPATH**/ ?>