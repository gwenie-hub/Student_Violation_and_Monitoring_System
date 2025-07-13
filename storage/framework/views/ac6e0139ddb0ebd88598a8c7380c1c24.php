

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('partials.sidebar-disciplinary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Violation Reports</h1>

    
    <div class="bg-white p-4 rounded shadow mb-6">
        <form method="GET" action="<?php echo e(route('disciplinary.reports')); ?>" class="flex gap-4 flex-wrap">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                <input type="date" name="from" class="border px-3 py-2 rounded w-full">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                <input type="date" name="to" class="border px-3 py-2 rounded w-full">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="type" class="border px-3 py-2 rounded w-full">
                    <option value="">All</option>
                    <option value="minor">Minor</option>
                    <option value="major">Major</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Filter
                </button>
            </div>
        </form>
    </div>

    
    <div class="bg-white shadow rounded p-4">
        <table class="min-w-full border text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="border px-4 py-2 text-left">Student</th>
                    <th class="border px-4 py-2 text-left">Violation</th>
                    <th class="border px-4 py-2 text-left">Type</th>
                    <th class="border px-4 py-2 text-left">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $violations ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="px-4 py-2"><?php echo e($violation->student->name ?? 'N/A'); ?></td>
                        <td class="px-4 py-2"><?php echo e($violation->description ?? 'N/A'); ?></td>
                        <td class="px-4 py-2 capitalize"><?php echo e($violation->type ?? 'N/A'); ?></td>
                        <td class="px-4 py-2"><?php echo e($violation->created_at->format('M d, Y')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(empty($violations) || count($violations) === 0): ?>
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No reports found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/disciplinary/reports.blade.php ENDPATH**/ ?>