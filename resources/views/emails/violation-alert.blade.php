<h3>Violation Alert</h3>
<p>Dear Parent,</p>
<p>Your child <strong>{{ $violation->student->name }}</strong> has committed a violation:</p>
<ul>
    <li><strong>Type:</strong> {{ $violation->violation_type }}</li>
    <li><strong>Sanction:</strong> {{ $violation->sanction }}</li>
    <li><strong>Status:</strong> {{ $violation->status }}</li>
</ul>
<p>This was reported by a professor and verified by the disciplinary officer.</p>
<p>Please contact the school for more details.</p>
