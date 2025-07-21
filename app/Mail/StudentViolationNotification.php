<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentViolationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $studentInfo;
    public $violation;
    public $offenseLabel;
    public $sanction;

    public function __construct($studentInfo, $violation, $offenseLabel, $sanction)
    {
        $this->studentInfo = $studentInfo;
        $this->violation = $violation;
        $this->offenseLabel = $offenseLabel;
        $this->sanction = $sanction;
    }

    public function build()
    {
        return $this->subject('Violation Notification')
            ->view('emails.student-violation-notification')
            ->with([
                'studentInfo' => $this->studentInfo,
                'violation' => $this->violation,
                'offenseLabel' => $this->offenseLabel,
                'sanction' => $this->sanction,
            ]);
    }
}
