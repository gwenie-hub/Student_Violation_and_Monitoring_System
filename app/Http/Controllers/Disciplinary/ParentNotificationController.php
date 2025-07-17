<?php
namespace App\Http\Controllers\Disciplinary;
use App\Models\SystemLog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ParentViolationNotification;

class ParentNotificationController extends Controller
{
    public function showForm()
    {
        return view('disciplinary.notify-parents');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'summary' => 'required|string|max:1000',
        ]);


        Mail::to($request->email)->send(new ParentViolationNotification($request->summary));

        // Log notification action
        SystemLog::create([
            'user_id' => auth()->id(),
            'name' => auth()->user()->name ?? (auth()->user()->fname . ' ' . auth()->user()->lname),
            'action' => 'sent parent notification to: ' . $request->email,
        ]);

        return back()->with('success', 'Email has been sent successfully!');
    }
}
