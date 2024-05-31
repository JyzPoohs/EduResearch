<!-- resources/views/admin/registrations.blade.php -->

@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-4">
    <h1>Registrations for {{ $event->title }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($registrations->isEmpty())
        <p>No registrations for this event.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $registration)
                    <tr>
                        <td>{{ $registration->user->name }}</td>
                        <td>{{ $registration->user->email }}</td>
                        <td>{{ $registration->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
