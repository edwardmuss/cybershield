@extends('layouts.app')
@section( 'title', "Events" )

@section('content')
    <h3 class="page-title">@lang('quickadmin.events.title')</h3>
    {!! Form::open(['method' => 'POST', 'files' =>true,'enctype'=>'multipart/form-data', 'route' => ['admin.events.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('start_time', 'Start time*', ['class' => 'control-label']) !!}
                    {!! Form::text('start_time', old('start_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('start_time'))
                        <p class="help-block">
                            {{ $errors->first('start_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('end_time', 'End time*', ['class' => 'control-label']) !!}
                    {!! Form::text('end_time', old('end_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('end_time'))
                        <p class="help-block">
                            {{ $errors->first('end_time') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('venue', 'Venue*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('venue', old('venue'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('venue'))
                        <p class="help-block">
                            {{ $errors->first('venue') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mode', 'Mode*', ['class' => 'control-label']) !!}
                    {!! Form::text('mode', old('mode'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mode'))
                        <p class="help-block">
                            {{ $errors->first('mode') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('host', 'Host*', ['class' => 'control-label']) !!}
                    {!! Form::text('host', old('host'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('host'))
                        <p class="help-block">
                            {{ $errors->first('host') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('theme', 'Theme*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('theme', old('theme'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('theme'))
                        <p class="help-block">
                            {{ $errors->first('theme') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('day1_prog', 'Day 1 Program*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('day1_prog', old('day1_prog'), ['class' => 'form-control editor', 'placeholder' => '',]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('day1_prog'))
                        <p class="help-block">
                            {{ $errors->first('day1_prog') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('day2_prog', 'Day 2 Program*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('day2_prog', old('day2_prog'), ['class' => 'form-control editor', 'placeholder' => '',]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('day2_prog'))
                        <p class="help-block">
                            {{ $errors->first('day2_prog') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('day3_prog', 'Day 3 Program*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('day3_prog', old('day3_prog'), ['class' => 'form-control editor', 'placeholder' => '',]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('day3_prog'))
                        <p class="help-block">
                            {{ $errors->first('day3_prog') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('day4_prog', 'Day 4 Program*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('day4_prog', old('day4_prog'), ['class' => 'form-control editor', 'placeholder' => '',]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('day4_prog'))
                        <p class="help-block">
                            {{ $errors->first('day4_prog') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slider_top_text', 'slider_top_text*', ['class' => 'control-label']) !!}
                    {!! Form::text('slider_top_text', old('slider_top_text'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slider_top_text'))
                        <p class="help-block">
                            {{ $errors->first('slider_top_text') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slider_middle_text', 'slider_middle_text*', ['class' => 'control-label']) !!}
                    {!! Form::text('slider_middle_text', old('slider_middle_text'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slider_middle_text'))
                        <p class="help-block">
                            {{ $errors->first('slider_middle_text') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slider_bottom_text', 'slider_bottom_text*', ['class' => 'control-label']) !!}
                    {!! Form::text('slider_bottom_text', old('slider_bottom_text'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slider_bottom_text'))
                        <p class="help-block">
                            {{ $errors->first('slider_bottom_text') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('partner_ids', 'Partners', ['class' => 'control-label']) !!}
                    {!! Form::select('partner_ids[]', $partners, old('partner_ids'), ['class' => 'form-control select2', 'required' => '', 'multiple'=>'']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('partner_ids'))
                        <p class="help-block">
                            {{ $errors->first('partner_ids') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('organizer_ids', 'Organizers', ['class' => 'control-label']) !!}
                    {!! Form::select('organizer_ids[]', $speakers, old('organizer_ids'), ['class' => 'form-control select2', 'required' => '', 'multiple'=>'']) !!}
                    @if($errors->has('organizer_ids'))
                        <p class="help-block">
                            {{ $errors->first('organizer_ids') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('speaker_ids', 'Speakers', ['class' => 'control-label']) !!}
                    {!! Form::select('speaker_ids[]', $speakers, old('speaker_ids'), ['class' => 'form-control select2', 'required' => '', 'multiple'=>'']) !!}
                    @if($errors->has('speaker_ids'))
                        <p class="help-block">
                            {{ $errors->first('speaker_ids') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('conference_video', 'Youtube Video ID', ['class' => 'control-label']) !!}
                    {!! Form::text('conference_video', old('conference_video'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('conference_video'))
                        <p class="help-block">
                            {{ $errors->first('conference_video') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('abstract_link', 'Abstract Submision Link', ['class' => 'control-label']) !!}
                    {!! Form::text('abstract_link', old('abstract_link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('abstract_link'))
                        <p class="help-block">
                            {{ $errors->first('abstract_link') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('registration_link', 'Registration Link', ['class' => 'control-label']) !!}
                    {!! Form::text('registration_link', old('registration_link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('registration_link'))
                        <p class="help-block">
                            {{ $errors->first('registration_link') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('guideline_for_authors', 'Guideline For Authors', ['class' => 'control-label']) !!}
                    {!! Form::textarea('guideline_for_authors', old('guideline_for_authors'), ['class' => 'form-control editor', 'placeholder' => '',]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('guideline_for_authors'))
                        <p class="help-block">
                            {{ $errors->first('guideline_for_authors') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('important_dates', 'Important Dates', ['class' => 'control-label']) !!}
                    {!! Form::textarea('important_dates', old('important_dates'), ['class' => 'form-control editor', 'placeholder' => '',]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('important_dates'))
                        <p class="help-block">
                            {{ $errors->first('important_dates') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('map', 'Google Map Iframe', ['class' => 'control-label']) !!}
                    {!! Form::textarea('map', old('map'), ['class' => 'form-control editor2', 'placeholder' => '',]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('map'))
                        <p class="help-block">
                            {{ $errors->first('map') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cfp_file', 'Call for Abstract PDF', ['class' => 'control-label']) !!}
                    {!! Form::file('cfp_file', old('cfp_file'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cfp_file'))
                        <p class="help-block">
                            {{ $errors->first('cfp_file') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('image', 'Image*', ['class' => 'control-label']) !!}
                    {!! Form::file('image', old('image'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>

@stop