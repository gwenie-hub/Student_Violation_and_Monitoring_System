<?php

namespace App\Http\Controllers\Disciplinary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentNotificationController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'parent_email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Simulate notifying parent (e.g. via email or DB record)
        // For now, just return a success message

        // You can implement actual email sending later
        return back()->with('success', 'Notification sent to parent of ' . $request->student_name);
    }
}
