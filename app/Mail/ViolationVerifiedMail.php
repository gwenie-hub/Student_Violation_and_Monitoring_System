<?php

namespace App\Mail;

use App\Models\StudentViolation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ViolationVerifiedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $violation;

    public function __construct(StudentViolation $violation)
    {
        $this->violation = $violation;
    }

    public function build()
    {
        return $this->subject('Violation Alert for Your Child')
            ->view('emails.violation-alert')
            ->with([
                'student_name' => $this->violation->Student_Name ?? '',
                'student_id' => $this->violation->Student_ID ?? '',
                'violation' => $this->violation->Violation ?? '',
                'offense_record' => $this->violation->Offense_Record ?? '',
                'sanction' => $this->violation->Sanction ?? '',
                'status' => $this->violation->status ?? '',
                'date' => $this->violation->created_at ? $this->violation->created_at->format('F d, Y') : '',
                'summary' => $this->violation->Summary ?? '',
            ]);
    }
}

