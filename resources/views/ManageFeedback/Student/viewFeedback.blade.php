@extends('layouts.user_type.auth')
@section('content')

<table class="table table-striped align-middle table-nowrap mb-0">
        <thead class="table-info">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">I/C Number</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $modal = 1;
            @endphp
                <tr>
                    <th scope='row'>{{$modal++}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->noKp}}</td>
                    <td style="color:{{$data->status=='Pending' ? 'orange' : ($data->status=='Approved' ? 'green' : 'red')}}"
                        >{{$data->status}}</td>

                </tr>

        </tbody>
    </table>
    <br>
    <div class="card">
        <div class="card-body">
            <h4><b>Feedback:</b></h4>
            {{$data->explain}}
        </div>
    </div>
    @if ($data->answer!=null)
    <div class="card">
        <div class="card-body">
            <h4><b>Reason Of Feedback Acceptance/Rejection:</b></h4>
            {{$data->answer}}
        </div>
    </div>
    @endif
    <center>
    <!-- Base Buttons -->
    <a type="button" class="btn btn-primary waves-effect waves-light" href='{{ url("/Student/feedback") }}'>Back</a>

    </center>



@endsection