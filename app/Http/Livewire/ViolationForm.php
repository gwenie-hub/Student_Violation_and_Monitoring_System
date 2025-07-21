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
        // Categorize violation
        $type = in_array($value, $this->minorViolations) ? 'Minor' : 'Major';
        $this->Sanction = $this->getSanction($type, $this->getOffenseCount());
        $this->Offense_Record = $this->getOffenseLabel($this->getOffenseCount());
    }

    public function getOffenseCount()
    {
        if (!$this->studentRecord) return 1;
        $count = 1;
        if ($this->studentRecord->Offense_Record === '1st Offense') $count = 2;
        elseif ($this->studentRecord->Offense_Record === '2nd Offense') $count = 3;
        elseif ($this->studentRecord->Offense_Record === '3rd Offense') $count = 4;
        return $count;
    }

    public function getOffenseLabel($count)
    {
        switch ($count) {
            case 1: return '1st Offense';
            case 2: return '2nd Offense';
            case 3: return '3rd Offense';
            case 4: return '4th Offense';
            default: return '1st Offense';
        }
    }

    public function getSanction($type, $count)
    {
        if ($type === 'Minor') {
            switch ($count) {
                case 1: return 'Counselling and cleaning of litter';
                case 2: return 'Cleaning the campus area/community service as imposed by the POD';
                case 3: return '2 day suspension and community service as imposed by the POD';
                case 4: return 'Dismissal';
            }
        } else {
            switch ($count) {
                case 1: return 'Reprimand and counsel';
                case 2: return 'Two week suspension';
                case 3: return 'Dismissal';
            }
        }
        return '';
    }

    public function submit()
    {
        // Show confirm dialog before saving
        $this->showConfirmDialog = true;
    }

    public function confirmSubmit()
    {
        // Save record and send email
        $type = in_array($this->Violation, $this->minorViolations) ? 'Minor' : 'Major';
        $count = $this->getOffenseCount();
        $offenseLabel = $this->getOffenseLabel($count);
        $sanction = $this->getSanction($type, $count);

        $record = \App\Models\StudentViolation::updateOrCreate(
            ['Student_ID' => $this->Student_ID],
            [
                'Violation' => $this->Violation,
                'Offense_Record' => $offenseLabel,
                'Sanction' => $sanction,
                'Notify_Status' => 'Sent',
            ]
        );

        // Email logic
        $studentInfo = [
            'First_Name' => $this->studentRecord->First_Name ?? '',
            'Middle_Name' => $this->studentRecord->Middle_Name ?? '',
            'Last_Name' => $this->studentRecord->Last_Name ?? '',
            'Student_ID' => $this->Student_ID,
            'Course' => $this->studentRecord->Course ?? '',
            'Year_and_Section' => $this->studentRecord->Year_and_Section ?? '',
        ];
        $studentEmail = $this->studentRecord->Student_Email ?? null;
        $parentEmail = $this->studentRecord->Parent_Email ?? null;

        if ($type === 'Minor' && $offenseLabel === '2nd Offense') {
            // Send to student only
            \Mail::to($studentEmail)->send(new \App\Mail\ParentViolationNotification(
                $studentInfo,
                $this->Violation,
                $offenseLabel,
                $sanction,
                null
            ));
        } else {
            // Send to both student and parent
            if ($studentEmail) {
                \Mail::to($studentEmail)->send(new \App\Mail\ParentViolationNotification(
                    $studentInfo,
                    $this->Violation,
                    $offenseLabel,
                    $sanction,
                    null
                ));
            }
            if ($parentEmail) {
                \Mail::to($parentEmail)->send(new \App\Mail\ParentViolationNotification(
                    $studentInfo,
                    $this->Violation,
                    $offenseLabel,
                    $sanction,
                    null
                ));
            }
        }

        $this->showConfirmDialog = false;
        session()->flash('success', 'Violation submitted and notification sent!');
        $this->reset(['Student_ID', 'Violation', 'Offense_Record', 'Sanction', 'Notify_Status', 'studentRecord']);
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
}
