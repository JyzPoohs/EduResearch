@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <div class="row mt-2">
            
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">Create Event</h3>
                    <div class="text-center">
                        <form style="width: 70%; margin:auto" action={{ route('events.store') }} class="form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" required value="{{ old('title') }}"
                                    placeholder="eg. The Future of Work: Strategies for Surviving... (Max 255 words)">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="organizer">Organized By</label>
                                <input type="text" class="form-control @error('organizer') is-invalid @enderror"
                                    id="organizer" name="organizer" required value="{{ old('organizer') }}"
                                    placeholder="Insert the name of the event organizer.">
                                @error('organizer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="venue">Venue</label>
                                <input type="text" class="form-control @error('venue') is-invalid @enderror"
                                    id="venue" name="venue" required value="{{ old('venue') }}"
                                    placeholder="eg. Dewan Astaka, UMPSA Gambang">
                                @error('venue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="date">Event Date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    id="date" name="date" required value="{{ old('date') }}">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" required value="{{ old('description') }}"
                                    placeholder="eg. Get to learn the strategies for surviving... (Max 255 words)">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                                        
                            <button type="submit" style="width: 80%" class="btn btn-view">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
