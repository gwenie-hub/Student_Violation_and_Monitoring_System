<aside class="w-64 bg-white shadow-lg border-r p-6">
    <!-- Logo & Title -->
    <div class="text-center mb-6">
        <img src="<?php echo e(asset('images/logo1.png')); ?>" alt="Logo" class="h-16 w-16 mx-auto mb-3">
        <h2 class="text-xl font-bold text-gray-800">Super Admin</h2>
    </div>

    <!-- Navigation -->
    <nav class="flex flex-col space-y-2 text-gray-800">
        <a href="<?php echo e(route('superadmin.dashboard')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Dashboard</a>
        <a href="<?php echo e(route('superadmin.add-user')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Add User</a>
        <a href="<?php echo e(route('superadmin.manage-accounts')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Manage Accounts</a>
        <a href="<?php echo e(route('superadmin.student-records')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Student Records</a>
        <a href="<?php echo e(route('superadmin.system-logs')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">System Logs</a>
        <a href="<?php echo e(route('superadmin.reports-status')); ?>" class="hover:bg-gray-200 px-3 py-2 rounded">Reports</a>

        <!-- Logout -->
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="pt-4">
            <?php echo csrf_field(); ?>
            <button type="submit" class="text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded w-full">
                Logout
            </button>
        </form>
    </nav>
</aside>
<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/partials/sidebar-superadmin.blade.php ENDPATH**/ ?>