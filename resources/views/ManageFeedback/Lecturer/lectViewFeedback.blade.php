@extends('layouts.user_type.auth')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
@if ($data->status == 'Pending')
<form action="{{ route('lecturer.updateStatus', ['id' => $data->id]) }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <h4><b>Reason Of Approval/Rejection:</b></h4>
                <textarea name="reason" class="form-control" placeholder="Enter reason here..." required></textarea>
                <div class="form-group mt-3">
                    <label for="status">Select Status:</label>
                    <select name="status" class="form-control" required>
                        <option value="Approved">Approve</option>
                        <option value="Rejected">Reject</option>
                    </select>
                </div>
            </div>
        </div>
        <center>
            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
        </center>
    </form>
@else
    <div class="card">
        <div class="card-body">
            <h4><b>Reason Of Approval/Rejection:</b></h4>
            {{$data->answer}}
        </div>
    </div>
    <center>
        <a type="button" class="btn btn-primary waves-effect waves-light" href='{{ url("/Lecturer/feedback") }}'>Back</a>
    </center>
@endif

@endsection