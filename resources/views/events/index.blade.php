@extends('layouts.user_type.auth')

@section('content')
    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'lecturer')
    <div class="row">
        <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-lg-3">
                <a href="{{ route('events.create') }}" class="btn btn-view">Create Events</a>
            </div>
        </div>
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
                                        Organizer
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if ($datas->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">No events added. Please create event.</td>
                                    </tr>
                                @else
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>
                                                <p style="white-space: normal;" class="text-sm font-weight-bold">
                                                    {{ $data->title ? $data->title : 'Event Title' }}</p>
                                            </td>
                                            <td class="text-sm text-center">
                                                {{ $data->organizer ? $data->organizer : 'Organized By' }}
                                            </td>
                                            <td>
                                                <p class="text-center text-sm font-weight-bold mb-0">
                                                    {{ $data->date ? $data->date : 'Event Date' }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('events.show', ['id' => $data->id]) }}"
                                                    class="btn btn-view">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('events.edit', ['id' => $data->id]) }}"
                                                    class="btn btn-edit"><i class="fa fa-pen"></i></a>
                                                <a href="{{ route('events.destroy', ['id' => $data->id]) }}"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Confirm to delete this publication?')"><i
                                                        class="fa fa-trash"></i></a>

                                                <a class="text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                                        href="{{ route('events.viewRegistrations', ['id' => $data->id]) }}">
                                                        See Registration
                                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                                    </a>
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
    @endif

    @if (Auth::user()->role == 'student')

    <div class="row">
        <div class="col-lg-9">
            <h3>Events</h3>
            <p>Explore our upcoming events and register to participate.</p>
        </div>
    </div>
    @if ($datas->isEmpty())
        <div class="row mt-4">
            <h6>Currently no upcoming events...</h6>
        </div>
    @else
        @php $count = 0; @endphp
        @foreach ($datas as $data)
            @if ($count % 3 == 0)
                <div class="row mt-4">
            @endif
            <div class="col-lg-4 mb-2">
                <div class="card h-100 p-3">
                    <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                            <h5 class="font-weight-bolder mb-4 pt-2">
                                {{ $data->title ? $data->title : 'Event Title' }}
                            </h5>
                            <p class="text-sm">{{ $data->date ? $data->date : 'Event Date' }}</p>
                            <p class="text-sm">{{ $data->organizer ? $data->organizer : 'Organizer Name' }}</p>
                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $data->description ? $data->description : 'Event Description' }}</p>
                            <a class="text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                href="{{ route('events.view', ['id' => $data->id]) }}">
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
       
    @endif
@endsection
