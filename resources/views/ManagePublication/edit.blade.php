@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <div class="row mt-2">
            @if (session()->has('success'))
                <div id="alert">
                    @include('ManagePublication.alert')
                </div>
            @endif

        </div>
        <div class="card text-center">
            <div class="card-body">
                <h3 class="card-title">Edit Publication</h3>
                <div class="text-center">
                    <form style="width: 800px; margin:auto" action={{ route('publications.update', ['id' => $data->id]) }} 
                        class="form" method="post" enctype="multipart/form-data" role="form">
                        @csrf
                        @method('PUT')
                        <input hidden type="text" class="form-control" id="publisher_id" name="publisher_id" required
                                value="{{ $data->publisher_id ? $data->publisher_id : 'publisher_id' }}">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required
                                value="{{ $data->title ? $data->title : 'Author(s) Name' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="author">Author(s)</label>
                            <input type="text" class="form-control" id="author" name="author" required
                                value="{{ $data->author ? $data->author : 'Author(s) Name' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="type">Publication Type</label>
                            <select class="form-select" name="type" id="type">
                                <option disabled {{ $data->type == 'default' ? 'selected' : '' }} value="default">Select
                                    Publication Type</option>
                                <option {{ $data->type == 'article' ? 'selected' : '' }} selected value="article">
                                    Article</option>
                                <option {{ $data->type == 'book' ? 'selected' : '' }} value="book">Book</option>
                                <option {{ $data->type == 'conference' ? 'selected' : '' }} value="conference">Conference
                                </option>
                                <option {{ $data->type == 'journal' ? 'selected' : '' }} value="journal">Journal
                                </option>
                                <option {{ $data->type == 'patent' ? 'selected' : '' }} value="patent">Patent</option>
                                <option {{ $data->type == 'thesis' ? 'selected' : '' }} value="thesis">Thesis</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="date">Publication Date</label>
                            <input type="date" class="form-control" id="date" name="date"
                                value="{{ $data->date ? $data->date : 'Published Date' }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keywords">Keywords</label>
                            <input type="text" class="form-control" id="keywords" name="keywords" required
                                value="{{ $data->keywords ? $data->keywords : 'Publication Keywords' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="doi">DOI</label>
                            <input type="text" class="form-control" id="doi" name="doi" required
                                value="{{ $data->doi ? $data->doi : 'Publication DOI' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" required
                                value="{{ $data->url ? $data->url : 'Publication URL' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="abstract">Abstract</label>
                            <textarea class="form-control" id="abstract" name="abstract" rows="8" required>{{ $data->abstract ? $data->abstract : 'Publication Abstract' }}
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="file">Publication File</label>
                            <p type="text" id="file" name="file">
                                {{ $data->file ? $data->file : 'Publication File' }}</p>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                        <button type="submit" style="width: 700px" class="btn btn-view">Submit</button>
                        
                    </form>
                    <a class="btn btn-secondary" style="width: 700px" href="{{ route('publications-list') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
