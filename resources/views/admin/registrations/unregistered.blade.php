@extends('layouts.app')

@section('content')
    <h3 class="page-title">Un-Registered</h3>
    {{-- @can('registration_create')
    <p>
        <a href="{{ route('admin.registrations.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan --}}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($unregistered) > 0 ? 'datatable' : '' }} @can('registration_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('registration_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>Event</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Institution</th>
                        {{-- <th>&nbsp;</th> --}}
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($unregistered) > 0)
                        @foreach ($unregistered as $data)
                            <tr data-entry-id="{{ $data->id }}">
                                @can('registration_delete')
                                    <td></td>
                                @endcan
                                <td>{{ $event->title }}</td>
                                <td>{{ $data->title .' '. $data->first_name . ' ' . $data->middle_name . ' ' . $data->last_name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->code . $data->phone }}</td>
                                <td>{{ $data->institution }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('registration_delete')
            // window.route_mass_crud_entries_destroy = '{{ route('admin.registrations.mass_destroy') }}';
        @endcan

    </script>
@endsection