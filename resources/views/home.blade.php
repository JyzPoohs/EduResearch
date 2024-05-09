@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-lg-10">
            <h3>Publications</h3>
            <p>Academic success depends on research and publications.</p>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('publications.create') }}" class="btn btn-primary">Upload Publications</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card h-100 p-3">
                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                    <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                        <h5 class=" font-weight-bolder mb-4 pt-2">Classification of Mobile-Based Oral Cancer Images Using
                            the
                            Vision Transformer and the Swin Transformer</h5>
                        <p class="text-sm">1 Mar 2023</p>
                        <p class="text-sm">Author name</p>
                        <p>Wealth creation is an evolutionarily recent positive-sum game. It is all about who take the
                            opportunity first.</p>
                        <a class="text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="{{route('publications.view')}}">
                            Read More
                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100 p-3">
                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                    <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                        <h5 class=" font-weight-bolder mb-4 pt-2">Classification of Mobile-Based Oral Cancer Images Using
                            the Vision Transformer and the Swin Transformer</h5>
                        <p class="text-sm">1 Mar 2023</p>
                        <p class="text-sm">Author name</p>
                        <p>Wealth creation is an evolutionarily recent positive-sum game. It is all about who take the
                            opportunity first.</p>
                        <a class="text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="">
                            Read More
                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100 p-3">
                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                    <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                        <h5 class=" font-weight-bolder mb-4 pt-2">Classification of Mobile-Based Oral Cancer Images Using
                            the Vision Transformer and the Swin Transformer</h5>
                        <p class="text-sm">1 Mar 2023</p>
                        <p class="text-sm">Author name</p>
                        <p>Wealth creation is an evolutionarily recent positive-sum game. It is all about who take the
                            opportunity first.</p>
                        <a class="text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="">
                            Read More
                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
