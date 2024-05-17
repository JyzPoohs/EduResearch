@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <div class="container mt-4">
            <div class="row mt-2">
                @if (session()->has('success') || session()->has('error'))
                    <div id="alert">
                        @include('ManagePublication.alert')
                    </div>
                @endif
            </div>
        </div>
        <div class="card p-3">
            <div class="card-body">
                <h3 class="card-title">{{ $data->title ? $data->title : 'Publication Title' }}</h3>
                <div>
                    <p class="mt-4">{{ $data->date ? $data->date : 'Published Date' }}</p>
                </div>
                <div>
                    <p>Author(s): {{ $data->author ? $data->author : 'Author(s) Name' }}</p>
                    <p>Type: {{ $data->type ? ucfirst($data->type) : 'Publication Type' }}</p>
                    <p>Keyword(s): {{ $data->keywords ? $data->keywords : 'Publication Keywords' }}</p>
                    <p>URL: {{ $data->url ? $data->url : 'Publication URL' }}</p>
                    <p>DOI: {{ $data->doi ? $data->doi : 'Publication DOI' }}</p>
                </div>
                <div>
                    <h4>Abstract</h4>
                    <p>{{ $data->abstract ? $data->abstract : 'Publication Abstract' }}</p>
                </div>
                <div>
                    <p><strong>Full-text PDF:</strong> {{ $data->file? $data->file : "No file found" }}</p>
                </div>
                <div>
                    @if ($data->file)
                        <a href="{{ route('publications.pdf', ['id' => $data->id]) }}" class="btn btn-view">View
                            full-text pdf</a>
                    @else
                        <button disabled class="btn btn-view">PDF Not Available</button>
                    @endif

                    <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
