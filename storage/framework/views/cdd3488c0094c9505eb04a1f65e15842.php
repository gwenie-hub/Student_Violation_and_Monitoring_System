<aside class="w-100 d-flex flex-column">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.sidebar-photo-upload');

$__html = app('livewire')->mount($__name, $__params, 'lw-3842953539-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

    <nav class="flex-grow-1 mt-3">
        <ul class="nav flex-column gap-1 fw-medium text-primary">

            <li class="nav-item">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                    <i class="bi bi-house-door-fill fs-5 text-primary"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo e(route('admin.student-violations')); ?>" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                    <i class="bi bi-journal-text fs-5 text-primary"></i>
                    <span>Student Records</span>
                </a>
            </li>

            <!-- Collapsible Settings Menu -->
            <li class="nav-item">
                <button id="toggleSettingsMenu" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-primary hover-bg w-100 border-0 bg-transparent">
                    <i class="bi bi-gear-fill fs-5 text-primary"></i>
                    <span>Settings</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </button>

                <div id="settingsMenuContainer" class="d-none ms-4 mt-1">
                    <ul class="nav flex-column gap-1">
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'profile-info'])); ?>" class="nav-link px-2 py-1 text-primary">Profile Info</a></li>
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'change-password'])); ?>" class="nav-link px-2 py-1 text-primary">Change Password</a></li>
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'two-factor'])); ?>" class="nav-link px-2 py-1 text-primary">Two Factor Auth</a></li>
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'logout-sessions'])); ?>" class="nav-link px-2 py-1 text-primary">Logout Sessions</a></li>
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'delete-account'])); ?>" class="nav-link px-2 py-1 text-danger">Delete Account</a></li>
                    </ul>
                </div>
            </li>

            <!-- Logout -->
            <li class="nav-item mt-2">
                <form method="POST" action="<?php echo e(route('custom.logout')); ?>" class="w-100">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn d-flex align-items-center gap-2 w-100 text-danger bg-light border-0 rounded px-3 py-2 fw-semibold">
                        <i class="bi bi-box-arrow-right fs-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>

        </ul>
    </nav>
</aside>
<?php /**PATH C:\xampp\htdocs\StudentViolationAndMonitoring_System\resources\views/partials/sidebar-admin.blade.php ENDPATH**/ ?>