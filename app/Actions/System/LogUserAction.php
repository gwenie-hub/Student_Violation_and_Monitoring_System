<?php
namespace App\Actions\System;

use App\Models\SystemLog;
use Illuminate\Support\Facades\Auth;

class LogUserAction
{
    public static function log($action, $details = null)
    {
        $user = Auth::user();
        SystemLog::create([
            'user_id' => $user ? $user->id : null,
            'name' => $user ? ($user->name ?? ($user->fname . ' ' . $user->lname)) : 'Unknown',
            'action' => $action . ($details ? (': ' . $details) : ''),
        ]);
    }
}
