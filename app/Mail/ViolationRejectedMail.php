<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ViolationRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $violation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($violation)
    {
        $this->violation = $violation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Violation Submission Rejected')
            ->view('emails.violation-rejected')
            ->with([
                'violation' => $this->violation,
            ]);
    }
}
