<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParentViolationNotification extends Mailable
{
    public $summary;

    public function __construct($summary)
    {
        $this->summary = $summary;
    }

    public function build()
    {
        return $this->subject('Student Violation Summary')
                    ->view('emails.parent-violation')
                    ->with(['summary' => $this->summary]);
    }
}
