<!-- Include in <head> of layout -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<!-- Sidebar Blade File -->
<aside class="w-full md:w-72 bg-white shadow-lg border-end p-4 d-flex flex-column min-vh-100" style="font-family: 'Inter', sans-serif;">
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.sidebar-photo-upload');

$__html = app('livewire')->mount($__name, $__params, 'lw-3591994352-0', $__slots ?? [], get_defined_vars());

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
            <li class="nav-item">
                <a href="<?php echo e(route('profile.show')); ?>"
                   class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg <?php echo e(request()->routeIs('profile.show') ? 'active' : ''); ?>">
                    <i class="bi bi-gear-fill fs-5 text-primary"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>

    <form method="POST" action="<?php echo e(route('custom.logout')); ?>" class="mt-4">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn d-flex align-items-center gap-2 w-100 text-danger bg-light border-0 rounded px-3 py-2 fw-semibold">
            <i class="bi bi-box-arrow-right fs-5"></i>
            <span>Logout</span>
        </button>
    </form>
</aside>

<style>
    .hover-bg:hover {
        background-color: #f0f8ff;
        transition: background-color 0.2s ease-in-out, transform 0.2s ease;
        transform: scale(1.01);
    }

    .nav-link.active, .nav-link:hover {
        font-weight: 600;
        color: #0d6efd !important;
    }
</style><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/partials/sidebar-admin.blade.php ENDPATH**/ ?>