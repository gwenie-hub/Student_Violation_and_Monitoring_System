<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Two-Factor Challenge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">

            
            <div class="flex justify-center mb-6">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="w-16 h-16 rounded-full shadow-lg">
            </div>

            
            <div class="flex justify-center space-x-4 mb-4">
                <button type="button"
                        id="authTab"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none"
                        onclick="showTab('auth')">
                    Auth Code
                </button>
                <button type="button"
                        id="recoveryTab"
                        class="px-4 py-2 text-sm font-medium text-blue-600 border border-blue-600 rounded hover:bg-blue-50 focus:outline-none"
                        onclick="showTab('recovery')">
                    Recovery Code
                </button>
            </div>

            
            <div id="authInstruction" class="mb-4 text-sm text-gray-600">
                Please enter the authentication code from your authenticator app.
            </div>
            <div id="recoveryInstruction" class="mb-4 text-sm text-gray-600 hidden">
                Please enter one of your emergency recovery codes.
            </div>

            
            <?php if($errors->any()): ?>
                <div class="mb-4 text-red-600 text-sm">
                    <ul class="list-disc pl-4">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            
            <form method="POST" action="<?php echo e(route('two-factor.login')); ?>">
                <?php echo csrf_field(); ?>

                
                <div id="authInput">
                    <label for="code" class="block text-sm font-medium text-gray-700">Authentication Code</label>
                    <input id="code" name="code" type="text" inputmode="numeric" autocomplete="one-time-code"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" autofocus>
                </div>

                
                <div id="recoveryInput" class="hidden">
                    <label for="recovery_code" class="block text-sm font-medium text-gray-700">Recovery Code</label>
                    <input id="recovery_code" name="recovery_code" type="text" autocomplete="one-time-code"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
                </div>

                
                <div class="mt-6 flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <script>
        function showTab(tab) {
            const authTab = document.getElementById('authTab');
            const recoveryTab = document.getElementById('recoveryTab');
            const authInput = document.getElementById('authInput');
            const recoveryInput = document.getElementById('recoveryInput');
            const authInstruction = document.getElementById('authInstruction');
            const recoveryInstruction = document.getElementById('recoveryInstruction');

            if (tab === 'auth') {
                authTab.classList.add('bg-blue-600', 'text-white');
                recoveryTab.classList.remove('bg-blue-600', 'text-white');
                recoveryTab.classList.add('border', 'border-blue-600', 'text-blue-600');

                authInput.classList.remove('hidden');
                authInstruction.classList.remove('hidden');
                recoveryInput.classList.add('hidden');
                recoveryInstruction.classList.add('hidden');
            } else {
                recoveryTab.classList.add('bg-blue-600', 'text-white');
                authTab.classList.remove('bg-blue-600', 'text-white');
                authTab.classList.add('border', 'border-blue-600', 'text-blue-600');

                authInput.classList.add('hidden');
                authInstruction.classList.add('hidden');
                recoveryInput.classList.remove('hidden');
                recoveryInstruction.classList.remove('hidden');
            }
        }

        // Show default tab on page load
        document.addEventListener('DOMContentLoaded', () => {
            showTab('auth');
        });
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/auth/two-factor-challenge.blade.php ENDPATH**/ ?>