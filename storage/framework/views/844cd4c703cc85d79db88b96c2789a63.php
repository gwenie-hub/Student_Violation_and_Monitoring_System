<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
    <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold">Add New User</h2>
        <a href="javascript:history.back()" class="text-sm text-indigo-600 hover:underline">
            ← Back
        </a>
    </div>

    <form wire:submit.prevent="addUser" class="space-y-4">
        <div>
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input
                type="email"
                id="email"
                wire:model.defer="email"
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
            >
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="fname" class="block font-medium text-gray-700">First Name</label>
                <input
                    type="text"
                    id="fname"
                    wire:model.defer="fname"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                >
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <div>
                <label for="mname" class="block font-medium text-gray-700">Middle Name</label>
                <input
                    type="text"
                    id="mname"
                    wire:model.defer="mname"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                >
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['mname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <div>
                <label for="lname" class="block font-medium text-gray-700">Last Name</label>
                <input
                    type="text"
                    id="lname"
                    wire:model.defer="lname"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
                >
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <div>
            <label for="role" class="block font-medium text-gray-700">Role</label>
            <select
                id="role"
                wire:model.defer="role"
                class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
            >
                <option value="">-- Select Role --</option>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $availableRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($availableRole); ?>"><?php echo e(ucfirst(str_replace('_', ' ', $availableRole))); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </select>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="pt-4">
            <button
                type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>Add User</span>
                <span wire:loading class="flex items-center">
                    <svg class="animate-spin h-5 w-5 text-white mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    Loading...
                </span>
            </button>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\StudentViolatioMonitoringSystem\resources\views/livewire/super-admin/add-user.blade.php ENDPATH**/ ?>