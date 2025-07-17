<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArchivedStudentViolation extends Model
{
    use HasFactory;

    protected $table = 'archived_student_violations';

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

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }


}
