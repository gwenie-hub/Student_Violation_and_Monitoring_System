<nav class="bg-white shadow-md px-6 py-3">
    <div class="flex justify-between items-center">
        <!-- Left: Role-Based Dashboard Title -->
        <h1 class="text-xl font-bold text-black">
            <?php
                $user = auth()->user();
            ?>

            <?php if($user->hasRole('super_admin')): ?>
                Super Admin Dashboard
            <?php elseif($user->hasRole('school_admin')): ?>
                School Admin Dashboard
            <?php elseif($user->hasRole('professor')): ?>
                Professor Dashboard
            <?php elseif($user->hasRole('disciplinary_committee')): ?>
                Disciplinary Committee Dashboard
            <?php elseif($user->hasRole('guidance_counselor')): ?>
                Guidance Counselor Dashboard
            <?php elseif($user->hasRole('parent')): ?>
                Parent Dashboard
            <?php else: ?>
                Dashboard
            <?php endif; ?>
        </h1>

        <!-- Right: Navigation -->
        <ul class="flex items-center space-x-6 text-gray-800">
            
            
        </ul>
    </div>
</nav>

<?php /**PATH C:\xampp\htdocs\Student_Violation_and_Monitoring_System\resources\views/components/navbar.blade.php ENDPATH**/ ?>