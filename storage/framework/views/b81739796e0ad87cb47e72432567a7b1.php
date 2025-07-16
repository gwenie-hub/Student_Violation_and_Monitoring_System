<?php $__env->startSection('sidebar'); ?>
    <?php if(auth()->user()->hasRole('admin')): ?>
        <?php echo $__env->make('partials.sidebar-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif(auth()->user()->hasRole('professor')): ?>
        <?php echo $__env->make('partials.sidebar-professor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif(auth()->user()->hasRole('superadmin')): ?>
        <?php echo $__env->make('partials.sidebar-superadmin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif(auth()->user()->hasRole('disciplinary_committee')): ?>
        <?php echo $__env->make('partials.sidebar-disciplinary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="fas fa-user-edit me-2"></i>
            <h5 class="mb-0">Edit Violation Sanction</h5>
        </div>

        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <h6 class="alert-heading"><i class="fas fa-exclamation-triangle me-2"></i>Please fix the following:</h6>
                    <ul class="mb-0 ps-3">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('disciplinary.update', $violation->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label fw-semibold">Student ID</label>
                        <div class="form-control bg-light"><?php echo e($violation->student_id); ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Student Name</label>
                        <div class="form-control bg-light">
                            <?php echo e($violation->last_name); ?>, <?php echo e($violation->first_name); ?> <?php echo e($violation->middle_name); ?>

                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label fw-semibold">Violation</label>
                        <div class="form-control bg-light"><?php echo e($violation->violation); ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Offense Type</label>
                        <div class="form-control bg-light text-capitalize"><?php echo e($violation->offense_type); ?></div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="sanction" class="form-label fw-semibold">Select Sanction <i class="fas fa-gavel ms-1 text-muted"></i></label>
                    <select name="sanction" id="sanction" class="form-select" required>
                        <option value="">-- Choose a sanction --</option>
                        <?php $__currentLoopData = ['Warning', 'Community Service', 'Suspension - 1 Day', 'Suspension - 3 Days', 'Parental Conference']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($option); ?>" <?php echo e(old('sanction', $violation->sanction) === $option ? 'selected' : ''); ?>>
                                <?php echo e($option); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success shadow-sm px-4">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\StudentViolationAndMonitoring_System\resources\views/disciplinary/edit.blade.php ENDPATH**/ ?>