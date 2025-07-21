<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StudentViolation;
use Illuminate\Support\Facades\Auth;

class ViolationForm extends Component
{
    public $Student_ID = '';
    public $studentRecord = null;
    public $Violation = '';
    public $Offense_Record = '';
    public $Sanction = '';
    public $Notify_Status = 'Not Sent';
    public $showConfirmDialog = false;

    public $violationOptions = [
        'Improper Uniform',
        'Non-Display of ID Card',
        'Littering',
        'Discourtesy',
        'Carrying Deadly Weapons/use of Explosive',
        'Vandalism',
        'Rummaging, Theft or Damage to Another Personal Property',
        'Incident Public display of affection',
        'Drinking liquor/Taking probihited drugs/smoking',
        'Pornographic and/or subsersive materials',
        'Gambling',
        'Boycotting',
        'Disrespect for the Philippine flag, anthem and school name and logo',
        'Unauthorized school organization and activities',
        'Cheating or academic dishonesty',
        'Forgery',
        'Brawling',
        'Bullying in any form',
        'Assault',
        'verbal abuse/defamation',
    ];

    public $minorViolations = [
        'Improper Uniform',
        'Non-Display of ID Card',
        'Littering',
    ];

    public function updatedStudentID($value)
    {
        $this->studentRecord = \App\Models\StudentViolation::where('Student_ID', $value)->first();
    }

    public function updatedViolation($value)
    {
        $type = in_array($value, $this->minorViolations) ? 'Minor' : 'Major';
        $this->Sanction = $this->getSanction($type, $this->getOffenseCount());
        $this->Offense_Record = $this->getOffenseLabel($this->getOffenseCount());
    }

    public function getOffenseCount()
    {
        if (!$this->studentRecord) return 1;

        switch ($this->studentRecord->Offense_Record) {
            case '1st Offense': return 2;
            case '2nd Offense': return 3;
            case '3rd Offense': return 4;
            case '4th Offense': return 4;
            default: return 1;
        }
    }

    public function getOffenseLabel($count)
    {
        return match ($count) {
            1 => '1st Offense',
            2 => '2nd Offense',
            3 => '3rd Offense',
            4 => '4th Offense',
            default => '1st Offense',
        };
    }

    public function getSanction($type, $count)
    {
        return match ($type) {
            'Minor' => match ($count) {
                1 => 'Counselling and cleaning of litter',
                2 => 'Cleaning the campus area/community service as imposed by the POD',
                3 => '2 day suspension and community service as imposed by the POD',
                4 => 'Dismissal',
            },
            'Major' => match ($count) {
                1 => 'Reprimand and counsel',
                2 => 'Two week suspension',
                3, 4 => 'Dismissal',
            },
            default => 'Dismissal'
        };
    }

    public function submit()
    {
        $this->showConfirmDialog = true;
    }

    public function confirmSubmit()
    {
        $type = in_array($this->Violation, $this->minorViolations) ? 'Minor' : 'Major';
        $count = $this->getOffenseCount();
        $offenseLabel = $this->getOffenseLabel($count);
        $sanction = $this->getSanction($type, $count);

        // Check if a pending violation for this student already exists (regardless of violation type)
        $existing = \App\Models\StudentViolation::where('Student_ID', $this->Student_ID)
            ->latest()
            ->first();

        $userId = Auth::id();
        $userEmail = Auth::user()->email ?? null;
        if ($existing) {
            // Store previous data in the previous_data column (as JSON)
            $existing->previous_data = json_encode([
                'Violation' => $existing->Violation,
                'Offense_Record' => $existing->Offense_Record,
                'Sanction' => $existing->Sanction,
                'Notify_Status' => $existing->Notify_Status,
                'First_Name' => $existing->First_Name,
                'Middle_Name' => $existing->Middle_Name,
                'Last_Name' => $existing->Last_Name,
                'Course' => $existing->Course,
                'Year_and_Section' => $existing->Year_and_Section,
                'Student_Email' => $existing->Student_Email,
                'Parent_Email' => $existing->Parent_Email,
                'submitted_by' => $existing->submitted_by,
                'status' => $existing->status,
                'created_at' => $existing->created_at,
                'updated_at' => $existing->updated_at,
            ]);

            // Update the existing violation row
            $existing->Violation = $this->Violation;
            $existing->Offense_Record = $offenseLabel;
            $existing->Sanction = $sanction;
            $existing->Notify_Status = 'Not Sent';
            $existing->status = 'Pending';
            $existing->First_Name = $this->studentRecord->First_Name ?? '';
            $existing->Middle_Name = $this->studentRecord->Middle_Name ?? '';
            $existing->Last_Name = $this->studentRecord->Last_Name ?? '';
            $existing->Course = $this->studentRecord->Course ?? '';
            $existing->Year_and_Section = $this->studentRecord->Year_and_Section ?? '';
            $existing->Student_Email = $this->studentRecord->Student_Email ?? '';
            $existing->Parent_Email = $this->studentRecord->Parent_Email ?? '';
            if ($userId) {
                $existing->submitted_by = $userId;
            }
            $existing->created_at = now();
            $existing->save();
        } else {
            // Only insert if no record exists for this student
            $data = [
                'Student_ID' => $this->Student_ID,
                'Violation' => $this->Violation,
                'Offense_Record' => $offenseLabel,
                'Sanction' => $sanction,
                'Notify_Status' => 'Not Sent',
                'status' => 'Pending',
                'First_Name' => $this->studentRecord->First_Name ?? '',
                'Middle_Name' => $this->studentRecord->Middle_Name ?? '',
                'Last_Name' => $this->studentRecord->Last_Name ?? '',
                'Course' => $this->studentRecord->Course ?? '',
                'Year_and_Section' => $this->studentRecord->Year_and_Section ?? '',
                'Student_Email' => $this->studentRecord->Student_Email ?? '',
                'Parent_Email' => $this->studentRecord->Parent_Email ?? '',
                'submitted_by' => $userId,
                'created_at' => now(),
            ];
            \App\Models\StudentViolation::create($data);
        }

        $this->showConfirmDialog = false;
        session()->flash('success', 'Violation submitted and waiting for approval!');
        $this->reset([
            'Student_ID', 'Violation', 'Offense_Record', 'Sanction', 'Notify_Status', 'studentRecord'
        ]);
    }


    public function cancelSubmit()
    {
        $this->showConfirmDialog = false;
        $this->reset(['Violation', 'Offense_Record', 'Sanction']);
    }

    public function render()
    {
        return view('livewire.violation-form', [
            'studentRecord' => $this->studentRecord,
            'showConfirmDialog' => $this->showConfirmDialog,
            'violationOptions' => $this->violationOptions,
            'Offense_Record' => $this->Offense_Record,
            'Sanction' => $this->Sanction,
        ]);
    }

    // Static helper to get current user's pending violations from DB
    public static function getMyPendingViolations()
    {
        $userId = auth()->id();
        return \App\Models\StudentViolation::where('submitted_by', $userId)
            ->where('status', 'Pending')
            ->latest()
            ->get();
    }

    // Static helper to get ALL pending violations from DB (for disciplinary dashboard)
    public static function getAllPendingViolations()
    {
        return \App\Models\StudentViolation::where('status', 'Pending')->latest()->get();
    }
}
