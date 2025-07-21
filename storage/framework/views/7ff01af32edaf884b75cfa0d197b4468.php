
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<aside class="w-100 d-flex flex-column bg-white shadow-sm border-end min-vh-100" style="font-family: 'Inter', sans-serif;">
    
    
    <div class="d-flex flex-column align-items-center mb-4">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.sidebar-photo-upload');

$__html = app('livewire')->mount($__name, $__params, 'lw-356634163-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>

    
    <nav class="flex-grow-1 mt-3">
        <ul class="nav flex-column gap-1 fw-medium">
            <li class="nav-item">
                <a href="<?php echo e(route('disciplinary.dashboard')); ?>" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-dark sidebar-link">
                    <i class="bi bi-speedometer2 fs-5"></i>
                    <span>Dashboard Overview</span>
                </a>
            </li>

            <!-- Collapsible Settings Menu -->
            <li class="nav-item">
                <button id="toggleSettingsMenu" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-dark sidebar-link w-100 border-0 bg-transparent">
                    <i class="bi bi-gear-fill fs-5"></i>
                    <span>Settings</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </button>
                <div id="settingsMenuContainer" class="d-none ms-4 mt-1">
                    <ul class="nav flex-column gap-1">
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'profile-info'])); ?>" class="nav-link px-2 py-1 text-dark">Profile Info</a></li>
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'change-password'])); ?>" class="nav-link px-2 py-1 text-dark">Change Password</a></li>
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'two-factor'])); ?>" class="nav-link px-2 py-1 text-dark">Two Factor Auth</a></li>
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'logout-sessions'])); ?>" class="nav-link px-2 py-1 text-dark">Logout Sessions</a></li>
                        <li><a href="<?php echo e(route('profile.show', ['section' => 'delete-account'])); ?>" class="nav-link px-2 py-1 text-danger">Delete Account</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item mt-2">
                <form method="POST" action="<?php echo e(route('custom.logout')); ?>" class="w-100">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn d-flex align-items-center gap-2 w-100 text-danger bg-white border border-danger rounded px-3 py-2 fw-semibold sidebar-link">
                        <i class="bi bi-box-arrow-right fs-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>

        </ul>
    </nav>
</aside>

<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/partials/sidebar-disciplinary.blade.php ENDPATH**/ ?>