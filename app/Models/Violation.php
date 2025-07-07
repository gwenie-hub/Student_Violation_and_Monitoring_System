<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $fillable = [
        'student_id', 'description', 'severity_level', 'color',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
