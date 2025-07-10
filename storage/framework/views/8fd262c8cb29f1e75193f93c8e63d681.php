
<aside class="bg-white shadow-md h-full p-4 w-64">
    <div class="flex justify-center mb-6">
        <img src="<?php echo e(asset('images/logo2.png')); ?>" alt="Logo" class="w-16 h-16 rounded-full shadow-md">
    </div>

    <h2 class="text-lg font-semibold text-center mb-4 text-gray-800">School Admin</h2>

    <ul class="space-y-2">
        <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="block px-4 py-2 rounded hover:bg-gray-200">Dashboard</a></li>
        <li><a href="<?php echo e(route('admin.violations')); ?>" class="block px-4 py-2 rounded hover:bg-gray-200">Unreviewed Violations</a></li>
        <li><a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Categorize Violations</a></li>
        <li><a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Update Status</a></li>
        <li><a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Reports</a></li>
        <li><a href="#" class="block px-4 py-2 rounded hover:bg-gray-200">Notifications</a></li>
        <li class="mt-4">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full text-left text-red-600 hover:bg-red-100 px-4 py-2 rounded">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</aside>
    <?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/layouts/sidebars/school-admin.blade.php ENDPATH**/ ?>