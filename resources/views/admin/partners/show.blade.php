@extends('layouts.app')

@section('content')
    <h3 class="page-title">Profile</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Name</th>
                            <td>{{ $speaker->name }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $speaker->title }}</td>
                        </tr>
                        <tr>
                            <th>Profile</th>
                            <td>{!! $speaker->bio !!}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="{{ asset('uploads/speakers') }}/{{ $speaker->image }}" width="150" alt=""></td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
            <a href="{{ route('admin.speakers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop