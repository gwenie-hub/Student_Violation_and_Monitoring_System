<?php $__env->startPush('head'); ?>
    <!-- Bootstrap Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body, .font-roboto { font-family: 'Roboto', Arial, sans-serif !important; }
        .table-modern th, .table-modern td { vertical-align: middle !important; }
    </style>
<?php $__env->stopPush(); ?>



<?php $__env->startSection('content'); ?>
<div class="p-3 sm:p-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">My Submitted Violations</h2>

    <!-- Flash Messages -->
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            <i class="bi bi-check-circle-fill me-1"></i> <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <i class="bi bi-x-circle-fill me-1"></i> <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if($violations->count()): ?>
        <div class="overflow-x-auto rounded-3 shadow border bg-white font-roboto">
            <table class="w-full text-left min-w-[600px] align-middle table-modern text-sm">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Student</th>
                        <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Course</th>
                        <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Violation</th>
                        <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Offense Type</th>
                        <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Status</th>
                        <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Date</th>
                        <th class="px-3 py-2 font-semibold text-gray-700 whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b group transition hover:bg-blue-50 <?php echo e($loop->even ? 'bg-gray-50' : 'bg-white'); ?>">
                            <td class="px-3 py-2">
                                <span class="fw-medium text-gray-900"><?php echo e($violation->last_name); ?>, <?php echo e($violation->first_name); ?> <?php echo e($violation->middle_name); ?></span>
                            </td>
                            <td class="px-3 py-2 text-gray-700"><?php echo e($violation->course); ?> - <?php echo e($violation->year_section); ?></td>
                            <td class="px-3 py-2 text-gray-700"><?php echo e($violation->violation); ?></td>
                            <td class="px-3 py-2 text-gray-700"><?php echo e($violation->offense_type); ?></td>
                            <td class="px-3 py-2">
                                <?php if($violation->status === 'approved'): ?>
                                    <span class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill text-xs fw-semibold bg-success bg-opacity-10 text-success border border-success-subtle">
                                        <i class="bi bi-check-circle-fill me-1"></i> Approved
                                    </span>
                                <?php else: ?>
                                    <span class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill text-xs fw-semibold bg-warning bg-opacity-10 text-warning border border-warning-subtle capitalize">
                                        <i class="bi bi-hourglass-split me-1"></i> <?php echo e($violation->status); ?>

                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-3 py-2 text-gray-600"><?php echo e($violation->created_at->format('M d, Y')); ?></td>
                            <td class="px-3 py-2">
                                <form action="<?php echo e(route('professor.violations.destroy', $violation->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this violation?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill bg-danger bg-opacity-10 text-danger hover:bg-danger hover:bg-opacity-25 hover:text-danger-emphasis text-xs fw-medium border border-danger-subtle transition">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <?php echo e($violations->links()); ?>

        </div>
    <?php else: ?>
        <p class="text-gray-600">You haven't submitted any violations yet.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/professor/violations/my-submissions.blade.php ENDPATH**/ ?>