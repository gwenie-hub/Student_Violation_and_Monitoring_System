<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SystemLog extends Model
{
    protected $fillable = ['user_id', 'name', 'action'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
