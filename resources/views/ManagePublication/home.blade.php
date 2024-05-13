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
    <div class="row">
        <div class="col-lg-9">
            <h3>Publications</h3>
            <p>Academic success depends on research and publications.</p>
        </div>
        <div class="col-lg-3">
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'lecturer')
                <a href="{{ route('publications.create') }}" class="btn btn-primary">Upload Publications</a>
            @endif
        </div>
    </div>
    @if ($datas->isEmpty())
        <div class="row mt-4">
            <h6>Currently no publications are available...</h6>
        </div>
    @else
        @php $count = 0; @endphp
        @foreach ($datas as $data)
            @if ($count % 3 == 0)
                <div class="row mt-4">
            @endif
            <div class="col-lg-4">
                <div class="card h-100 p-3">
                    <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                            <h5 class="font-weight-bolder mb-4 pt-2">
                                {{ $data->title ? $data->title : 'Publication Title' }}
                            </h5>
                            <p class="text-sm">{{ $data->date ? $data->date : 'Published Date' }}</p>
                            <p class="text-sm">{{ $data->author ? $data->author : 'Author(s) Name' }}</p>
                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $data->abstract ? $data->abstract : 'Publication Abstract' }}</p>
                            <a class="text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                href="{{ route('publications.view', ['id' => $data->id]) }}">
                                Read More
                                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @php $count++; @endphp
            @if ($count % 3 == 0 || $loop->last)
                </div>
            @endif
        @endforeach
    @endif
@endsection
