<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Violation Notice</title>
</head>
<body>
    <div style="font-family: Times New Roman, serif; font-size: 16px; color: #222; max-width: 600px; margin: 0 auto; border: 1px solid #eee; padding: 24px; background: #fafbfc;">
        <h2 style="color: #b71c1c;">Student Violation Notice</h2>
        <p>Dear Parent/Guardian,</p>
        <p>We would like to inform you that your child <strong>{{ $student_name ?? 'Student' }}</strong> has been involved in a disciplinary incident. Please see the details below:</p>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 18px;">
            <tr>
                <td style="padding: 6px 0; font-weight: bold;">Violation:</td>
                <td style="padding: 6px 0;">{{ $violation ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td style="padding: 6px 0; font-weight: bold;">Date:</td>
                <td style="padding: 6px 0;">{{ $date ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td style="padding: 6px 0; font-weight: bold;">Sanction:</td>
                <td style="padding: 6px 0;">{{ $sanction ?? 'N/A' }}</td>
            </tr>
        </table>
        @if(!empty($summary))
            <div style="margin-bottom: 18px; white-space: pre-wrap;">{{ $summary }}</div>
        @endif
        <p>If you have any questions or concerns, please contact the school administration.</p>
        <p style="margin-top: 32px;">Thank you,<br>Disciplinary Office</p>
    </div>
</body>
</html>
