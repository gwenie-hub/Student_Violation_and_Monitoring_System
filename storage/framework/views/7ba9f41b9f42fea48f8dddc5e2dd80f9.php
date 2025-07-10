<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parent Dashboard
        </h2>
     <?php $__env->endSlot(); ?>

    <?php $__env->startSection('content'); ?>
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r min-h-screen p-6">
            <!-- Logo -->
            <div class="mb-6">
                <img src="<?php echo e(asset('images/logo5.png')); ?>" alt="Logo" class="h-12 mx-auto mb-4">
                <h2 class="text-xl font-bold text-center text-black">Parent Menu</h2>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2 text-black">
                <a href="<?php echo e(route('parent.dashboard')); ?>" class="block hover:bg-gray-200 px-3 py-2 rounded">View Child Violations</a>
                <a href="<?php echo e(route('notifications.index')); ?>" class="block hover:bg-gray-200 px-3 py-2 rounded">Notifications</a>
                <li class="nav-item mt-3">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="nav-link text-danger bg-transparent border-0 p-0">
                    Logout
                </button>
            </form>
        </li>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold text-gray-800">Welcome, <?php echo e(auth()->user()->name); ?></h1>

            <?php if($student): ?>
                <h2 class="mt-4 text-lg font-semibold text-gray-700">Child: <?php echo e($student->student_number); ?></h2>

                <?php if($violations->isEmpty()): ?>
                    <p class="mt-3 text-gray-600">No violations recorded for your child.</p>
                <?php else: ?>
                    <div class="overflow-x-auto mt-4">
                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2">Date</th>
                                    <th class="border px-4 py-2">Violation</th>
                                    <th class="border px-4 py-2">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="bg-white border-t hover:bg-gray-50">
                                        <td class="border px-4 py-2"><?php echo e($violation->created_at->format('Y-m-d')); ?></td>
                                        <td class="border px-4 py-2"><?php echo e($violation->type); ?></td>
                                        <td class="border px-4 py-2"><?php echo e($violation->description); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <p class="mt-4 text-gray-600">No student linked to your account.</p>
            <?php endif; ?>
        </main>
    </div>
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/parent/dashboard.blade.php ENDPATH**/ ?>