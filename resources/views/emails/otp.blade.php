@component('mail::message')
# Your OTP Code

Use this code to log in:

**{{ $otp }}**

This code expires in 5 minutes.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
