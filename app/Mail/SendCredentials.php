<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class SendCredentials extends Mailable
{
    public $user;
    public $tempPassword;

    public function __construct(User $user, $tempPassword)
    {
        $this->user = $user;
        $this->tempPassword = $tempPassword;
    }

    public function build()
    {
        return $this->subject('Your Account Credentials')
                    ->view('emails.credentials');
    }
}
