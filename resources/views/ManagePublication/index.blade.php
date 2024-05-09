@extends('layouts.user_type.auth')

@section('content')
    <div class="row mt-4">
        <table class="table table-striped">
            <thead>
                <tr class="text-center font-weight-bold">
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="white-space: normal; overflow: hidden; text-overflow: ellipsis; width: 550px">
                        Classification of Mobile-Based Oral Cancer Images Using the Vision Transformer and the Swin
                        Transformer</td>
                    <td class="text-center">1 Mar 2023</td>
                    <td class="text-center">Author name</td>
                    <td class="text-center">
                        <a href="{{ route('publications.show') }}" class="btn btn-view">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('publications.edit') }}" class="btn btn-edit"><i class="fa fa-pen"></i></a>
                        <a class="btn btn-danger" href="{{ route('publications.destroy') }}" onclick="confirm('Confirm delete this publication?')">
                            <i class="fa fa-trash-o fa-lg"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
