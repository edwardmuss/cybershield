@extends('layouts.guest')
@section( 'title', "$event->title" )
@section( 'description', strip_tags($event->description))
@section( 'image', "https://conferences.daystar.ac.ke/uploads/events/$event->image" )


<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@section('content')
    @include('partials.guest.event-header')
    <style>
        .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 12px 12px;
            height: 50px;
        }
       
        body {
        background: #F1F3FA;
        }

        /* Profile container */
        .profile {
        margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
        }

        .profile-userpic img {
        float: none;
        margin: 0 auto;
        /* width: 50%; */
        /* height: 50%; */
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
        }

        .profile-usertitle {
        text-align: center;
        margin-top: 20px;
        }

        .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
        }

        .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
        }

        .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
        }

        .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
        margin-right: 0px;
        }
            
        .profile-usermenu {
        margin-top: 30px;
        }

        .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
        border-bottom: none;
        }

        .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
        }

        .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
        border-bottom: none;
        }

        .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 80vh;
        }

        .form-control {
            border: solid 1px #555;
        }
    </style>

        <!-- countdown -->
        <section>
            <div id="lgx-countdowns" class="lgx-countdowns lgx-countdowns4" style="background-image: url({{ asset('uploads/events') }}/{{ $event->image }}), linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)); background-blend-mode: overlay;"> <!--lgx-countdowns3 lgx-countdowns4-->
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="lgx-heading text-center">
                                    <h2 class="heading" style="color: #02aeee">Register for</h2>
                                    <h2 class="subheading" style="color: #fff">{{$event->title .' | '. date('d', strtotime($event->start_time)) . '-' . date('d F, Y', strtotime($event->end_time))}}</h2>
                                </div>
                                <div class="circular-countdown-area lgx-countdown-simple text-center">
                                    <div id="lgx-countdown" data-date="{{ $event->start_time }}" data-tc-id="e74ce21a-8619-065b-4047-0b3282a50bac"><div class="time_circles"><canvas width="1140" height="285"></canvas><div class="textDiv_Days" style="top: 100px; left: 0px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Days</h4><span style="font-size: 60px; line-height: 20px;">845</span></div><div class="textDiv_Hours" style="top: 100px; left: 285px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Hours</h4><span style="font-size: 60px; line-height: 20px;">10</span></div><div class="textDiv_Minutes" style="top: 100px; left: 570px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Minutes</h4><span style="font-size: 60px; line-height: 20px;">31</span></div><div class="textDiv_Seconds" style="top: 100px; left: 855px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Seconds</h4><span style="font-size: 60px; line-height: 20px;">29</span></div></div></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
        </section>
        <!-- countdown END -->
    
    <!--ABOUT-->
    <section>
        <div id="lgx-registration" class="lgx-travelinfo">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" style="background-color: #f1f1f1; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <div class="lgx-about-content-area lgx-about-content-area-center2" style="padding-top: 50px">
                                <div class="lgx-heading text-center">
                                    <h2 class="heading">Registration</h2>
                                    <h3 class="subheading pb-5">Please fill in your details to register for this event</h3>
                                    <a class="lgx-btn lgx-btn-red lgx-scroll" href="#lgx-payment"><span>Payment Details</span></a>
                                    <a class="lgx-btn lgx-btn-white lgx-scroll" href="{{ route('account.profile') }}"><span>My Dashboard</span></a>
                                </div>
                                <form class="px-5"  method="POST" action="{{ route('account.eventregistration.store') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
                                        @include('includes.flash_message')
                                            <input type="hidden" name="event_id" value="{{$event->id}}">
                                          <div class="form-group col-md-4">
                                            <label for="">Full Name</label>
                                            <input type="text" class="form-control" readonly placeholder="Frst Name" value="{{ Auth::user()->title .' '. Auth::user()->first_name .' '. Auth::user()->middle_name . ' '. Auth::user()->last_name }}">
                                          </div>
                                          <div class="form-group col-md-4">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" id="email" readonly placeholder="Email" value="{{ Auth::user()->email }}">
                                          </div>
                                          @php $genders = ['Male','Female'] @endphp
                                          <div class="form-group col-md-4">
                                            <label for="gender">Gender</label>
                                            <select id="gender" name="gender" class="form-control" required>
                                              @foreach($genders as $gender)
                                                  <option @selected($gender == Auth::user()->gender) value="{{ $gender  }}">{{ $gender  }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                          
                                        <div class="form-group col-md-6">
                                          <label for="institution">Institution/Organisation</label>
                                          <input type="text" class="form-control" id="institution" name="institution" placeholder="e.g Havard University" value="{{ Auth::user()->institution }}" required>
                                        </div>
        
                                        <div class="form-group col-md-6">
                                          <label for="designation">Designation</label>
                                          <input type="text" class="form-control" id="designation" name="designation" placeholder="e.g HoD" value="{{ Auth::user()->designation }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="country2">Country</label>
                                          <select name="country" id="country2" class="select2 form-control" required>
                                            @foreach($countries as $country)
                                                <option @selected($country->name == Auth::user()->country) value="{{ $country->name . ',' . $country->phonecode }}">{{ $country->name . ' (+' . $country->phonecode . ')' }}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Phone</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="phonecode"></span>
                                                <input type="tel" id="phone1" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required>
                                            </div>
                                            <input type="hidden" name="code" id="code">
                                            <input type="hidden" name="country" id="country">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ticket_id">Ticket</label>
                                            <select id="ticket_id" name="ticket_id" class="form-control" required>
                                              <option selected>Choose...</option>
                                              @foreach($tickets as $index => $ticket)
                                                <option @if($my_registrations_count > 0 && $my_registrations->ticket_id == $ticket->id) selected @endif value="{{ $ticket->id }}">{{ $ticket->title }} ({{ $ticket->currency == 1 ? "USD " : "KES "}} {{$ticket->price}})</option>
                                              @endforeach
                                            </select>
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label for="">Payment Reference</label>
                                            <input type="text" class="form-control" id="reference" name="reference" placeholder="e.g MPESA CODE" value="{{ $my_registrations_count > 0 ? $my_registrations->reference : '' }}">
                                          </div>
                                        <div class="form-group col-md-12">
                                            @if($my_registrations_count ==0)
                                                <button type="submit" class="btn btn-primary btn-block lgx-btn">Register</button>
                                            @else
                                            <div class="alert alert-danger">You have already registered for this event</div>
                                            @endif
                                        </div>
                                      </form>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT END-->

    <!--PAYMENT-->
    <section>
        <div id="lgx-payment" class="lgx-about">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="lgx-about-content-area">
                                <div class="lgx-heading">
                                    <h2 class="heading">PAYMENT DETAILS</h2>
                                    <h3 class="subheading">Please use the following payment methods</h3>
                                </div>
                                <div class="lgx-about-content">
                                    <p class="text">
                                        {!! ($event->payment_details) !!}
                                    </p>
                                    <div class="about-date-area">
                                        <h4 class="date"><span>{{ date('d', strtotime($event->start_time)) }}</span></h4>
                                        <p><span>-{{ date('d F, Y', strtotime($event->end_time)) }}</span> at {{ $event->venue }}</p>
                                    </div>

                                    <div class="section-btn-area">
                                        <a class="lgx-btn" href="{{ route('events.show', $event->slug) }}"><span>More About</span></a>
                                        <a class="lgx-btn lgx-btn-red lgx-scroll" href="#lgx-registration"><span>Register</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="lgx-about-img-sp">
                                <img src="{{ asset('frontend/assets/img/event-registration.jpg') }}" alt="about">
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--PAYMENT END-->
    
        <!--TRAVEL INFO-->
        <section>
            <div id="lgx-travelinfo" class="lgx-travelinfo">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading">
                                    <h2 class="heading">Event Information</h2>
                                    <h3 class="subheading">Event important information.</h3>
                                </div>
                            </div>
                            <!--//main COL-->
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-travelinfo-content">
                                    <div class="lgx-travelinfo-single">
                                        <img src="{{ asset('frontend/assets/img/info-icon1.png') }}" alt="location"/>
                                        <h3 class="title">Venue</h3>
                                        <p class="info">{{ $event->venue }}</p>
                                    </div>
                                    <div class="lgx-travelinfo-single">
                                        <img src="{{ asset('frontend/assets/img/info-icon2.png') }}" alt="Transport"/>
                                        <h3 class="title">Date</h3>
                                        <p class="info">{{ date('F jS, Y h:i a', strtotime($event->start_time)) }}</p>
                                    </div>
                                    <div class="lgx-travelinfo-single">
                                        <img src="{{ asset('frontend/assets/img/info-icon3.png') }}" alt="Hotel & Restaurant"/>
                                        <h3 class="title">Event Hosts</h3>
                                        <p class="info">{{ $event->host }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                    </div>
                    <!-- //.CONTAINER -->
                </div>
            </div>
        </section>
        <!--TRAVEL INFO END-->
    
    
    
        <!--GOOGLE MAP-->
        <div class="innerpage-section">
            {!! $event->map !!}
        </div>
        <!--GOOGLE MAP END-->
        
        <script>

            $('.select2').select2();
           
            $('#country2').on('change', function()
            {
                var countryCode = this.value;
                var phone = $('#phone1').val();
                var country = countryCode.split(',')[0];
                var phonecode = '+' + countryCode.split(',')[1];
                $('#phonecode').html(phonecode);
                $('#phone').val(phonecode + phone);
                $('#code').val(phonecode);
                $('#country').val(country);
                
            });
            window.onload = function() {
                var countryCode = $('#country2').val();
                var phone = $('#phone1').val();
                var country = countryCode.split(',')[0];
                var phonecode = '+' + countryCode.split(',')[1];
                $('#phonecode').html(phonecode);
                $('#code').val(phonecode);
                $('#country').val(country);
            };
        </script>

@endsection
