<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParentViolationNotification extends Mailable
{
    public $body;

    /**
     * Create a new message instance.
     *
     * @param array $studentInfo
     * @param string $violation
     * @param string $offenseLabel
     * @param string $sanction
     * @param string|null $customBody
     */
    public function __construct($studentInfo, $violation, $offenseLabel, $sanction, $customBody = null)
    {
        $this->body = $customBody ?? $this->generateBody($studentInfo, $violation, $offenseLabel, $sanction);
    }

    /**
     * Generate a professional, editable email body.
     */
    public function generateBody($studentInfo, $violation, $offenseLabel, $sanction)
    {
        $studentName = $studentInfo['First_Name'] . ' ' . $studentInfo['Middle_Name'] . ' ' . $studentInfo['Last_Name'];
        $studentId = $studentInfo['Student_ID'];
        $course = $studentInfo['Course'];
        $yearSection = $studentInfo['Year_and_Section'];
        return <<<EOT
Dear Parent/Guardian,

We wish to inform you that your child, {$studentName} (Student ID: {$studentId}), enrolled in {$course}, Year & Section: {$yearSection}, has committed the following violation:

Violation: {$violation}
Offense Record: {$offenseLabel}
Sanction: {$sanction}

We encourage you to discuss this matter with your child and support our efforts to maintain a safe and disciplined school environment. Should you have any questions or concerns, please feel free to contact the Guidance Office.

Thank you for your attention.

Sincerely,
Guidance Office
EOT;
    }

    public function build()
    {
        return $this->subject('Student Violation Notice')
                    ->view('emails.parent-violation')
                    ->with(['summary' => $this->body]);
    }
}
