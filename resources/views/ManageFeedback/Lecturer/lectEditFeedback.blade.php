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
    <form method='post' action='{{ url("/Student/updateFeedback") }}'>
        @csrf
        <div class='modal-body'>
            <div class='col-md-12'>
                <label for='inputEmail4' class='form-label'><b>Fill In Your Feedback!</b></label>
                <textarea type='text' row='4' class='form-control' name='feedback' value='{{$data->explain}}' required readonly >{{$data->explain}}</textarea>
            </div>
            @if ($data->status!='Pending')
                <br>
                <div class='col-md-12'>
                    <label for='inputEmail4' class='form-label'><b>Reason Of Approval/Rejection :</b></label>
                    <textarea type='text' row='4' class='form-control' name='answer' value='{{$data->answer}}' required>{{$data->answer}}</textarea>
                </div>
            @endif
        </div>
        <br>
        <br>
            <input type='hidden' value='{{$data->id}}' name='id'/>
            <!-- <button type='button' class='btn btn-light' data-bs-dismiss='modal'>Tutu</button> -->
            <center>
                <button class='btn btn-primary ' type='submit'>Update</button>
                <a type="button" class="btn btn-primary waves-effect waves-light" href='{{ url("/Lecturer/feedback") }}'>Back</a>

            </center>
    </form>

    <br>


@endsection