<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Violation Submission Rejected</title>
</head>
<body>
    <h2>Violation Submission Rejected</h2>
    <p>Your submitted violation for student <strong>{{ $violation->Student_ID }}</strong> has been <span style="color: red;">rejected</span> by the disciplinary committee.</p>
    <p>If you believe this was a mistake or need clarification, please contact the committee.</p>
    <hr>
    <p><strong>Submitted By:</strong> {{ $violation->reporter_email ?? 'N/A' }}</p>
    <p><strong>Student Name:</strong> {{ $violation->Last_Name }}, {{ $violation->First_Name }} {{ $violation->Middle_Name }}</p>
    <p><strong>Violation:</strong> {{ $violation->Violation ?? 'N/A' }}</p>
</body>
</html>
