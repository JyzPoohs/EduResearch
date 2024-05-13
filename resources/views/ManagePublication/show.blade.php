@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <div class="row mt-2">
            @if (session()->has('success') || session()->has('error'))
                <div id="alert">
                    @include('ManagePublication.alert')
                </div>
            @endif
        </div>
    </div>

    <div class="card text-center">
        <div class="card-body">
            <h3 class="card-title">View Publication</h3>
            <div class="text-center" style="width: 800px; margin:auto">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input disabled type="text" class="form-control" id="title" name="title"
                        value="{{ $data->title ? $data->title : 'Publication Title' }}">
                </div>
                <div class="form-group mb-3">
                    <label for="author">Author(s)</label>
                    <input disabled type="text" class="form-control" id="author" name="author"
                        value="{{ $data->author ? $data->author : 'Author(s) Name' }}">
                </div>
                <div class="form-group mb-3">
                    <label for="type">Publication Type</label>
                    <select disabled class="form-select" name="type" id="type">
                        <option {{ $data->type == 'default' ? 'selected' : '' }} value="$data->type">Select Publication
                            Type</option>
                        <option {{ $data->type == 'article' ? 'selected' : '' }} selected value="$data->type">Article
                        </option>
                        <option {{ $data->type == 'book' ? 'selected' : '' }} value="$data->type">Book</option>
                        <option {{ $data->type == 'conference' ? 'selected' : '' }} value="$data->type">Conference
                        </option>
                        <option {{ $data->type == 'journal' ? 'selected' : '' }} value="$data->type">Journal</option>
                        <option {{ $data->type == 'patent' ? 'selected' : '' }} value="$data->type">Patent</option>
                        <option {{ $data->type == 'thesis' ? 'selected' : '' }} value="$data->type">Thesis</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="date">Publication Date</label>
                    <input disabled type="date" class="form-control" id="date" name="date"
                        value="{{ $data->date ? $data->date : 'Published Date' }}">
                </div>
                <div class="form-group mb-3">
                    <label for="keywords">Keywords</label>
                    <input disabled type="text" class="form-control" id="keywords" name="keywords"
                        value="{{ $data->keywords ? $data->keywords : 'Publication Keywords' }}">
                </div>
                <div class="form-group mb-3">
                    <label for="doi">DOI</label>
                    <input disabled type="text" class="form-control" id="doi" name="doi"
                        value="{{ $data->doi ? $data->doi : 'Publication DOI' }}">
                </div>
                <div class="form-group mb-3">
                    <label for="url">URL</label>
                    <input disabled type="text" class="form-control" id="url" name="url"
                        value="{{ $data->url ? $data->url : 'Publication URL' }}">
                </div>
                <div class="form-group mb-3">
                    <label for="abstract">Abstract</label>
                    <textarea disabled class="form-control" id="abstract" name="abstract" rows="8">{{ $data->abstract ? $data->abstract : 'Publication Abstract' }}
                        </textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="file">Publication File</label>
                    <p type="text" id="file" name="file">
                        {{ $data->file ? $data->file : 'Publication File' }}</p>
                    <a style="width: 500px" href="{{ route('publications.viewPDF', ['id' => $data->id]) }}"
                        class="btn">View PDF</a>
                </div>
                <a class="btn btn-view" style="width: 700px" href="{{ route('publications-list') }}">Back</a>
            </div>
        </div>
    </div>
    </div>
@endsection
