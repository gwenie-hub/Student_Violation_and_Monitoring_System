<?php

namespace App\Http\Livewire\Disciplinary;

use App\Models\Violation;
use Livewire\Component;
use App\Mail\ViolationVerifiedMail;
use Illuminate\Support\Facades\Mail;

class ManageViolations extends Component
{
    public $violations;
    public $sanction = [];

    public function mount()
    {
        $this->violations = Violation::where('status', 'pending')->with('student')->get();
    }

    public function verify($id)
    {
        $violation = Violation::find($id);
        $violation->status = 'verified';
        $violation->sanction = $this->sanction[$id] ?? 'Verbal Warning';
        $violation->save();

    // Send email to parent
    if ($violation->student->parent_email) {
        Mail::to($violation->student->parent_email)->send(new ViolationVerifiedMail($violation));
    }

    $this->mount(); // reload
    }

    public function reject($id)
    {
        $violation = Violation::find($id);
        $violation->status = 'rejected';
        $violation->save();
        $this->mount(); // reload
    }

    public function render()
    {
        return view('livewire.disciplinary.manage-violations');
    }
}
