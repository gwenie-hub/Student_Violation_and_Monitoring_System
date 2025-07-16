<div class="d-flex flex-column align-items-center">
    <!--[if BLOCK]><![endif]--><?php if($currentPhoto): ?>
        <img 
            src="<?php echo e(asset('storage/' . $currentPhoto)); ?>" 
            alt="Profile Photo" 
            class="rounded-circle shadow mb-2"
            style="width: 80px; height: 80px; object-fit: cover;"
        >
    <?php else: ?>
        <div 
            class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white shadow mb-2"
            style="width: 80px; height: 80px;">
            <i class="bi bi-person-fill fs-2"></i>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <div class="fw-semibold text-center mb-2">
        <?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->mname); ?> <?php echo e(Auth::user()->lname); ?>

    </div>

    <form wire:submit.prevent="updatedPhoto" class="w-100 text-center">
        <label for="photoUpload" class="btn btn-sm btn-outline-primary">
            <i class="bi bi-upload"></i> Change Photo
        </label>
        <input type="file" wire:model="photo" id="photoUpload" class="d-none">
        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
            <div class="text-danger small mt-1"><?php echo e($message); ?></div> 
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
    </form>

</div>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/livewire/admin/sidebar-photo-upload.blade.php ENDPATH**/ ?>