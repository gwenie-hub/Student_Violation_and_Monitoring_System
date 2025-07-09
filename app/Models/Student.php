<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'section',
        'parent_email',
    ];

    // app/Models/Student.php
    public function parentUser()
    {
        return $this->hasOne(User::class);
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
