<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
        ]);

        Registration::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'student_id' => $request->student_id,
            'faculty' => $request->faculty,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->route('events.show', $event)->with('success', 'You have successfully registered for the event.');
    }

    public function quickRegister(Event $event)
    {
        $user = Auth::user();

        Registration::create([
            'event_id' => $event->id,
            'user_id' => $user->id,
            'full_name' => $user->name,
            'student_id' => $user->student_id,
            'faculty' => $user->faculty,
            'contact_number' => $user->contact_number,
        ]);

        return redirect()->route('events.show', $event)->with('success', 'You have successfully registered for the event.');
    }
}
