<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin' ||Auth::user()->role == 'lecturer' ) {
            $datas = Event::orderBy('created_at')->get();
        } elseif (Auth::user()->role == 'student') {
            $datas = Event::orderBy('created_at', 'desc')->get();
            return view ('events.index', compact('datas'));
        } 
        return view ('events.index', compact('datas'));

    }

    public function view($id)
    {
        $data = Event::find($id);
        return view('events.view', compact('data'));
    }

    public function show($id)
    {
        $data = Event::find($id);
        return view('events.show', compact('data'));
    }

    public function create()
    {
        return view('events.create');
    }
    
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'organizer' => 'required',
                'venue' => 'required',
                'date' => 'required|date',
                'description' => 'required|max:255',
            ],
            
        );
       
        Event::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'organizer' => $request->organizer,
            'venue' => $request->venue,
            'date' => $request->date,
            'description' => $request->description,
            
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Event has added successfully.');
    }

    public function edit($id)
    {
        $data = Event::find($id);
        return view('events.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'organizer' => 'required',
            'venue' => 'required',
            'date' => 'required',
            'description' => 'required|max:255',
        ]);

        

        $publication->update([
            'title' => $request->title,
            'author' => $request->organizer,
            'venue' => $request->venue,
            'date' => $request->date,
            'description' => $request->description,
            
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Event has updated successfully');
    }


    public function destroy($id)
    {
        Event::find($id)->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event has deleted successfully');
    }

    public function register(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();

        if (Registration::where('event_id', $event->id)->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You are already registered for this event.');
        }

        Registration::create([
            'event_id' => $event->id,
            'user_id' => $user->id,
        ]);

        $event->user()->attach($user->id);
        return redirect()->back()->with('success', 'You have successfully registered for the event.');
    }

    public function viewRegistrations($id)
    {
        $event = Event::findOrFail($id);
        $registrations = Registration::where('event_id', $id)->with('user')->get();

        return view('events.registrations', compact('event', 'registrations'));
    }
}
