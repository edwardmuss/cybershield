@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Speakers')</h3>
    @can('event_create')
    <p>
        <a href="{{ route('admin.speakers.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($speakers) > 0 ? 'datatable' : '' }} @can('event_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('event_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>Image</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Role</th>
                        <th>Bio</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($speakers) > 0)
                        @foreach ($speakers as $speaker)
                            <tr data-entry-id="{{ $speaker->id }}">
                                @can('event_delete')
                                    <td></td>
                                @endcan

                                <td><img src="{{ asset('uploads/speakers') }}/{{ $speaker->image }}" alt="speaker-photo" width="80"></td>
                                <td>{{ $speaker->name }}</td>
                                <td>{{ $speaker->title }}</td>
                                <td>{{ $speaker->role }}</td>
                                <td>{!! substr($speaker->bio, 0,100) !!}</td>
                                <td>
                                    @can('event_view')
                                    <a href="{{ route('admin.speakers.show',[$speaker->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('event_edit')
                                    <a href="{{ route('admin.speakers.edit',[$speaker->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('event_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.speakers.destroy', $speaker->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

{{-- @section('javascript') 
    <script>
        @can('event_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.events.mass_destroy') }}';
        @endcan

    </script>
@endsection --}}