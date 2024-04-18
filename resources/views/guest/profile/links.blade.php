@extends('layouts.guest')
@section( 'title', 'Meeting Links | '. Auth::user()->title .' '. Auth::user()->first_name .' '. Auth::user()->middle_name . ' '. Auth::user()->last_name )
@section( 'description', 'User Profiles')
@section( 'image', "https://conferences.daystar.ac.ke/uploads/events/1688721335_1685034915_ica-con.jpg" )

@section('content')
    @include('partials.guest.event-header')
    @include('guest.profile.scripts')
        <div class="container" style="">
            <div class="row profile">
                <div class="col-md-3">
                    <!-- PROFILE SIDEBAR -->
                    @include('includes.profile-sidebar')
                    <!-- END PROFILE SIDEBAR -->
                </div>
                <div class="col-md-9">
                    <div class="profile-content">
                        <div class="card">
                            <div class="card-header">
                                <h3>Hi {{ Auth::user()->title .' '. Auth::user()->first_name .' '. Auth::user()->middle_name . ' '. Auth::user()->last_name }}</h3>
                            </div>
                            <div class="card-body">
                                <p class="">Meeting Links</p>
                                <br>
                                <table class="table lgx-table2 table-stripped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Conference</th>
                                        <th>Date</th>
                                        <th>Event Link</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($upcoming_events as $index => $data)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ date('d M, Y', strtotime($data->start_time)) }}</td>
                                            <td> <a href="{{ $data->meeting_link }}" target="_blank">{{ $data->meeting_link }}</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $upcoming_events->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
