@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-4">
            
    <div class="card p-3">
        <div class="card-body">
            <h3 class="card-title">{{ $data->title ? $data->title : 'Event Title' }}</h3>
            <div>
                <p class="mt-4">{{ $data->date ? $data->date : 'Event Date' }}</p>
            </div>
            <div>
                <p>Organized By: {{ $data->organizer ? $data->organizer : 'Organizer Name' }}</p>
                <p>Venue: {{ $data->venue ? $data->venue : 'Event Venue' }}</p>
                <p>Description: {{ $data->description ? $data->description : 'Event Description' }}</p>

            </div>

                <a class="btn btn-secondary" href="{{ route('events.index') }}">Back</a>

                <form action="{{ route('events.view', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to register for this event?');" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>