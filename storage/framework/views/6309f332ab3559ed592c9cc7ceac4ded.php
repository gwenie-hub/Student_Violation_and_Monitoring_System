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
<div class="p-4">
    <h1 class="text-xl font-bold mb-4 flex items-center gap-2">
        <i class="fas fa-exclamation-circle text-blue-600"></i> Student Violations
    </h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4 text-sm">
            <i class="fas fa-check-circle mr-1"></i><?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="bg-white rounded shadow p-4 max-w-xl">
        <form action="<?php echo e(route('disciplinary.sanctions.apply.post')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <label for="violation_id" class="block text-sm font-medium text-gray-700">Select Violation</label>
                <select name="violation_id" id="violation_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                    <option value="">-- Choose Violation --</option>
                    <?php $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$violation->sanction): ?>
                            <option value="<?php echo e($violation->id); ?>">
                                [<?php echo e($violation->student_id); ?>] <?php echo e($violation->first_name); ?> <?php echo e($violation->middle_name); ?> <?php echo e($violation->last_name); ?> - <?php echo e($violation->violation); ?> (<?php echo e($violation->offense_type); ?>)
                            </option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="sanction" class="block text-sm font-medium text-gray-700">Sanction</label>
                <select name="sanction" id="sanction" class="mt-1 block w-full rounded border-gray-300 shadow-sm" required>
                    <option value="">-- Choose Sanction --</option>
                    <?php $__currentLoopData = ['Warning', 'Community Service', 'Suspension - 1 Day', 'Suspension - 3 Days', 'Parental Conference']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($option); ?>"><?php echo e($option); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                    <i class="fas fa-check mr-1"></i> Apply Sanction
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/disciplinary/apply-sanction.blade.php ENDPATH**/ ?>