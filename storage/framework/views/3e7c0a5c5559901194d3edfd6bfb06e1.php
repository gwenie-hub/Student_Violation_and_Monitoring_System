<div class="min-h-screen bg-gray-50 flex items-center justify-center py-10 px-4">
    <div class="w-full max-w-6xl bg-white shadow-lg rounded-lg border border-blue-100 overflow-hidden">
        
        <!--[if BLOCK]><![endif]--><?php if(session('message')): ?>
            <div class="px-6 pt-6">
                <div class="flex items-center justify-between bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded-md">
                    <span class="text-sm font-medium"><?php echo e(session('message')); ?></span>
                    <button type="button" class="hover:text-blue-900" onclick="this.closest('div').remove()">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between px-6 pt-6 pb-4 border-b border-blue-100 gap-3">
            <h2 class="text-xl sm:text-2xl font-bold text-blue-800 flex items-center gap-2">
                <!--[if BLOCK]><![endif]--><?php switch($status):
                    case ('approved'): ?>
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <?php break; ?>
                    <?php case ('pending'): ?>
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                        </svg>
                        <?php break; ?>
                    <?php default: ?>
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                        </svg>
                <?php endswitch; ?><!--[if ENDBLOCK]><![endif]-->
                <span><?php echo e(ucfirst($status)); ?> Violations</span>
            </h2>
            <a href="<?php echo e(route('admin.dashboard')); ?>"
               class="inline-flex items-center gap-2 bg-blue-50 border border-blue-200 text-blue-700 px-4 py-2 rounded-md hover:bg-blue-100 transition text-sm font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-blue-50 text-blue-800 uppercase text-sm font-semibold">
                    <tr>
                        <th class="px-6 py-3 text-left">Student Name</th>
                        <th class="px-6 py-3 text-left">Course / Section</th>
                        <th class="px-6 py-3 text-left">Violation</th>
                        <th class="px-6 py-3 text-left">Offense Type</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-t hover:bg-blue-50 transition">
                            <td class="px-6 py-4 font-medium"><?php echo e($violation->full_name); ?></td>
                            <td class="px-6 py-4"><?php echo e($violation->course); ?> / <?php echo e($violation->year_section); ?></td>
                            <td class="px-6 py-4"><?php echo e($violation->violation); ?></td>
                            <td class="px-6 py-4 capitalize"><?php echo e($violation->offense_type); ?></td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    <?php if($violation->status === 'approved'): ?> bg-green-100 text-green-700
                                    <?php elseif($violation->status === 'pending'): ?> bg-yellow-100 text-yellow-700
                                    <?php elseif($violation->status === 'rejected'): ?> bg-red-100 text-red-700
                                    <?php else: ?> bg-gray-100 text-gray-600 <?php endif; ?>">
                                    <?php echo e(ucfirst($violation->status)); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <!--[if BLOCK]><![endif]--><?php if($status === 'pending'): ?>
                                        <button wire:click="approve(<?php echo e($violation->id); ?>)"
                                                class="flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition text-sm shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M5 13l4 4L19 7" />
                                            </svg>
                                            Approve
                                        </button>
                                        <button wire:click="reject(<?php echo e($violation->id); ?>)"
                                                class="flex items-center gap-1 bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition text-sm shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Reject
                                        </button>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <button wire:click="delete(<?php echo e($violation->id); ?>)"
                                            class="flex items-center gap-1 bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition text-sm shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center px-6 py-12 text-gray-400">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 mb-2 text-blue-200" fill="none" stroke="currentColor"
                                         stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="text-sm">No <?php echo e($status); ?> violations found.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/livewire/admin/violation-status-view.blade.php ENDPATH**/ ?>