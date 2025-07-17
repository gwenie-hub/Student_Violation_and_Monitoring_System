<div class="container pt-1 pb-5" style="background: #f8fafc; min-height: 30vh;">
    <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
        <div class="alert alert-success mb-4 text-center" style="font-size: 1rem;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="card mx-auto p-4 border-0 mt-2" style="max-width: 600px; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
        <h4 class="mb-4 text-center fw-semibold" style="color: #222;">Report Student Violation</h4>
        <form wire:submit.prevent="submit" class="row g-3">
            
            <div class="col-md-6">
                <label class="form-label">Student ID</label>
                <input type="number" wire:model.defer="student_id" class="form-control" required placeholder="Student ID">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['student_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" wire:model.defer="last_name" class="form-control" required placeholder="Last Name">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            
            <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" wire:model.defer="first_name" class="form-control" required placeholder="First Name">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Middle Name</label>
                <input type="text" wire:model.defer="middle_name" class="form-control" placeholder="Middle Name (optional)">
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Course</label>
                <input type="text" wire:model.defer="course" class="form-control" required placeholder="Course">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['course'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Year and Section</label>
                <input type="text" wire:model.defer="year_section" class="form-control" required placeholder="e.g. 3A, 4B">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['year_section'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            
            <div class="col-12">
                <label class="form-label">Violation</label>
                <input type="text" wire:model.defer="violation" class="form-control" required placeholder="Describe the violation">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['violation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            
            <div class="col-12">
                <label class="form-label">Offense Type</label>
                <select wire:model.defer="offense_type" class="form-select" required>
                    <option value="">Select Offense Type</option>
                    <option value="Minor">Minor</option>
                    <option value="Major">Major</option>
                </select>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['offense_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            
            <div class="col-12 text-end mt-3">
                <button type="submit"
                    class="btn btn-primary px-4"
                    style="font-weight: 500;"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove>Submit Violation</span>
                    <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/livewire/violation-form.blade.php ENDPATH**/ ?>