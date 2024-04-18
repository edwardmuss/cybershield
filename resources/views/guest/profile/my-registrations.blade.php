@extends('layouts.guest')
@section( 'title', 'My Registration | '. Auth::user()->title .' '. Auth::user()->first_name .' '. Auth::user()->middle_name . ' '. Auth::user()->last_name )
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
                                <p class="">Here is the conferences you have registered</p>
                                <br>
                                <table class="table lgx-table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Conference</th>
                                        <th>Event Date</th>
                                        <th>Created</th>
                                        <th>Remarks</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($my_registrations as $index => $data)
                                        <tr>
                                            <th scope="row">{{ $index+1 }}</th>
                                            <td>{{ $data->event->title }}</td>
                                            <td>{{ date('d M, Y', strtotime($data->event->start_time)) }}</td>
                                            <td>{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                            <td>{{ $data->remarks }}</td>
                                            <td>{{ $data->status }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                   
                                <p class="text-center">
                                     {{ $my_registrations ->links() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
