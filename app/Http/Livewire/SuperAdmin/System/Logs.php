<?php

namespace App\Http\Livewire\SuperAdmin\System;

use Livewire\Component;
use App\Models\SystemLog;

class Logs extends Component
{
    public function render()
    {
        $logs = SystemLog::with('user')->latest()->take(50)->get(); // adjust limit if needed

        return view('livewire.super-admin.system.logs', [
            'logs' => $logs,
        ]);
    }
}
