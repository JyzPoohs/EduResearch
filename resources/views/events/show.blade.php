{{--@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->title }}</h1>
        <p><strong>Organizer:</strong> {{ $event->organizer }}</p>
        <p><strong>Venue:</strong> {{ $event->venue }}</p>
        <p><strong>Date:</strong> {{ $event->date }}</p>
        <p>{{ $event->description }}</p>

        <h2>Register for this event</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('registrations.store', $event) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}" required>
            </div>
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" name="student_id" class="form-control" value="{{ old('student_id') }}" required>
            </div>
            <div class="form-group">
                <label for="faculty">Faculty</label>
                <input type="text" name="faculty" class="form-control" value="{{ old('faculty') }}" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <form action="{{ route('registrations.quickRegister', $event) }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-secondary">Quick Register</button>
        </form>
    </div>
@endsection --}}

@extends('layouts.user_type.auth')

@section('content')
    
    <div class="card text-center">
        <div class="card-body">
            <h3 class="card-title">View Event</h3>
            <div class="text-center" style="width: 80%; margin:auto">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input disabled type="text" class="form-control" id="title" name="title"
                        value="{{ $data->title ? $data->title : 'Event Title' }}">
                </div>
                <div class="form-group mb-3">
                    <label for="organizer">Organized By</label>
                    <input disabled type="text" class="form-control" id="organizer" name="organizer"
                        value="{{ $data->organizer ? $data->organizer : 'Organizer Name' }}">
                </div>

                <div class="form-group mb-3">
                    <label for="date">Event Date</label>
                    <input disabled type="date" class="form-control" id="date" name="date"
                        value="{{ $data->date ? $data->date : 'Event Date' }}">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <input disabled type="text" class="form-control" id="description" name="description"
                        value="{{ $data->description ? $data->description : 'Event Description' }}">
                </div>

                <a class="btn btn-secondary" style="width: 70%" href="{{ route('events.index') }}">Back</a>
            </div>
        </div>
    </div>
    </div>
@endsection

