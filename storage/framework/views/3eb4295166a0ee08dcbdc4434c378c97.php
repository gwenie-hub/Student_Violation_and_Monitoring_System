
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<aside class="w-full md:w-72 bg-white shadow-lg border-end p-4 d-flex flex-column min-vh-100" style="font-family: 'Inter', sans-serif;">
    
    
    <div class="d-flex flex-column align-items-center mb-4">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.sidebar-photo-upload');

$__html = app('livewire')->mount($__name, $__params, 'lw-133115575-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>

    
    <nav class="flex-grow-1 mt-3">
        <ul class="nav flex-column gap-1 fw-medium text-primary">
            <li class="nav-item">
                <a href="<?php echo e(route('disciplinary.dashboard')); ?>" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                    <i class="bi bi-speedometer2 fs-5 text-primary"></i>
                    <span>Dashboard Overview</span>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('disciplinary.notify.parents')); ?>" class="nav-link d-flex align-items-center gap-2 rounded px-3 py-2 text-decoration-none text-primary hover-bg">
                    <i class="bi bi-envelope-fill fs-5 text-primary"></i>
                    <span>Notify Parents</span>
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
</style>
<?php /**PATH C:\xampp\htdocs\StudentViolatioMonitoringSystem\resources\views/partials/sidebar-disciplinary.blade.php ENDPATH**/ ?>