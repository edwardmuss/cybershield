@extends('layouts.app')
@section( 'title', "Communication" )

@section('content')
    <style>.help-block {color: red;}</style>
    <h3 class="page-title">Send Email</h3>
   
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <form class="sendmail" name="sendmail" id="sendmail" role="form" method="POST" action="{{ route('admin.registrations.communication.sendmail',[$event->id]) }}">
                {{ csrf_field() }}
                <div class="alerts">
                    @include('includes.flash_message')
                </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="">Mailing List*</label>
                    <select id="list" name="list" class="select form-control" placeholder="Mail List" required>
                        <option value="">Select List</option>
                        <option value="registered">Registered</option>
                        <option value="unregistered">Un Registered</option>
                        <option value="pending">Pending Status</option>
                        <option value="rejected">Rejected Status</option>
                        <option value="confirmed">Confirmed Status</option>
                        <option value="admin">Admin</option>
                        <option value="all">All Users</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('subject', 'Subject*', ['class' => 'control-label']) !!}
                    {!! Form::text('subject', old('subject'), ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('subject'))
                        <p class="help-block">
                            {{ $errors->first('subject') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('link', 'Link*', ['class' => 'control-label']) !!}
                    {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('link'))
                        <p class="help-block">
                            {{ $errors->first('link') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('link_text', 'Link Text*', ['class' => 'control-label']) !!}
                    {!! Form::text('link_text', old('link_text'), ['class' => 'form-control', 'placeholder' => '', 'required' => 'true']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('link_text'))
                        <p class="help-block">
                            {{ $errors->first('link_text') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mailbody', 'Mail Body*', ['class' => 'control-label']) !!}
                    <textarea name="mailbody" id="mailbody" class="form-control editor" required placeholder="<p>Dear <strong>%TITLE% %NAME%</strong>, Thank you for registering for...</p>">Dear %TITLE% %NAME%, Thank you for registering for...</textarea>
                    {{-- {!! Form::textarea('mailbody', old('mailbody'), ['class' => 'form-control editor', 'required' => 'true', 'placeholder' => 'Dear %TITLE% %NAME%, Thank you for registering for...']) !!} --}}
                    <p class="help-block"></p>
                    @if($errors->has('mailbody'))
                        <p class="help-block">
                            {{ $errors->first('mailbody') }}
                        </p>
                    @endif
                    <p class="help-block" id="mb_err"></p>
                    <p class="text-primary">Use %TITLE%, %NAME%</p>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Send Email">
            </form>
        </div>
    </div>
    
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
    <script type="text/javascript">

        $('#sendmail').submit(function() 
        {
            if (jQuery("#cke_1_contents iframe").contents().find("body").text() === "") {
                $('#mb_err').html('Please enter your message.');
            return false;
            }
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