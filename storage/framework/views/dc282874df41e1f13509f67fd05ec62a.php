<?php $__env->startPush('head'); ?>
    <!-- Bootstrap Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body, .font-roboto { font-family: 'Roboto', Arial, sans-serif !important; }
        .table-modern th, .table-modern td { vertical-align: middle !important; }
    </style>
<?php $__env->stopPush(); ?>




<?php $__env->startSection('sidebar'); ?>
<aside class="w-64 bg-white border-r min-h-screen p-6">
    <!-- Logo -->
    <div class="mb-6">
        <img src="<?php echo e(asset('images/logo3.png')); ?>" alt="Logo" class="h-12 mx-auto mb-4">
        <h2 class="text-xl font-bold text-center text-black">Professor Menu</h2>
    </div>

    <!-- Navigation -->
    <nav class="space-y-2 text-black">
        <a href="<?php echo e(route('professor.dashboard')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('professor.dashboard') ? 'bg-gray-300 font-bold' : ''); ?>">
            Dashboard Overview
        </a>
        <a href="<?php echo e(route('professor.violations.create')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('professor.violations.create') ? 'bg-gray-300 font-bold' : ''); ?>">
            Submit Violation
        </a>
        <a href="<?php echo e(route('professor.violations.index')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('professor.violations.index') ? 'bg-gray-300 font-bold' : ''); ?>">
            Edit Violation Report
        </a>
        <a href="<?php echo e(route('professor.violations.my')); ?>"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('professor.violations.my') ? 'bg-gray-300 font-bold' : ''); ?>">
            My Submissions
        </a>
        <a href="#"
           class="block hover:bg-gray-200 px-3 py-2 rounded <?php echo e(request()->routeIs('notifications.index') ? 'bg-gray-300 font-bold' : ''); ?>">
            Notifications
        </a>

        <!-- Logout -->
        <form method="POST" action="<?php echo e(route('custom.logout')); ?>" class="mt-4">
            <?php echo csrf_field(); ?>
            <?php echo csrf_field(); ?>
            <button type="submit"
                    class="text-red-600 hover:bg-red-100 px-3 py-2 rounded w-full text-left">
                Logout
            </button>
        </form>
    </nav>
</aside>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<main class="flex-1 p-6 bg-white rounded-xl shadow-md">
    <div class="flex flex-wrap gap-2 mb-6">
        <a href="<?php echo e(route('professor.violations.create')); ?>" class="ml-auto px-4 py-2 rounded bg-blue-600 text-white font-semibold hover:bg-blue-700 flex items-center gap-2" id="submitViolationBtn">
            <span class="btn-label"><i class="bi bi-plus-circle"></i> <span>Submit Violation</span></span>
            <span class="btn-spinner d-none"><span class="spinner-border spinner-border-sm"></span> Loading...</span>
        </a>
    </div>

    <div id="loadingOverlay" class="loading-overlay" style="display:none;">
        <div class="text-center">
            <div class="spinner-border text-primary mb-3" style="width:3rem;height:3rem;"></div>
            <div class="fw-bold text-blue-700">Loading student records...</div>
        </div>
    </div>

    <style>
        :root {
            --main-blue: #1d3557;
            --main-red: #e63946;
            --main-white: #fff;
            --main-light-blue: #e3eafc;
            --main-light-red: #fde7eb;
            --main-gray: #f1f3f5;
            --main-dark: #22223b;
        }
        .violation-table {
            border-radius: 1.1rem !important;
            overflow: hidden;
            box-shadow: 0 2px 12px 0 rgba(29,53,87,0.07);
        }
        .violation-table th, .violation-table td {
            vertical-align: middle !important;
            padding-top: 0.55rem !important;
            padding-bottom: 0.55rem !important;
            font-size: 1rem;
        }
        .violation-table td {
            border-radius: 0.5rem !important;
        }
        .violation-table th {
            background: var(--main-blue);
            color: var(--main-white);
            font-weight: 700;
            border-bottom: 2.5px solid var(--main-red) !important;
            letter-spacing: 0.03em;
        }
        .violation-table tr {
            background: var(--main-white);
            border-bottom: 1.5px solid var(--main-gray);
            transition: background 0.2s;
        }
        .violation-table tbody tr:hover {
            background: var(--main-light-blue);
        }
        .violation-table tr:last-child {
            border-bottom: none;
        }
        .violation-table td {
            color: var(--main-dark);
        }
        .violation-table .badge {
            background: var(--main-light-blue);
            color: var(--main-blue);
            font-weight: 600;
            border-radius: 0.35rem;
            padding: 0.22rem 0.8rem;
            font-size: 0.97em;
            box-shadow: 0 1px 2px rgba(29,53,87,0.06);
        }
        .violation-table .status-pending {
            color: var(--main-red);
            font-size: 0.97em;
            font-weight: 600;
        }
        .violation-table .student-id {
            font-weight: 700;
            color: var(--main-blue);
            font-size: 1.01em;
        }
        .violation-table .student-name {
            font-weight: 600;
            color: var(--main-dark);
        }
        .violation-table .date-cell {
            color: #64748b;
            font-size: 0.96em;
        }
        .violation-table .empty-row {
            background: var(--main-light-blue);
            border-radius: 0.7rem !important;
        }
    </style>
    <div class="table-responsive rounded-3 border shadow-sm bg-white p-2">
        <table class="table violation-table mb-0">
            <thead>
                <tr>
                    <th class="text-center">Student ID</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>Year &amp; Section</th>
                    <th>Student Email</th>
                    <th>Parent Email</th>
                    <th>Violation</th>
                    <th class="text-center">Offense</th>
                    <th class="text-center">Sanction</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="student-id text-center"><?php echo e($student->Student_ID); ?></td>
                        <td class="student-name"><?php echo e($student->Last_Name); ?>, <?php echo e($student->First_Name); ?> <?php echo e($student->Middle_Name); ?></td>
                        <td><?php echo e($student->Course); ?></td>
                        <td><?php echo e($student->Major ?? 'None'); ?></td>
                        <td><?php echo e($student->Year_and_Section); ?></td>
                        <td><?php echo e($student->Student_Email); ?></td>
                        <td><?php echo e($student->Parent_Email); ?></td>
                        <td style="max-width:200px;white-space:normal;"><?php echo e($student->Violation ?? '-'); ?></td>
                        <td class="text-center">
                            <span class="badge"><?php echo e($student->Offense_Record ?? '-'); ?></span>
                        </td>
                        <td class="text-center">
                            <span class="badge status-pending"><?php echo e($student->Sanction ?? '-'); ?></span>
                        </td>
                        <td>
                            <?php if($student->Violation): ?>
                                <span class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill text-xs fw-semibold bg-success bg-opacity-10 text-success border border-success-subtle">
                                    <i class="bi bi-check-circle-fill me-1"></i> Approved
                                </span>
                            <?php else: ?>
                                <span class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill text-xs fw-semibold bg-secondary bg-opacity-10 text-secondary border border-secondary-subtle">
                                    <i class="bi bi-dash-circle me-1"></i> No Violation
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr class="empty-row">
                        <td colspan="11" class="text-center py-4">
                            <span class="fw-semibold text-secondary">No student violation records found.</span>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php echo e($students->links()); ?>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Loading overlay
            const overlay = document.getElementById('loadingOverlay');
            overlay.style.display = 'flex';
            setTimeout(() => overlay.style.display = 'none', 800);

            // Filter buttons loading effect
            const filterForm = document.getElementById('filterForm');
            if (filterForm) {
                filterForm.querySelectorAll('button[data-btn-type="filter"]').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        filterForm.querySelectorAll('button[data-btn-type="filter"]').forEach(b => {
                            b.disabled = true;
                            b.querySelector('.btn-label').classList.add('d-none');
                            b.querySelector('.btn-spinner').classList.add('d-none');
                        });
                        btn.querySelector('.btn-label').classList.add('d-none');
                        btn.querySelector('.btn-spinner').classList.remove('d-none');
                        btn.disabled = true;
                    });
                });
            }

            // Submit Violation button loading effect
            const submitBtn = document.getElementById('submitViolationBtn');
            if (submitBtn) {
                submitBtn.addEventListener('click', function(e) {
                    submitBtn.querySelector('.btn-label').classList.add('d-none');
                    submitBtn.querySelector('.btn-spinner').classList.remove('d-none');
                    submitBtn.classList.add('pointer-events-none');
                });
            }
        });
    </script>

    <!-- Pagination -->
    <!-- Only $students pagination is needed -->
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/professor/dashboard.blade.php ENDPATH**/ ?>