<?php

namespace App\Livewire\Disciplinary;

use Livewire\Component;
use App\Models\Violation;

class ViolationRecords extends Component
{
    public function render()
    {
        $violations = Violation::with('student')->latest()->get();

        return view('livewire.disciplinary.violation-records', compact('violations'));
    }

    public function index(Request $request)
    {
        $query = StudentViolation::query();

        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('last_name', 'like', "%{$search}%")
                ->orWhere('first_name', 'like', "%{$search}%")
                ->orWhere('middle_name', 'like', "%{$search}%");
            });
        }

        $violations = $query->latest()->paginate(10);

        return view('disciplinary.reports', compact('violations'));
    }

}
