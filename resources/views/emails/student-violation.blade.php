<html>
<head>
    <meta charset="UTF-8">
    <title>Student Violation Notice</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f8fafc; color: #222; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        h3 { color: #0056b3; margin-bottom: 1rem; }
        ul { padding-left: 1.2rem; }
        li { margin-bottom: 0.5rem; }
        .footer { margin-top: 2rem; font-size: 0.95rem; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Student Violation Notice</h3>
        <p>Dear <strong>{{ $student_name }}</strong>,</p>
        <p>This is to inform you that you have committed a violation:</p>
        <ul>
            <li><strong>Violation:</strong> {{ $violation }}</li>
            <li><strong>Offense Record:</strong> {{ $offense_record }}</li>
            <li><strong>Sanction:</strong> {{ $sanction }}</li>
        </ul>
        <p>We encourage you to reflect on this and follow school policies to avoid further disciplinary actions. Please cooperate with the assigned sanction and reach out to the Guidance Office if you have any questions.</p>
        <div class="footer">
            Thank you for your attention.<br>
            <em>Guidance Office</em>
        </div>
    </div>
</body>
</html>
