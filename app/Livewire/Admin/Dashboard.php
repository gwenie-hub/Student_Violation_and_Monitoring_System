<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('admin.dashboard'); // Not livewire.admin.dashboard
    }
}
