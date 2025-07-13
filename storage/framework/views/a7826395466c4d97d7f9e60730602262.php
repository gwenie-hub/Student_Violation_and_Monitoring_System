

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('partials.sidebar-disciplinary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Notify Parents</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('parents.notify.send')); ?>" class="space-y-4 max-w-lg">
        <?php echo csrf_field(); ?>

        
        <div>
            <label class="block mb-1 font-medium">Student Name</label>
            <input type="text" name="student_name" value="<?php echo e(old('student_name')); ?>" class="w-full border rounded px-4 py-2" placeholder="Enter student name" required>
        </div>

        
        <div>
            <label class="block mb-1 font-medium">Parent Email</label>
            <input type="email" name="parent_email" value="<?php echo e(old('parent_email')); ?>" class="w-full border rounded px-4 py-2" placeholder="Enter parent email" required>
        </div>

        
        <div>
            <label class="block mb-1 font-medium">Message</label>
            <textarea name="message" rows="4" class="w-full border rounded px-4 py-2" placeholder="Enter message to parent..." required><?php echo e(old('message')); ?></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Send Notification</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/disciplinary/notify-parents.blade.php ENDPATH**/ ?>