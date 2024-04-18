@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('Partners')</h3>
    @can('event_create')
    <p>
        <a href="{{ route('admin.partners.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($partners) > 0 ? 'datatable' : '' }} @can('event_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('event_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>Image</th>
                        <th>Name</th>
                        <th>Website</th>
                        <th>Type</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($partners) > 0)
                        @foreach ($partners as $partner)
                            <tr data-entry-id="{{ $partner->id }}">
                                @can('event_delete')
                                    <td></td>
                                @endcan

                                <td><img src="{{ asset('uploads/partners') }}/{{ $partner->image }}" alt="speaker-photo" width="80"></td>
                                <td>{{ $partner->name }}</td>
                                <td>{{ $partner->website }}</td>
                                <td>{{ $partner->type }}</td>
                                <td>
                                    @can('event_view')
                                    <a href="{{ route('admin.partners.show',[$partner->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('event_edit')
                                    <a href="{{ route('admin.partners.edit',[$partner->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('event_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.partners.destroy', $partner->id])) !!}
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