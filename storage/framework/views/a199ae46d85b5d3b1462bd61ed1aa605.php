<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    body, .font-roboto { font-family: 'Roboto', Arial, sans-serif !important; }
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
        border-radius: 1.1rem;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(29,53,87,0.07);
    }
    .violation-table th, .violation-table td {
        vertical-align: middle;
        padding: 0.55rem;
        font-size: 1rem;
    }
    .violation-table th {
        background: var(--main-blue);
        color: var(--main-white);
        font-weight: 700;
        border-bottom: 2.5px solid var(--main-red);
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
    .violation-table .student-name {
        font-weight: 600;
        color: var(--main-dark);
    }
    .violation-table .date-cell {
        color: #64748b;
        font-size: 0.96em;
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
</style>


<?php $__env->startSection('content'); ?>
<div class="p-3 sm:p-6 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">My Submitted Violations</h2>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            <i class="bi bi-check-circle-fill me-1"></i> <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <i class="bi bi-x-circle-fill me-1"></i> <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php
        $userId = auth()->id();
        $violations = \App\Models\StudentViolation::where('submitted_by', $userId)->latest()->paginate(10);
    ?>

    <?php if($violations->count()): ?>

        <div class="table-responsive rounded-3 border shadow-sm bg-white p-2 font-roboto">
            <table class="table violation-table mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="background: var(--main-blue); color: var(--main-white); font-weight: 700; border-bottom: 2.5px solid var(--main-red); letter-spacing: 0.03em;">Student</th>
                        <th style="background: var(--main-blue); color: var(--main-white); font-weight: 700; border-bottom: 2.5px solid var(--main-red); letter-spacing: 0.03em;">Course</th>
                        <th style="background: var(--main-blue); color: var(--main-white); font-weight: 700; border-bottom: 2.5px solid var(--main-red); letter-spacing: 0.03em;">Violation</th>
                        <th class="text-center" style="background: var(--main-blue); color: var(--main-white); font-weight: 700; border-bottom: 2.5px solid var(--main-red); letter-spacing: 0.03em;">Offense</th>
                        <th style="background: var(--main-blue); color: var(--main-white); font-weight: 700; border-bottom: 2.5px solid var(--main-red); letter-spacing: 0.03em;">Status</th>
                        <th style="background: var(--main-blue); color: var(--main-white); font-weight: 700; border-bottom: 2.5px solid var(--main-red); letter-spacing: 0.03em;">Date</th>
                        <th class="text-center" style="background: var(--main-blue); color: var(--main-white); font-weight: 700; border-bottom: 2.5px solid var(--main-red); letter-spacing: 0.03em;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $violations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $violation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="student-name text-center"><?php echo e($violation->Last_Name); ?>, <?php echo e($violation->First_Name); ?> <?php echo e($violation->Middle_Name); ?></td>
                            <td><?php echo e($violation->Course); ?> - <?php echo e($violation->Year_and_Section); ?></td>
                            <td style="max-width:200px; white-space:normal;"><?php echo e($violation->Violation); ?></td>
                            <td class="text-center">
                                <span class="badge"><?php echo e($violation->Offense_Record ?? '1st Offense'); ?></span>
                            </td>
                            <td>
                                <?php if($violation->status === 'approved'): ?>
                                    <span class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill text-xs fw-semibold bg-success bg-opacity-10 text-success border border-success-subtle">
                                        <i class="bi bi-check-circle-fill me-1"></i> Approved
                                    </span>
                                <?php else: ?>
                                    <span class="d-inline-flex align-items-center gap-1 px-2 py-1 rounded-pill text-xs fw-semibold bg-warning bg-opacity-10 text-warning border border-warning-subtle">
                                        <i class="bi bi-hourglass-split me-1"></i> <?php echo e(ucfirst($violation->status)); ?>

                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="date-cell">
                                <?php echo e(optional($violation->created_at)->format('M d, Y')); ?>

                            </td>
                            <td class="text-center">
                                <?php if(strtolower($violation->status) === 'pending'): ?>
                                    <form method="POST" action="<?php echo e(route('disciplinary.violation.action')); ?>" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="violation_id" value="<?php echo e($violation->id); ?>">
                                        <button type="submit" name="action" value="delete" class="action-btn reject" title="Delete" onclick="return confirm('Are you sure you want to delete this violation?');">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <?php echo e($violations->links()); ?>

        </div>
    <?php else: ?>
        <p class="text-gray-600">You haven't submitted any violations yet.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/professor/violations/my-submissions.blade.php ENDPATH**/ ?>