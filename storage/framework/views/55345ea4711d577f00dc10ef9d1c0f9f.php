<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-600 to-blue-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">

        
        <div class="text-center">
            <a href="/">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="w-16 h-16 mx-auto rounded-full shadow-lg">
            </a>
        </div>

        
        <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow-lg text-gray-900">
            <?php if(session('status')): ?>
                <div class="mb-4 font-medium text-sm text-green-600">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" required autofocus class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-300">
                </div>

                
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-blue-300">
                </div>

                
                <div class="flex items-center mb-4">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-sm text-gray-700">Remember me</label>
                </div>

                <div class="flex items-center justify-between">
                    <?php if(Route::has('password.request')): ?>
                        <a class="text-sm text-blue-500 hover:underline" href="<?php echo e(route('password.request')); ?>">
                            Forgot your password?
                        </a>
                    <?php endif; ?>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/auth/login.blade.php ENDPATH**/ ?>