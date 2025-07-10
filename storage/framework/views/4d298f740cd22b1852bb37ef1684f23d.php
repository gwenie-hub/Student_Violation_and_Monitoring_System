<div class="w-64 bg-white h-screen shadow-lg p-4">
    <div class="flex justify-center mb-6">
        <img src="<?php echo e(asset('images/logo1.png')); ?>" alt="Logo" class="w-16 h-16 rounded-full shadow">
    </div>

    <h2 class="text-xl font-semibold text-center mb-4 text-gray-800">Super Admin</h2>

    <ul class="space-y-2">
        <li><a href="<?php echo e(route('superadmin.dashboard')); ?>" class="block hover:bg-gray-100 px-3 py-2 rounded">Dashboard Overview</a></li>
        <li><a href="/user_management" class="block hover:bg-gray-100 px-3 py-2 rounded">User Management</a></li>
        <li class="ml-4"><a href="/add_user" class="block hover:bg-gray-100 px-3 py-2 rounded">➤ Add User</a></li>
        <li class="ml-4"><a href="/manage_accounts" class="block hover:bg-gray-100 px-3 py-2 rounded">➤ Manage Accounts</a></li>
        <li><a href="/student_records" class="block hover:bg-gray-100 px-3 py-2 rounded">Student Records</a></li>
        <li><a href="/system_logs" class="block hover:bg-gray-100 px-3 py-2 rounded">System Logs</a></li>
        <li><a href="/reports" class="block hover:bg-gray-100 px-3 py-2 rounded">Reports & Status Logs</a></li>
        <li class="mt-4">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full text-left text-red-600 hover:bg-red-100 px-3 py-2 rounded">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/layouts/sidebars/super-admin.blade.php ENDPATH**/ ?>