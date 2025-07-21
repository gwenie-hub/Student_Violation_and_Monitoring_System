<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\StudentViolation;

class DisciplinaryViolationController extends Controller
{
    public function action(Request $request)
    {
        $violationId = $request->input('violation_id');
        $action = $request->input('action');

        // Only update the existing violation, never create a new one
        $violation = StudentViolation::find($violationId);

        if (!$violation) {
            return back()->with('error', 'Violation not found.');
        }

        // APPROVE
        if ($action === 'approve') {
            $emails = [];

            if (!empty($violation->Parent_Email) && filter_var($violation->Parent_Email, FILTER_VALIDATE_EMAIL)) {
                $emails[] = $violation->Parent_Email;
            }

            if (!empty($violation->Student_Email) && filter_var($violation->Student_Email, FILTER_VALIDATE_EMAIL)) {
                $emails[] = $violation->Student_Email;
            }

            if (empty($emails) && !empty($violation->Student_Email) && filter_var($violation->Student_Email, FILTER_VALIDATE_EMAIL)) {
                $emails[] = $violation->Student_Email;
            }

            foreach ($emails as $email) {
                Mail::to($email)->send(new \App\Mail\ViolationVerifiedMail($violation));
            }

            $violation->status = 'approved';
            $violation->Notify_Status = count($emails) ? 'Sent' : 'No Email';
            $violation->save();

            return back()->with('success', 'Violation approved and notifications sent.');
        }

        // REJECT
        if ($action === 'reject') {
            $reporter = null;

            if (!empty($violation->reporter_email) && filter_var($violation->reporter_email, FILTER_VALIDATE_EMAIL)) {
                $reporter = $violation->reporter_email;
            } elseif (!empty($violation->submitted_by)) {
                $user = User::find($violation->submitted_by);
                if ($user && filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                    $reporter = $user->email;
                }
            }

            if ($reporter) {
                Mail::to($reporter)->send(new \App\Mail\ViolationRejectedMail($violation));
            }

            if (!empty($violation->previous_data)) {
                $prev = json_decode($violation->previous_data, true);

                $violation->Violation = $prev['Violation'] ?? null;
                $violation->Offense_Record = $prev['Offense_Record'] ?? null;
                $violation->Sanction = $prev['Sanction'] ?? null;
                $violation->Notify_Status = $prev['Notify_Status'] ?? 'Not Sent';

                $violation->First_Name = $prev['First_Name'] ?? $violation->First_Name;
                $violation->Middle_Name = $prev['Middle_Name'] ?? $violation->Middle_Name;
                $violation->Last_Name = $prev['Last_Name'] ?? $violation->Last_Name;
                $violation->Course = $prev['Course'] ?? $violation->Course;
                $violation->Year_and_Section = $prev['Year_and_Section'] ?? $violation->Year_and_Section;
                $violation->Student_Email = $prev['Student_Email'] ?? $violation->Student_Email;
                $violation->Parent_Email = $prev['Parent_Email'] ?? $violation->Parent_Email;
                $violation->submitted_by = $prev['submitted_by'] ?? null;
                $violation->status = $prev['status'] ?? 'pending';
                $violation->created_at = array_key_exists('created_at', $prev) ? $prev['created_at'] : null;
                $violation->updated_at = array_key_exists('updated_at', $prev) ? $prev['updated_at'] : null;

                $violation->previous_data = null;
            } else {
                $violation->Violation = null;
                $violation->Offense_Record = null;
                $violation->Sanction = null;
                $violation->Notify_Status = 'Not Sent';
                $violation->status = 'pending';
                $violation->submitted_by = null;
                $violation->created_at = null;
                $violation->updated_at = null;
            }

            $violation->save();

            return back()->with('success', 'Violation rejected, previous data restored, and reporter notified.');
        }

        // DELETE
        if ($action === 'delete') {
            // If previous_data exists, restore it (like reject)
            if (!empty($violation->previous_data)) {
                $prev = json_decode($violation->previous_data, true);
                $violation->Violation = $prev['Violation'] ?? null;
                $violation->Offense_Record = $prev['Offense_Record'] ?? null;
                $violation->Sanction = $prev['Sanction'] ?? null;
                $violation->Notify_Status = $prev['Notify_Status'] ?? 'Not Sent';
                $violation->First_Name = $prev['First_Name'] ?? $violation->First_Name;
                $violation->Middle_Name = $prev['Middle_Name'] ?? $violation->Middle_Name;
                $violation->Last_Name = $prev['Last_Name'] ?? $violation->Last_Name;
                $violation->Course = $prev['Course'] ?? $violation->Course;
                $violation->Year_and_Section = $prev['Year_and_Section'] ?? $violation->Year_and_Section;
                $violation->Student_Email = $prev['Student_Email'] ?? $violation->Student_Email;
                $violation->Parent_Email = $prev['Parent_Email'] ?? $violation->Parent_Email;
                $violation->submitted_by = $prev['submitted_by'] ?? null;
                $violation->status = $prev['status'] ?? 'pending';
                $violation->created_at = array_key_exists('created_at', $prev) ? $prev['created_at'] : null;
                $violation->updated_at = array_key_exists('updated_at', $prev) ? $prev['updated_at'] : null;
                $violation->previous_data = null;
                $violation->save();
                return back()->with('success', 'Submitted violation has been successfully deleted and previous data restored.');
            } else {
                // If no previous_data, do not allow delete
                return back()->with('error', "Sorry, you are not allowed to delete this");
            }
        }

        // INVALID ACTION
        return back()->with('error', 'Invalid action.');
    }
}
