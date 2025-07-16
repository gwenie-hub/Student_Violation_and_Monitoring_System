<?php $__env->startSection('head'); ?>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
        }
        h4, .table thead {
            color: #0d6efd;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f9ff;
            transition: background-color 0.2s ease-in-out;
        }
        .status-pending {
            color: #6c757d;
            font-style: italic;
        }
        .status-done {
            color: #198754;
            font-weight: 600;
        }
        .action-link {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: 0.2s ease-in-out;
        }
        .action-link:hover {
            text-decoration: underline;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .no-data {
            background-color: #f8f9fc;
        }
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.9rem;
            }
            h4 {
                font-size: 1.25rem;
            }
        }
        .scroll-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #0d6efd;
            color: #fff;
            border: none;
            padding: 10px 12px;
            border-radius: 50%;
            font-size: 1.25rem;
            display: none;
            z-index: 1000;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }
        /* Blue/white theme improvements */
        .table-primary {
            background-color: #e7f1ff !important;
            color: #0d6efd !important;
        }
        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.15);
        }
        .btn-primary, .btn-outline-primary {
            border-radius: 20px;
        }
        .btn-primary {
            background: linear-gradient(90deg, #0d6efd 60%, #3b82f6 100%);
            border: none;
        }
        .btn-outline-primary {
            border: 1.5px solid #0d6efd;
            color: #0d6efd;
        }
        .btn-outline-primary:hover {
            background: #e7f1ff;
        }
        .border-primary-subtle {
            border-color: #b6d4fe !important;
        }
        .bg-primary-subtle {
            background-color: #e7f1ff !important;
        }
        .form-label.text-primary {
            font-weight: 600;
        }
        .fw-bold.text-primary {
            color: #0d6efd !important;
        }
        .action-link {
            color: #0d6efd;
        }
        .action-link:hover {
            color: #3b82f6;
        }
        /* End theme improvements */
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <!--[if BLOCK]><![endif]--><?php if(auth()->user()->hasRole('admin')): ?>
        <?php echo $__env->make('partials.sidebar-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif(auth()->user()->hasRole('professor')): ?>
        <?php echo $__env->make('partials.sidebar-professor', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif(auth()->user()->hasRole('superadmin')): ?>
        <?php echo $__env->make('partials.sidebar-superadmin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif(auth()->user()->hasRole('disciplinary_committee')): ?>
        <?php echo $__env->make('partials.sidebar-disciplinary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-semibold mb-0 text-primary">
            <i class="bi bi-clipboard-data me-2"></i> Student Violations
        </h4>
        <small class="text-muted">Updated: <?php echo e(now()->format('M d, Y')); ?></small>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
        <div class="alert alert-success small d-flex align-items-center mb-4">
            <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Inline Filter: Only by Type (Server-side) -->
    <form method="GET" class="mb-3 d-flex align-items-center gap-2" action="">
        <label for="typeFilter" class="form-label text-primary mb-0 me-2">Type:</label>
        <select name="type" id="typeFilter" class="form-select form-select-sm w-auto border-primary-subtle" onchange="this.form.submit()">
            <option value=""<?php echo e(request('type') == '' ? ' selected' : ''); ?>>All</option>
            <option value="minor"<?php echo e(request('type') == 'minor' ? ' selected' : ''); ?>>Minor</option>
            <option value="major"<?php echo e(request('type') == 'major' ? ' selected' : ''); ?>>Major</option>
        </select>
    </form>

    <div class="table-responsive rounded border shadow-sm bg-white">
        <table class="table table-hover align-middle mb-0" id="violationsTable">
            <thead class="table-primary small text-uppercase">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Violation</th>
                    <th>Type</th>
                    <th>Sanction</th>
                    <th>Reporter</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
    <tbody id="violationsTbody">
        <?php
            $filtered = request('type') ? $violations->filter(function($v) {
                return strtolower($v->offense_type) === request('type');
            }) : $violations;
        ?>
        <!--[if BLOCK]><![endif]--><?php if($filtered->count()): ?>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filtered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-type="<?php echo e(strtolower($violation->offense_type)); ?>">
                    <td class="fw-bold text-primary"><?php echo e($violation->student_id); ?></td>
                    <td class="fw-semibold text-dark">
                        <?php echo e($violation->last_name); ?>, <?php echo e($violation->first_name); ?> <?php echo e($violation->middle_name); ?>

                    </td>
                    <td class="text-wrap" style="max-width: 240px;"><?php echo e($violation->violation); ?></td>
                    <td class="text-capitalize text-primary"><?php echo e($violation->offense_type); ?></td>
                    <td>
                        <!--[if BLOCK]><![endif]--><?php if($violation->sanction): ?>
                            <span class="status-done"><?php echo e($violation->sanction); ?></span>
                        <?php else: ?>
                            <span class="status-pending">Pending</span>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td class="text-muted"><?php echo e($violation->reporter->email ?? 'N/A'); ?></td>
                    <td class="text-muted small"><?php echo e($violation->created_at->format('M d, Y')); ?></td>
                    <td>
                        <a href="<?php echo e(route('disciplinary.edit', $violation->id)); ?>"
                           class="action-link" title="<?php echo e($violation->sanction ? 'Edit Sanction' : 'Apply Sanction'); ?>">
                            <i class="bi bi-pencil-square me-1"></i><?php echo e($violation->sanction ? 'Edit' : 'Apply'); ?>

                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php else: ?>
            <tr class="no-data">
                <td colspan="8" class="text-center py-5 text-muted">No violations found.</td>
            </tr>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </tbody>
</table>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(method_exists($violations, 'links')): ?>
        <div class="mt-4 d-flex justify-content-end small">
            <?php echo e($violations->links('pagination::bootstrap-5')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTopBtn" title="Go to top">
        <i class="bi bi-arrow-up-short"></i>
    </button>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    // Scroll to top button visibility
    const scrollTopBtn = document.getElementById("scrollTopBtn");
    window.onscroll = function () {
        if (document.documentElement.scrollTop > 150) {
            scrollTopBtn.style.display = "block";
        } else {
            scrollTopBtn.style.display = "none";
        }
    };
    scrollTopBtn.onclick = function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\StudentViolationAndMonitoring_System\resources\views/livewire/disciplinary/violation-records.blade.php ENDPATH**/ ?>