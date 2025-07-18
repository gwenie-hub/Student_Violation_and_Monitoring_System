<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Favicon (optional) -->
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">

    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- Tailwind & Livewire -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        #mainSidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 16rem;
            height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #e5e7eb;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            z-index: 1040;
            display: flex;
            flex-direction: column;
        }

        #mainSidebar.show {
            transform: translateX(0);
        }

        .sidebar-content {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
        }

        .sidebar-content::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-content::-webkit-scrollbar-thumb {
            background-color: #a78bfa;
            border-radius: 3px;
        }

        .sidebar-content::-webkit-scrollbar-track {
            background-color: #f3f4f6;
        }

        #scrollDownBtn {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            background: #a78bfa;
            color: white;
            border: none;
            padding: 0.5rem;
            border-radius: 9999px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            cursor: pointer;
        }

        #scrollDownBtn:hover {
            background: #7c3aed;
        }

        /* Ensure header stays on top */
        .header-fixed {
            position: sticky;
            top: 0;
            z-index: 1050;
        }
    </style>
</head>
<body class="bg-light text-dark">

<div class="d-flex">

    <!-- Sidebar -->
    <aside id="mainSidebar">
        <div class="d-flex justify-content-end p-3">
            <button id="closeSidebar" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="sidebar-content" id="sidebarScrollArea">
            <?php $user = Auth::user(); ?>

            <nav class="nav flex-column">
                <?php if($user->hasRole('super_admin')): ?>
                    <?php echo $__env->make('partials.sidebar-superadmin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php elseif($user->hasRole('school_admin')): ?>
                    <?php echo $__env->make('partials.sidebar-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php elseif($user->hasRole('professor')): ?>
                    <?php echo $__env->make('partials.sidebar-professor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php elseif($user->hasRole('disciplinary_committee')): ?>
                    <?php echo $__env->make('partials.sidebar-disciplinary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php elseif($user->hasRole('parent')): ?>
                    <?php echo $__env->make('partials.sidebar-parent', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>
            </nav>
        </div>
    </aside>

    <!-- Page Content -->
    <div class="flex-grow-1 w-100" style="margin-left: 0;">
        <!-- Header -->
        <header class="bg-white shadow p-3 d-flex justify-content-between align-items-center header-fixed">
            <button id="toggleSidebar" class="btn btn-outline-primary">
                <i class="bi bi-list"></i>
            </button>
            <span class="fw-semibold fs-5"><?php echo e(config('app.name', 'Laravel')); ?></span>
        </header>

        <!-- Main Content -->
        <main class="p-4 mt-3">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {
        const sidebar = $('#mainSidebar');

        $('#toggleSidebar').on('click', function () {
            sidebar.toggleClass('show');
        });

        $('#closeSidebar').on('click', function () {
            sidebar.removeClass('show');
        });

        $('#scrollDownBtn').on('click', function () {
            $('#sidebarScrollArea').animate({
                scrollTop: $('#sidebarScrollArea')[0].scrollHeight
            }, 500);
        });
    });

    $('#toggleSettingsMenu').on('click', function () {
    $('#settingsMenuContainer').toggleClass('d-none');

    // Optional: Toggle the arrow icon direction
    const icon = $(this).find('i.bi-chevron-down');
    icon.toggleClass('bi-chevron-down bi-chevron-up');
    });

</script>

<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\StudentViolationAndMonitoring_System\resources\views/layouts/app.blade.php ENDPATH**/ ?>