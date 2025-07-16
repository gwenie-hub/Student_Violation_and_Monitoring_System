<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentViolation extends Model
{
    use HasFactory;

    // Explicit table definition (optional, but safe)
    protected $table = 'student_violations';

    protected $fillable = [
        'student_id',
        'reported_by',
        'last_name',
        'first_name',
        'middle_name',
        'course',
        'year_section',
        'violation',
        'offense_type',
        'status',
        'sanction',
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
