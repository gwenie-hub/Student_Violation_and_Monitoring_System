

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
    .violation-table .action-btn {
        width: 38px;
        height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        border-radius: 50%;
        background: var(--main-white);
        border: 2px solid var(--main-blue);
        color: var(--main-blue);
        margin-right: 0.3rem;
        transition: background 0.2s, color 0.2s, border 0.2s;
        box-shadow: 0 1px 2px rgba(29,53,87,0.04);
        padding: 0;
    }
    .violation-table .action-btn:last-child {
        margin-right: 0;
    }
    .violation-table .action-btn.approve {
        border-color: var(--main-blue);
        color: var(--main-blue);
        background: var(--main-light-blue);
    }
    .violation-table .action-btn.approve:hover {
        background: var(--main-blue);
        color: var(--main-white);
        border-color: var(--main-blue);
    }
    .violation-table .action-btn.reject {
        border-color: var(--main-red);
        color: var(--main-red);
        background: var(--main-light-red);
    }
    .violation-table .action-btn.reject:hover {
        background: var(--main-red);
        color: var(--main-white);
        border-color: var(--main-red);
    }
    .violation-table .reporter-email {
        font-size: 0.96em;
        color: var(--main-blue);
        font-weight: 500;
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

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0" style="color:#23272b;letter-spacing:0.01em;">Student Violations</h4>
        <span class="text-muted small">Updated: <?php echo e(now()->format('F d, Y')); ?></span>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
        <div class="alert alert-success mb-3 px-4 py-2 rounded-3 shadow-sm" style="color:#23272b;background:#e2e6ea;border:1.5px solid #adb5bd;">
            <span><?php echo e(session('success')); ?></span>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="table-responsive rounded-3 border shadow-sm bg-white p-2 font-roboto">
        <table class="table violation-table mb-0">
            <thead>
                <tr>
                    <th class="text-center">Student</th>
                    <th>Course</th>
                    <th>Violation</th>
                    <th class="text-center">Offense</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pendingViolations = \App\Models\StudentViolation::where('status', 'Pending')
                        ->whereNotNull('Violation')
                        ->where('Violation', '!=', '')
                        ->latest()->get();
                ?>

                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $pendingViolations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $offenseLabel = $violation->Offense_Record ?? '1st Offense';
                    ?>
                    <tr>
                        <td class="student-name text-center"><?php echo e($violation->Last_Name); ?>, <?php echo e($violation->First_Name); ?> <?php echo e($violation->Middle_Name); ?></td>
                        <td><?php echo e($violation->Course); ?> - <?php echo e($violation->Year_and_Section); ?></td>
                        <td style="max-width:200px;white-space:normal;"><?php echo e($violation->Violation); ?></td>
                        <td class="text-center">
                            <span class="badge"><?php echo e($offenseLabel); ?></span>
                        </td>
                        <td>
                            <span class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill text-xs fw-semibold bg-warning bg-opacity-10 text-warning border border-warning-subtle">
                                <i class="bi bi-hourglass-split me-1"></i> Pending
                            </span>
                        </td>
                        <td class="date-cell">
                            <?php echo e(!empty($violation->created_at) ? \Carbon\Carbon::parse($violation->created_at)->format('M d, Y') : ''); ?>

                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex align-items-center gap-1">
                                <form method="POST" action="<?php echo e(route('disciplinary.violation.action')); ?>" class="violation-action-form m-0 p-0">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="violation_id" value="<?php echo e($violation->id); ?>">
                                    <button type="submit" name="action" value="approve" class="action-btn approve me-1" data-label="Approve" title="Approve">
                                        <i class="bi bi-check2-circle"></i>
                                    </button>
                                </form>
                                <form method="POST" action="<?php echo e(route('disciplinary.violation.action')); ?>" class="violation-action-form m-0 p-0">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="violation_id" value="<?php echo e($violation->id); ?>">
                                    <button type="submit" name="action" value="reject" class="action-btn reject" data-label="Reject" title="Reject">
                                        <i class="bi bi-x-circle-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr class="empty-row">
                        <td colspan="7" class="text-center py-4">
                            <span class="fw-semibold text-secondary">No pending violations found.</span>
                        </td>
                    </tr>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/livewire/disciplinary/violation-records.blade.php ENDPATH**/ ?>