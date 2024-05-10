@extends('layouts.user_type.auth')

@section('content')
    <div class="row mt-1">
        @if (session()->has('success'))
            <div id="alert">
                @include('ManagePublication.alert')
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-1 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Author
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($datas->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">There is no publication available...</td>
                                    </tr>
                                @else
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>
                                                <p style="white-space: normal;" class="text-sm font-weight-bold">
                                                    {{ $data->title ? $data->title : 'Publication Title' }}</p>
                                            </td>
                                            <td class="text-sm text-center">
                                                {{ $data->author ? $data->author : 'Author(s) Name' }}
                                            </td>
                                            <td>
                                                <p class="text-center text-sm font-weight-bold mb-0">
                                                    {{ $data->date ? $data->date : 'Published Date' }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('publications.show', ['id' => $data->id]) }}"
                                                    class="btn btn-view">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('publications.edit', ['id' => $data->id]) }}"
                                                    class="btn btn-edit"><i class="fa fa-pen"></i></a>
                                                <a href="{{ route('publications.destroy', ['id' => $data->id]) }}"
                                                    class="btn btn-danger"
                                                    onclick="confirm('Confirm to delete this publication?')"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
