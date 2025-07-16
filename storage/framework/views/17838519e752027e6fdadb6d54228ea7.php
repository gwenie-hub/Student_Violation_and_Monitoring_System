<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - Student Violation Monitoring System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .bg-image {
            background-image: url('<?php echo e(asset('images/school.jpg')); ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            position: relative;
        }

        .login-button {
            position: absolute;
            top: 30px;
            right: 40px;
        }

        .overlay {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 1rem;
            max-width: 800px;
            margin: auto;
            text-align: center;
        }

        .center-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #1a202c;
        }

        p {
            color: #333;
            text-align: justify;
            margin-bottom: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="bg-image">
        <a href="<?php echo e(route('login')); ?>" class="login-button bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
            Login
        </a>

        <div class="center-box">
            <div class="overlay">
                <h1>Welcome to the Student Violation Monitoring System</h1>
                <p>A centralized platform for recording and managing student violations.</p>
                <p>
                    Professors can report student violations directly through the system,
                    while disciplinary officers are responsible for reviewing reports and issuing appropriate actions.
                </p>
                <p>
                    Parents receive timely email notifications to stay informed and engaged in their child’s conduct and well-being.
                </p>
                <p>
                    The system promotes transparency, discipline, and coordination across all departments involved in student welfare and accountability.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\StudentViolationAndMonitoring_System\resources\views/welcome.blade.php ENDPATH**/ ?>