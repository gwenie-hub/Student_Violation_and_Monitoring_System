<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentViolation extends Model
{
    use HasFactory;

    // Connect to student_records table
    protected $table = 'student_records';

    protected $fillable = [
        'Student_ID',
        'First_Name',
        'Middle_Name',
        'Last_Name',
        'Course',
        'Major',
        'Year_and_Section',
        'Student_Email',
        'Parent_Email',
        'Violation',
        'Offense_Record',
        'Sanction',
        'Notify_Status',
    ];

    /**
     * Relationship to the student who committed the violation.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Relationship to the reporter of the violation.
     */
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    /**
     * Accessor to get the full name.
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }


}
