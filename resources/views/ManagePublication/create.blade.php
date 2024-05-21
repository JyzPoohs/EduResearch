@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <div class="row mt-2">
            @if (session()->has('success') || session()->has('error'))
                <div id="alert">
                    @include('ManagePublication.alert')
                </div>
            @endif
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="text-white mb-0">{{ session()->get('message') }}</p>
            </div>
            @endif
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">Upload Publication</h3>
                    <div class="text-center">
                        <form style="width: 70%; margin:auto" action={{ route('publications.store') }} class="form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" required value="{{ old('title') }}"
                                    placeholder="eg. Building A Sustainable Future: An Experimental Study on... (Max 255 words)">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="author">Author(s)</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror"
                                    id="author" name="author" required value="{{ old('author') }}"
                                    placeholder="Junaid Kameran Ahmed, Nihat Atmaca">
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="type">Publication Type</label>
                                <select class="form-select @error('type') is-invalid @enderror" name="type"
                                    id="type" required>
                                    <option disabled selected value="default">Select Publication Type (eg. Article)</option>
                                    <option {{ old('type') == 'article' ? 'selected' : '' }} value="article">Article
                                    </option>
                                    <option {{ old('type') == 'book' ? 'selected' : '' }} value="book">Book</option>
                                    <option {{ old('type') == 'conference' ? 'selected' : '' }} value="conference">
                                        Conference
                                    </option>
                                    <option {{ old('type') == 'journal' ? 'selected' : '' }} value="journal">Journal
                                    </option>
                                    <option {{ old('type') == 'patent' ? 'selected' : '' }} value="patent">Patent</option>
                                    <option {{ old('type') == 'thesis' ? 'selected' : '' }} value="thesis">Thesis</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="date">Publication Date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    id="date" name="date" required value="{{ old('date') }}">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="keywords">Keywords</label>
                                <input type="text" class="form-control @error('keywords') is-invalid @enderror"
                                    id="keywords" name="keywords" required value="{{ old('keywords') }}"
                                    placeholder="eg. Engineered geopolymer composites, Recycled brick waste powder, Construction waste (Max 255 words)">
                                @error('keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="doi">DOI</label>
                                <input type="text" class="form-control @error('doi') is-invalid @enderror" id="doi"
                                    name="doi" required value="{{ old('doi') }}"
                                    placeholder="eg. 10.1016/j.cscm.2024.e02863 or NA">
                                @error('doi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="url">URL</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url"
                                    name="url" required value="{{ old('url') }}"
                                    placeholder="eg. https://doi.org/10.1016/j.cscm.2024.e02863 or NA">
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="abstract">Abstract</label>
                                <textarea class="form-control @error('abstract') is-invalid @enderror" id="abstract" name="abstract" rows="8"
                                    required placeholder="eg. In light of the growing global issue of construction waste management, disposal, and environmental impact, this study uniquely focuses on investigating the viability of recycled brick waste powder (RBWP) as a replacement for conventional industrial wastes like...">{{ old('abstract') }}</textarea>
                                @error('abstract')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="file">Publication PDF File</label>
                                <p class="text-center text-sm font-weight-light font-italic">You may upload the PDF file later</p>
                                <input type="file" class="form-control @error('file') is-invalid @enderror"
                                    id="file" name="file">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" style="width: 80%" class="btn btn-view">Submit</button>
                        </form>
                        <a class="btn btn-secondary" style="width: 70%" href="{{ route('home') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
