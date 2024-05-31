@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Full Name</th>
                    <th>Student ID</th>
                    <th>Faculty</th>
                    <th>Contact Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $registration)
                    <tr>
                        <td>{{ $registration->event->title }}</td>
                        <td>{{ $registration->full_name }}</td>
                        <td>{{ $registration->student_id }}</td>
                        <td>{{ $registration->faculty }}</td>
                        <td>{{ $registration->contact_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
