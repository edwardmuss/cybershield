@extends('layouts.app')

@section('content')
    <h3 class="page-title">{{$registration->user->title .' '. $registration->user->first_name . ' ' . $registration->user->last_name }} Registration Details</h3>
    
    {!! Form::model($registration, ['method' => 'PUT', 'route' => ['admin.registrations.update', $registration->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Event', 'Event*', ['class' => 'control-label']) !!}
                    {!! Form::text('', $registration->event->title, ['class' => 'form-control', 'placeholder' => '', 'readonly'=>'true']) !!}

                    {!! Form::label('Payment Reference', 'Payment Reference*', ['class' => 'control-label']) !!}
                    {!! Form::text('reference', $registration->reference, ['class' => 'form-control', 'placeholder' => '']) !!}

                    {!! Form::label('Ticket', 'Ticket*', ['class' => 'control-label']) !!}
                    <select id="ticket_id" name="ticket_id" class="form-control" required>
                        <option selected>Choose...</option>
                        @foreach($tickets as $index => $ticket)
                          <option @if($registration->ticket_id == $ticket->id) selected @endif value="{{ $ticket->id }}">{{ $ticket->title }} ({{ $ticket->currency == 1 ? "USD " : "KES "}} {{$ticket->price}})</option>
                        @endforeach
                    </select>
                    {!! Form::label('Status', 'Status*', ['class' => 'control-label']) !!}
                    <select id="status" name="status" class="form-control" required>
                        @php $statuses = ['Pending', 'Confirmed', 'Rejected'] @endphp
                        <option selected>Choose...</option>
                        @foreach($statuses as $index => $status)
                          <option @selected($status == $registration->status ) >{{ $status }}</option>
                        @endforeach
                    </select>
                    {!! Form::label('Remarks', 'Remarks*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('remarks', $registration->remarks, ['class' => 'form-control', 'placeholder' => 'Remarks/comments']) !!}
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

