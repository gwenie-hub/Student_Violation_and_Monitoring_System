<div class="p-6">
    
    <div class="mb-4">
        <a href="<?php echo e(route('professor.dashboard')); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-semibold">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Dashboard
        </a>
    </div>

    
    <form wire:submit.prevent="submit" class="space-y-4">
        <div>
            <label class="block font-medium">Last Name</label>
            <input type="text" wire:model.defer="last_name" class="w-full border rounded px-3 py-2" required>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <label class="block font-medium">First Name</label>
            <input type="text" wire:model.defer="first_name" class="w-full border rounded px-3 py-2" required>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <label class="block font-medium">Middle Name</label>
            <input type="text" wire:model.defer="middle_name" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-medium">Course</label>
            <input type="text" wire:model.defer="course" class="w-full border rounded px-3 py-2" required>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['course'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <label class="block font-medium">Year and Section</label>
            <input type="text" wire:model.defer="year_section" class="w-full border rounded px-3 py-2" required>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['year_section'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <label class="block font-medium">Violation</label>
            <input type="text" wire:model.defer="violation" class="w-full border rounded px-3 py-2" required>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['violation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <label class="block font-medium">Offense Type</label>
            <select wire:model.defer="offense_type" class="w-full border rounded px-3 py-2" required>
                <option value="">Select Offense Type</option>
                <option value="Minor">Minor</option>
                <option value="Major">Major</option>
            </select>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['offense_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            Submit Violation
        </button>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/livewire/violation-form.blade.php ENDPATH**/ ?>