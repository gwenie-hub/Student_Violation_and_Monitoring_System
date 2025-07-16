<p>Hello <?php echo e($user->first_name); ?>,</p>

<p>You have been invited to the system. Here are your login credentials:</p>

<ul>
    <li><strong>Email:</strong> <?php echo e($user->email); ?></li>
    <li><strong>Temporary Password:</strong> <?php echo e($tempPassword); ?></li>
</ul>

<p><a href="<?php echo e(route('login')); ?>">Click here to log in</a></p>

<p>It is recommended that you change your password after logging in.</p>
<?php /**PATH C:\xampp\htdocs\StudentViolationAndMonitoring_System\resources\views/emails/credentials.blade.php ENDPATH**/ ?>