<h2>Violation Notification</h2>
<p>Dear <?php echo e($studentInfo['First_Name']); ?> <?php echo e($studentInfo['Last_Name']); ?>,</p>
<p>This is to inform you that you have committed the following violation:</p>
<ul>
    <li><strong>Violation:</strong> <?php echo e($violation); ?></li>
    <li><strong>Offense:</strong> <?php echo e($offenseLabel); ?></li>
    <li><strong>Sanction:</strong> <?php echo e($sanction); ?></li>
</ul>
<p>Please comply with the sanction and contact the office if you have any questions.</p>
<p>Thank you.</p>
<?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/emails/student-violation-notification.blade.php ENDPATH**/ ?>