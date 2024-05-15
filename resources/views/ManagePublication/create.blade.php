@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <div class="row mt-2">
            @if (session()->has('success')|| session()->has('error'))
                <div id="alert">
                    @include('ManagePublication.alert')
                </div>
            @endif
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">Upload Publication</h3>
                    <div class="text-center">
                        <form style="width: 800px; margin:auto" action={{ route('publications.store') }} class="form"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required
                                    value="{{ old('title') }}"
                                    placeholder="eg. Building A Sustainable Future: An Experimental Study on...">
                            </div>
                            <div class="form-group mb-3">
                                <label for="author">Author(s)</label>
                                <input type="text" class="form-control" id="author" name="author" required
                                    value="{{ old('author') }}" placeholder="Junaid Kameran Ahmed, Nihat Atmaca">
                            </div>
                            <div class="form-group mb-3">
                                <label for="type">Publication Type</label>
                                <select class="form-select" name="type" id="type">
                                    <option disabled selected value="default">Select Publication Type (eg. Article)</option>
                                    <option {{ old('type') == 'article' ? selected : '' }} value="article">Article</option>
                                    <option {{ old('type') == 'book' ? selected : '' }} value="book">Book</option>
                                    <option {{ old('type') == 'conference' ? selected : '' }} value="conference">Conference
                                    </option>
                                    <option {{ old('type') == 'journal' ? selected : '' }} value="journal">Journal</option>
                                    <option {{ old('type') == 'patent' ? selected : '' }} value="patent">Patent</option>
                                    <option {{ old('type') == 'thesis' ? selected : '' }} value="thesis">Thesis</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="date">Publication Date</label>
                                <input type="date" class="form-control" id="date" name="date" required
                                    value="{{ old('date') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="keywords">Keywords</label>
                                <input type="text" class="form-control" id="keywords" name="keywords" required value="{{ old('keywords') }}"
                                    placeholder="eg. Engineered geopolymer composites, Recycled brick waste powder, Construction waste">
                            </div>
                            <div class="form-group mb-3">
                                <label for="doi">DOI</label>
                                <input type="text" class="form-control" id="doi" name="doi" required value="{{ old('doi') }}"
                                    placeholder="eg. 10.1016/j.cscm.2024.e02863 or NA">
                            </div>
                            <div class="form-group mb-3">
                                <label for="url">URL</label>
                                <input type="text" class="form-control" id="url" name="url" required value="{{ old('url') }}"
                                    placeholder="eg. https://doi.org/10.1016/j.cscm.2024.e02863 or NA">
                            </div>
                            <div class="form-group mb-3">
                                <label for="abstract">Abstract</label>
                                <textarea class="form-control" id="abstract" name="abstract" rows="8" required value="{{ old('abstract') }}"
                                    placeholder="eg. In light of the growing global issue of construction waste management, disposal, and environmental impact, this study uniquely focuses on investigating the viability of recycled brick waste powder (RBWP) as a replacement for conventional industrial wastes like..."></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="file">Publication File</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <button type="submit" style="width: 700px" class="btn btn-view">Submit</button>
                        </form>
                        <a class="btn btn-secondary" style="width: 700px" href="{{ route('home') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
