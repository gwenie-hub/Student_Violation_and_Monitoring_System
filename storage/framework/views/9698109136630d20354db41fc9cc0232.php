<div class="p-6 max-w-7xl mx-auto">

    
    <a href="<?php echo e(route('superadmin.dashboard')); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6 font-semibold">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to Dashboard
    </a>

    
    <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <div class="mb-6 w-full md:w-1/3">
        <label for="roleFilter" class="block text-sm font-medium text-gray-700 mb-1">Filter by Role</label>
        <select id="roleFilter" class="block w-full p-3 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">-- All Roles --</option>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($role->name); ?>"><?php echo e(ucfirst($role->name)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </select>
    </div>

    
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-200 shadow-sm rounded">
            <thead class="bg-gray-50">
                <tr>
                    <th class="border border-gray-200 p-3 text-left text-sm font-medium text-gray-600">Name</th>
                    <th class="border border-gray-200 p-3 text-left text-sm font-medium text-gray-600">Email</th>
                    <th class="border border-gray-200 p-3 text-left text-sm font-medium text-gray-600">Role</th>
                    <th class="border border-gray-200 p-3 text-center text-sm font-medium text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-role="<?php echo e($user->getRoleNames()->first()); ?>">
                        <td class="border border-gray-200 p-3 text-gray-700"><?php echo e($user->name); ?></td>
                        <td class="border border-gray-200 p-3 text-gray-700"><?php echo e($user->email); ?></td>
                        <td class="border border-gray-200 p-3 text-gray-700"><?php echo e($user->getRoleNames()->join(', ')); ?></td>
                        <td class="border border-gray-200 p-3 text-center">
                            <button 
                                wire:click="deleteUser(<?php echo e($user->id); ?>)" 
                                onclick="return confirm('Are you sure you want to delete this user?')" 
                                class="inline-flex items-center px-3 py-1 text-red-600 hover:bg-red-100 rounded transition duration-150 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    
    <script>
        document.getElementById('roleFilter').addEventListener('change', function () {
            const selectedRole = this.value.toLowerCase();
            const rows = document.querySelectorAll('#userTableBody tr');

            rows.forEach(row => {
                const role = row.getAttribute('data-role')?.toLowerCase();
                if (!selectedRole || role === selectedRole) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</div>
<?php /**PATH C:\xampp\htdocs\StudentViolationAndMonitoring_System\resources\views/livewire/super-admin/manage-accounts.blade.php ENDPATH**/ ?>