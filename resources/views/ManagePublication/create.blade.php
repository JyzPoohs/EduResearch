@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-4">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="card-title">Upload Publication</h3>
                <div class="text-center">
                    <form style="width: 800px; margin:auto" action="" class="form">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required
                                placeholder="eg. Building A Sustainable Future: An Experimental Study on...">
                        </div>
                        <div class="form-group mb-3">
                            <label for="author">Author(s)</label>
                            <input type="text" class="form-control" id="author" name="author" required
                                placeholder="Junaid Kameran Ahmed, Nihat Atmaca">
                        </div>
                        <div class="form-group mb-3">
                            <label for="type">Publication Type</label>
                            <select class="form-select" name="type" id="type">
                                <option disabled selected value="default">Select Publication Type (eg. Article)</option>
                                <option value="article">Article</option>
                                <option value="book">Book</option>
                                <option value="conference">Conference</option>
                                <option value="journal">Journal</option>
                                <option value="workshop">Workshop</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="date">Publication Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keywords">Keywords</label>
                            <input type="text" class="form-control" id="keywords" name="keywords" required
                                placeholder="eg. Engineered geopolymer composites, Recycled brick waste powder, Construction waste">
                        </div>
                        <div class="form-group mb-3">
                            <label for="doi">DOI</label>
                            <input type="text" class="form-control" id="doi" name="doi" required
                                placeholder="eg. 10.1016/j.cscm.2024.e02863 or NA">
                        </div>
                        <div class="form-group mb-3">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" required
                                placeholder="eg. https://doi.org/10.1016/j.cscm.2024.e02863 or NA">
                        </div>
                        <div class="form-group mb-3">
                            <label for="abstract">Abstract</label>
                            <textarea class="form-control" id="abstract" name="abstract" rows="8" required
                                placeholder="eg. In light of the growing global issue of construction waste management, disposal, and environmental impact, this study uniquely focuses on investigating the viability of recycled brick waste powder (RBWP) as a replacement for conventional industrial wastes like..."></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="file">Publication File</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                        <button type="submit" style="width: 700px" class="btn btn-view">Submit</button>
                    </form>
                    <a class="btn btn-secondary" style="width: 700px" href="{{ route('home') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
