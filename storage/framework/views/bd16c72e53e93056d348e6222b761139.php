<form wire:submit.prevent="submit" class="space-y-4 bg-white p-6 rounded shadow max-w-2xl mx-auto">
    
    <div>
        <label class="block font-medium">Student ID</label>
        <input type="number" wire:model.defer="student_id" class="w-full border rounded px-3 py-2" required>
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['student_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    
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
<?php /**PATH C:\xampp\htdocs\papasa\StudentViolationMonitoringSystem\resources\views/livewire/violation-form.blade.php ENDPATH**/ ?>