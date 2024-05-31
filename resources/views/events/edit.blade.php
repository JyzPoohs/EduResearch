@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">

        <div class="card text-center">
            <div class="card-body">
                <h3 class="card-title">Edit Event</h3>
                <div class="text-center">
                    <form style="width: 80%; margin:auto" action={{ route('events.update', ['id' => $data->id]) }}
                        class="form" method="post" enctype="multipart/form-data" role="form">
                        @csrf
                        @method('PUT')
                        <input hidden type="text" class="form-control @error('file') is-invalid @enderror"
                            id="user_id" name="user_id" required
                            value="{{ $data->user_id ? $data->user_id : 'user_id' }}">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" required value="{{ $data->title ? $data->title : 'Event Title' }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="organizer">Organized By</label>
                            <input type="text" class="form-control @error('organizer') is-invalid @enderror" id="organizer"
                                name="organizer" required value="{{ $data->organizer ? $data->organizer : 'Organizer Name' }}">
                            @error('organizer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="date">Event Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                name="date" value="{{ $data->date ? $data->date : 'Published Date' }}" required>
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" required
                                value="{{ $data->description ? $data->description : 'Event Description' }}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        
                        <button type="submit" style="width: 80%" class="btn btn-view">Submit</button>

                    </form>
                    <a class="btn btn-secondary" style="width: 70%" href="{{ route('events.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
