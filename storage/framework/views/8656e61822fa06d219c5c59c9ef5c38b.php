<html>
<head>
    <meta charset="UTF-8">
    <title>Student Violation Alert</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f8fafc; color: #222; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        h3 { color: #b30000; margin-bottom: 1rem; }
        ul { padding-left: 1.2rem; }
        li { margin-bottom: 0.5rem; }
        .footer { margin-top: 2rem; font-size: 0.95rem; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Violation Alert</h3>
        <p>Dear Parent/Guardian,</p>
        <p>Your child <strong><?php echo e($student_name); ?></strong> (Student ID: <?php echo e($student_id); ?>) has committed the following violation:</p>
        <ul>
            <li><strong>Violation:</strong> <?php echo e($violation); ?></li>
            <li><strong>Offense Record:</strong> <?php echo e($offense_record); ?></li>
            <li><strong>Sanction:</strong> <?php echo e($sanction); ?></li>
            <li><strong>Status:</strong> <?php echo e($status); ?></li>
        </ul>
        <p>This was reported by the guidance office and verified by the disciplinary officer.</p>
        <div class="footer">
            Please contact the school for more details.<br>
            <em>Guidance Office</em>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/emails/violation-alert.blade.php ENDPATH**/ ?>