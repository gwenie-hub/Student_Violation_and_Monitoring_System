<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Violation Submission Rejected</title>
</head>
<body>
    <h2>Violation Submission Rejected</h2>
    <p>Your submitted violation for student <strong><?php echo e($violation->Student_ID); ?></strong> has been <span style="color: red;">rejected</span> by the disciplinary committee.</p>
    <p>If you believe this was a mistake or need clarification, please contact the committee.</p>
    <hr>
    <p><strong>Submitted By:</strong> <?php echo e($violation->reporter_email ?? 'N/A'); ?></p>
    <p><strong>Student Name:</strong> <?php echo e($violation->Last_Name); ?>, <?php echo e($violation->First_Name); ?> <?php echo e($violation->Middle_Name); ?></p>
    <p><strong>Violation:</strong> <?php echo e($violation->Violation ?? 'N/A'); ?></p>
</body>
</html>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/emails/violation-rejected.blade.php ENDPATH**/ ?>