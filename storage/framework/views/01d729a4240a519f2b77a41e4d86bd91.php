<?php $__env->startSection('content'); ?>
<!-- Bootstrap 5 (if not already added) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<!-- Google Font: Roboto -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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
    body, .forgot-card, .form-label, .form-control, .form-check-label, .form-text, .form-link, h1, h2, h3, h4, h5, h6 {
        font-family: 'Roboto', sans-serif;
    }
    .forgot-bg {
        min-height: 100vh;
        background: linear-gradient(135deg, var(--main-red) 0%, var(--main-blue) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .forgot-card {
        background: rgba(255,255,255,0.75);
        border-radius: 1.1rem;
        box-shadow: 0 2px 12px 0 rgba(29,53,87,0.13);
        border: 2.5px solid var(--main-blue);
        padding: 2.5rem 2rem 2rem 2rem;
        max-width: 420px;
        width: 100%;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
    .forgot-logo {
        width: 4.5rem;
        height: 4.5rem;
        border-radius: 50%;
        box-shadow: 0 2px 8px rgba(29,53,87,0.13);
        margin-bottom: 1.2rem;
    }
    .forgot-title {
        color: var(--main-blue);
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-align: center;
        letter-spacing: 0.03em;
    }
    .forgot-desc {
        color: var(--main-dark);
        font-size: 1.01em;
        text-align: center;
        margin-bottom: 1.2rem;
        opacity: 0.85;
    }
    .form-label {
        color: var(--main-blue);
        font-weight: 600;
    }
    .form-control {
        border: 1.5px solid var(--main-blue);
        border-radius: 0.5rem;
        font-size: 1.05rem;
        background: var(--main-light-blue);
        color: var(--main-dark);
    }
    .form-control:focus {
        border-color: var(--main-red);
        box-shadow: 0 0 0 0.2rem rgba(230,57,70,0.13);
    }
    .btn-forgot {
        background: var(--main-blue);
        border-color: var(--main-blue);
        color: var(--main-white);
        font-weight: 700;
        border-radius: 0.5rem;
        transition: background 0.2s, border 0.2s;
    }
    .btn-forgot:hover {
        background: var(--main-red);
        border-color: var(--main-red);
    }
    .alert-success {
        background: var(--main-light-blue);
        color: var(--main-blue);
        border:1.5px solid var(--main-blue);
        font-weight:600;
    }
    .alert-danger, .alert-error {
        background: var(--main-light-red);
        color: var(--main-red);
        border:1.5px solid var(--main-red);
        font-weight:600;
    }
</style>
<div class="forgot-bg">
    <div class="forgot-card mx-auto">
        <div class="d-flex justify-content-center align-items-center mb-3">
            <a href="/">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="forgot-logo mx-auto d-block">
            </a>
        </div>
        <h2 class="forgot-title">Forgot Password</h2>
        <div class="forgot-desc">Enter your email to receive a password reset link.</div>
        <?php if(session('status')): ?>
            <div class="alert alert-success mb-3">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger mb-3">
                <ul class="mb-0 ps-3">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?php echo e(route('password.email')); ?>" autocomplete="off">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" required autofocus class="form-control rounded-3" placeholder="Enter your email">
            </div>
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-forgot btn-lg" id="forgotSubmitBtn">
                    <span id="forgotBtnText">Send Password Reset Link</span>
                    <span id="forgotBtnSpinner" class="spinner-border spinner-border-sm d-none ms-2" role="status" aria-hidden="true"></span>
                    <span id="forgotBtnLoadingLabel" class="d-none ms-2">Sending...</span>
                </button>
            </div>
        </form>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var forgotForm = document.getElementById('forgotSubmitBtn')?.closest('form');
                if (forgotForm) {
                    forgotForm.addEventListener('submit', function() {
                        var btn = document.getElementById('forgotSubmitBtn');
                        var spinner = document.getElementById('forgotBtnSpinner');
                        var text = document.getElementById('forgotBtnText');
                        btn.disabled = true;
                        spinner.classList.remove('d-none');
                        text.classList.add('d-none');
                        var loadingLabel = document.getElementById('forgotBtnLoadingLabel');
                        loadingLabel.classList.remove('d-none');
                    });
                }
            });
        </script>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\StudentViolationManagementSystem\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>