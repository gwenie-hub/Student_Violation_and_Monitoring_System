<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemLog;

class SystemLogsController extends Controller
{
    public function index()
    {
        $logs = SystemLog::latest()->paginate(20);
        return view('super-admin.system-logs', compact('logs'));
    }
}
