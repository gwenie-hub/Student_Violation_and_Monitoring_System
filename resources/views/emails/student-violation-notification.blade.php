<h2>Violation Notification</h2>
<p>Dear {{ $studentInfo['First_Name'] }} {{ $studentInfo['Last_Name'] }},</p>
<p>This is to inform you that you have committed the following violation:</p>
<ul>
    <li><strong>Violation:</strong> {{ $violation }}</li>
    <li><strong>Offense:</strong> {{ $offenseLabel }}</li>
    <li><strong>Sanction:</strong> {{ $sanction }}</li>
</ul>
<p>Please comply with the sanction and contact the office if you have any questions.</p>
<p>Thank you.</p>
