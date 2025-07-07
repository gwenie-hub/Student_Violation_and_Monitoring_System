<?php

namespace App\Mail;

use App\Models\Violation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ViolationVerifiedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $violation;

    public function __construct(Violation $violation)
    {
        $this->violation = $violation;
    }

    public function build()
    {
        return $this->subject('Violation Alert for Your Child')
                    ->view('emails.violation-alert');
    }
}

