<!-- resources/views/partials/sidebar.blade.php -->

<aside class="w-64 bg-white shadow-lg border-r p-6">
    <!-- Logo & Title -->
    <div class="text-center mb-6">
        <img src="<?php echo e(asset('images/logo4.png')); ?>" alt="Logo" class="h-16 w-16 mx-auto mb-3">
        <h2 class="text-xl font-bold text-gray-800">Disciplinary Menu</h2>
    </div>

    <!-- Navigation -->
    <nav class="flex flex-col space-y-2 text-black">
        <a href="<?php echo e(route('disciplinary.dashboard')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Dashboard Overview</a>
        <a href="<?php echo e(route('violations.index')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Violation Records</a>
        <a href="<?php echo e(route('sanctions.apply')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Apply Sanctions</a>
        <a href="<?php echo e(route('parents.notify')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Notify Parents</a>
        <a href="<?php echo e(route('tracking.status')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Status Tracking</a>
        <a href="<?php echo e(route('reports.index')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Reports</a>

        <!-- Logout Button -->
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="pt-4">
            <?php echo csrf_field(); ?>
            <button type="submit" class="text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded w-full">
                Logout
            </button>
        </form>
    </nav>
</aside>

<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>