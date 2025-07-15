<p>Hello {{ $user->first_name }},</p>

<p>You have been invited to the system. Here are your login credentials:</p>

<ul>
    <li><strong>Email:</strong> {{ $user->email }}</li>
    <li><strong>Temporary Password:</strong> {{ $tempPassword }}</li>
</ul>

<p><a href="{{ route('login') }}">Click here to log in</a></p>

<p>It is recommended that you change your password after logging in.</p>
