@extends('layouts.guest')
@section( 'title', "$event->title" )
@section( 'description', strip_tags($event->description))
@section( 'image', "https://conferences.daystar.ac.ke/uploads/events/$event->image" )


@section('content')
    @include('partials.guest.event-header')
    <style>
        @import "compass/css3";
        .subtitle_2 {
            font-family: "Poppins",sans-serif;
            font-size: 3.8rem;
            font-weight: 300;
            color: #02aeee;
            margin: 0;
            line-height: 7.2rem;
        }
        .container {
        margin-top: 20px;
        }

        #slideout {
        z-index: 999999999;
        background: #dbe2e9;
        color: #333;
        position: fixed;
        top: 0;
        right: -520px;
        width: 480px;
        height: 100%;
        -webkit-transition-duration: 0.3s;
        -moz-transition-duration: 0.3s;
        -o-transition-duration: 0.3s;
        transition-duration: 0.3s;
        }
        #slideout p {
        display: block;
        padding: 20px;
        }
        #slideout.on {
        right: 0;
        }

        #overlay{ /* we set all of the properties for our overlay */
            height:90%;
            width:90%;
            margin:0 auto;
            background: #dbe2e9;
            color: #333;
            padding:20px;
            position:fixed;
            top:5%;
            left:5%;
            right:5%;
            z-index:1000;
            display:none;
            /* CSS 3 */
            -webkit-border-radius:10px;
            -moz-border-radius:10px;
            -o-border-radius:10px;
            border-radius:10px;
        }

        #mask{ /* create are mask */
            position:fixed;
            top:0;
            left:0;
            background:rgba(0,0,0,0.6);
            z-index:500;
            width:100%;
            height:100%;
            display:none;
        }
        /* use :target to look for a link to the overlay then we find our mask */
        #overlay:target, #overlay:target + #mask{
            display:block;
            opacity:1;
        }
        .close{ /* to make a nice looking pure CSS3 close button */
            display:block;
            position:absolute;
            top:20px;
            right:20px;
            background:red;
            color:white;
            height:40px;
            width:40px;
            line-height:40px;
            font-size:35px;
            text-decoration:none;
            text-align:center;
            font-weight:bold;
            -webkit-border-radius:40px;
            -moz-border-radius:40px;
            -o-border-radius:40px;
            border-radius:40px;
        }
        #open-overlay{ /* open the overlay */
            /* padding:10px 5px;
            background:blue;
            color:white;
            text-decoration:none;
            display:inline-block;
            margin:20px;
            -webkit-border-radius:10px;
            -moz-border-radius:10px;
            -o-border-radius:10px;
            border-radius:10px; */
        }
        /* image effects */
        .bg-blurred{
        /* Add the blur effect */
        filter: blur(8px);
        -webkit-filter: blur(8px);
        }
    </style>

        <!-- countdown -->
        <section>
            <div id="lgx-countdowns" class="lgx-countdowns lgx-countdowns4 bg-blurred2" style2="background-image: url({{ asset('uploads/events') }}/{{ $event->image }}), linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)); background-blend-mode: overlay; repeat:no-repeat;"> <!--lgx-countdowns3 lgx-countdowns4-->
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="lgx-heading text-center">
                                    <h2 class="heading" style="color: #02aeee">{{ $event->title }}</h2>
                                    <h2 class="subheading" style="color: #fff">{{ $event->venue . ' | '. date('d', strtotime($event->start_time)) . '-' . date('d F, Y', strtotime($event->end_time))}}</h2>
                                    {{-- <a class="lgx-btn" href="{{ route('account.eventregistration.show', $event->slug) }}"><span>Register</span></a> --}}
                                </div>
                                <div class="circular-countdown-area">
                                    <div id="circular-countdown" data-date="{{ $event->start_time }}" data-tc-id="e74ce21a-8619-065b-4047-0b3282a50bac"><div class="time_circles"><canvas width="1140" height="285"></canvas><div class="textDiv_Days" style="top: 100px; left: 0px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Days</h4><span style="font-size: 60px; line-height: 20px;">845</span></div><div class="textDiv_Hours" style="top: 100px; left: 285px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Hours</h4><span style="font-size: 60px; line-height: 20px;">10</span></div><div class="textDiv_Minutes" style="top: 100px; left: 570px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Minutes</h4><span style="font-size: 60px; line-height: 20px;">31</span></div><div class="textDiv_Seconds" style="top: 100px; left: 855px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Seconds</h4><span style="font-size: 60px; line-height: 20px;">29</span></div></div></div>
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
        <div id="lgx-about" class="lgx-about">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="lgx-about-content-area lgx-about-content-area-center">
                                <div class="lgx-heading">
                                    <h2 class="heading">About Event</h2>
                                    <h3 class="subheading">Details about the event</h3>
                                </div>
                                <div class="lgx-about-content" id="less">
                                    <p class="text">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($event->description), 350) !!}
                                    </p>
                                </div>
                                <div class="lgx-about-content" style="display:none" id="more">
                                    <p class="text">
                                        {!! $event->description !!}
                                    </p>
                                </div>
                                <div class="section-btn-area">
                                    {{-- <button type="button" onclick="readMore()" id="read_more_btn" class="lgx-btn lgx-btn-red lgx-scroll trm">Read More</button> --}}
                                    <a href="#overlay" class="lgx-btn lgx-btn-red" id="open-overlay">Event Details</a>
                                    @if($event->cfp_file != NULL)
                                        <a href="{{ asset('uploads/abstracts') }}/{{ $event->cfp_file }}" target="_blank" class="lgx-btn lgx-btn-white text-white" style="background: orange">Download Call for Papers (PDF)</a>
                                    @endif
                                    @if($event->abstract_link != NULL)
                                        <a href="{{ $event->abstract_link }}" target="_blank" class="lgx-btn btn-danger">Submit Abstract</a>
                                    @endif
                                </div>
                                <hr>
                                <div class="lgx-about-content mt-5">
                                    <p class="text">
                                        To register for this event, please click the link below
                                    </p>
                                </div>
                                <div class="section-btn-area">
                                    @if($event->registration_link != NULL)
                                    <a href="{{ $event->registration_link }}" target="_blank" class="lgx-btn lgx-btn-red">Register</a>
                                    @else
                                        <a href="{{ route('account.eventregistration.show', $event->slug) }}" class="lgx-btn lgx-btn-red">Register Here</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT END-->
    <script>
        function readMore() {
            // var more = document.getElementById("more");
            // var less = document.getElementById("less");
            // var read_more_btn = document.getElementById("read_more_btn");

            // if (more.style.display === "none") {
            //     more.style.display = "inline";
            //     read_more_btn.innerHTML = "Collapse";
            //     less.style.display = "none";
            // } else {
            //     more.style.display = "none";
            //     read_more_btn.innerHTML = "Read More";
            //     less.style.display = "inline";
            // }

            $('#slideout').toggleClass('on');
        }

        
    </script>
    
    
         <!--VIDEO-->
         <section>
            <div id="lgx-video" class="lgx-video lgx-video2" style="background-image: url('{{ asset('frontend/assets/img/slider1.jpg') }}'); background-position: bottom">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!--<h2 class="lgx-video-title"><span>Watch Our Promo video!</span>How to make an online order</h2>-->
                                <div class="lgx-video-area">
                                    <figure>
                                        <figcaption>
                                            <div class="video-icon">
                                                <div class="lgx-vertical">
                                                    <a id="myModalLabel" class="icon" href="#" data-toggle="modal" data-target="#lgx-modal">
                                                        <i class="fa fa-play " aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <!-- Modal-->
                                    <div id="lgx-modal" class="modal fade lgx-modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($event->conference_video != NULL)
                                                        <iframe id="modalvideo" src="https://www.youtube.com/embed/{{ $event->conference_video }}" allowfullscreen></iframe>
                                                    @else
                                                        <iframe id="modalvideo" src="https://www.youtube.com/embed/om-jeuMLXQM" allowfullscreen></iframe>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- //.Modal-->
                                </div>
                            </div>
                        </div>
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
        </section>
        <!--//.VIDEO END-->
    
    <!--SCHEDULE-->
    <section>
        <div id="lgx-schedule" class="lgx-schedule12 lgx-schedule15 lgx-schedule-white">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading">
                                <h2 class="heading">Event Program</h2>
                                <h3 class="subheading">Welcome to <strong>{{ $event->title }}</strong></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if($event->day1_prog != NULL)
                        <div class="col-xs-12">
                            <div class="lgx-tab">
                                <ul class="nav nav-pills lgx-nav">
                                    <li class="active"><a data-toggle="pill" href="#home"><h3>First <span>Day</span></h3> <p>{{ date('D d M, Y', strtotime($event->start_time)) }}</p></a></li>
                                    <li><a data-toggle="pill" href="#menu1"><h3>Second <span>Day</span></h3> <p>{{ date('D d M, Y', strtotime('+1 day', strtotime($event->start_time))) }}</p></a></li>
                                    <li><a data-toggle="pill" href="#menu2"><h3>Third <span>Day</span></h3> <p>{{ date('D d M, Y', strtotime('+2 day', strtotime($event->start_time))) }}</p></a></li>
                                    {{-- <li><a data-toggle="pill" href="#menu3"><h3>Fourth <span>Day</span></h3> <p><span>30 </span>Dec, 2019</p></a></li> --}}
                                </ul>
                                <div class="tab-content lgx-tab-content">
    
                                    <!-- Day One program-->
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            {!! $event->day1_prog !!}
                                        </div>
                                    </div>
    
                                    <!-- Day two program-->
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                            {!! $event->day2_prog !!}
                                        </div>
                                    </div>
    
                                    <!-- Day three program-->
                                    <div id="menu2" class="tab-pane fade">
                                        <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                                            {!! $event->day3_prog !!}
                                        </div>
                                    </div>
    
                                    <!-- Day four program-->
                                    <div id="menu3" class="tab-pane fade">
    
                                        <div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
                                            {!! $event->day4_prog !!}
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <p class="text-center text-danger">The program has not been uploaded yet</p>
                        @endif
                    </div>
                    <!--//.ROW-->
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER -->
        </div>
    </section>
    <!--SCHEDULE END-->
    
    
    
        <!--ORGANIZERS-->
        <section>
            <div id="lgx-speakers" class="lgx-speakers lgx-speakers1" style="background: #f9f9f9 }}')">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading lgx-heading">
                                    <h2 class="heading">Organizers</h2>
                                    <h3 class="subheading">Here is a list of conference organizers</h3>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                        <div class="row">
                            @if($organizers != Null)
                            @foreach($organizers as $speaker)
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-speaker2 lgx-single-speaker3"> <!--lgx-single-speaker lgx-single-speaker2 lgx-single-speaker3-->
                                    <figure>
                                        <a class="profile-img" href="{{ route('event-speakers.show', $speaker->slug) }}"><img src="{{ asset('uploads/speakers') }}/{{ $speaker->image }}" alt="{{ $speaker->name }}"/></a>
                                        <figcaption>
                                            {{-- <div class="social-group">
                                                <a class="sp-tw" href="#"><i class="fa fa-twitter"></i></a>
                                                <a class="sp-fb" href="#"><i class="fa fa-facebook"></i></a>
                                                <a class="sp-insta" href="#"><i class="fa fa-instagram"></i></a>
                                                <a class="sp-in" href="#"><i class="fa fa-linkedin"></i></a>
                                            </div> --}}
                                            <div class="speaker-info">
                                                <h3 class="title"><a href="{{ route('event-speakers.show', $speaker->slug) }}">{{ $speaker->name }}</a></h3>
                                                <h4 class="subtitle">{{ $speaker->title }}</h4>
                                                <h4 class="text">{{ $speaker->role }}</h4>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <p class="text-danger text-center">Organizers info has not been updated</p>
                            @endif
                        </div>
                        <!--//.ROW-->
                        @if($speaker_count > 12)
                            <div class="section-btn-area">
                                <a class="lgx-btn lgx-btn-big" href="{{ route('event-speakers.index') }}">More Speakers</a>
                            </div>
                        @endif
                    </div>
                    <!-- //.CONTAINER -->
                </div>
                <!-- //.INNER -->
            </div>
        </section>
        <!--ORGANIZERS END-->

        <!--SPEAKERS-->
        <section>
            <div id="lgx-speakers" class="lgx-speakers lgx-speakers2" style="background-image: url('{{ asset('frontend/assets/img/speakers.jpg') }}')">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading lgx-heading-white">
                                    <h2 class="heading">Who’s Speaking</h2>
                                    <h3 class="subheading">Here is a list of the speakers who will be speaking</h3>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                        <div class="row row-eq-height">
                            @if($speakers != Null)
                            @foreach($speakers as $speaker)
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="lgx-single-speaker2 lgx-single-speaker3"> <!--lgx-single-speaker lgx-single-speaker2 lgx-single-speaker3-->
                                    <figure>
                                        <a class="profile-img" href="{{ route('event-speakers.show', $speaker->slug) }}"><img src="{{ asset('uploads/speakers') }}/{{ $speaker->image }}" alt="{{ $speaker->name }}"/></a>
                                        <figcaption>
                                            {{-- <div class="social-group">
                                                <a class="sp-tw" href="#"><i class="fa fa-twitter"></i></a>
                                                <a class="sp-fb" href="#"><i class="fa fa-facebook"></i></a>
                                                <a class="sp-insta" href="#"><i class="fa fa-instagram"></i></a>
                                                <a class="sp-in" href="#"><i class="fa fa-linkedin"></i></a>
                                            </div> --}}
                                            <div class="speaker-info">
                                                <h3 class="title"><a href="{{ route('event-speakers.show', $speaker->slug) }}">{{ $speaker->name }}</a></h3>
                                                <h4 class="subtitle">{{ $speaker->title }}</h4>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <p class="text-danger text-center">Speaker info has not been updated</p>
                            @endif
                        </div>
                        <!--//.ROW-->
                        @if($speaker_count > 12)
                            <div class="section-btn-area">
                                <a class="lgx-btn lgx-btn-big" href="{{ route('event-speakers.index') }}">More Speakers</a>
                            </div>
                        @endif
                    </div>
                    <!-- //.CONTAINER -->
                </div>
                <!-- //.INNER -->
            </div>
        </section>
        <!--SPEAKERS END-->

        <!--GUIDELINES TO AUTHORS-->
        <section>
            <div id="lgx-guidelines" class="lgx-about">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="lgx-about-content-area lgx-about-content-area-left">
                                    <div class="lgx-heading">
                                        <h2 class="heading">Guideline for Authors</h2>
                                    </div>
                                    <div class="lgx-about-content" id="less">
                                        <p class="text">
                                            {!! ($event->guideline_for_authors) !!}
                                        </p>
                                    </div>
                                    <div class="section-btn-area2">
                                        @if($event->cfp_file != NULL)
                                            <a href="{{ asset('uploads/abstracts') }}/{{ $event->cfp_file }}" target="_blank" class="lgx-btn lgx-btn-white text-white" style="background: orange">Download Call for Papers (PDF)</a>
                                        @endif
                                        @if($event->abstract_link != NULL)
                                            <a href="{{ $event->abstract_link }}" target="_blank" class="lgx-btn btn-danger">Submit Abstract</a>
                                        @endif
                                        @if($event->registration_link != NULL)
                                            <a href="{{ $event->registration_link }}" target="_blank" class="lgx-btn lgx-btn-white">Register</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
        </section>
        <!--GUIDELINES TO AUTHORS END-->
    
        <!--SPONSORED-->
        <section>
            <div id="lgx-sponsors" class="lgx-sponsors2">
                <div class="lgx-inner-bg">
                    <div class="lgx-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="lgx-heading">
                                        <h2 class="heading">Partners/Sponsors</h2>
                                        <h3 class="subheading">The following have partnered with us</h3>
                                    </div>
                                </div>
                            </div>
                            <!--//main row-->
                            <div class="row">
                                <div class="col-xs-12">
                                    {{-- <h3 class="sponsored-heading first-heading">Gold Sponsors</h3> --}}
                                    <div class="sponsors-area">
                                        @if($partner_count > 0)
                                        @foreach($partners as $partner)
                                        <div class="single">
                                            <a class="" href="{{ $partner->website }}" target="_blank"><img src="{{ asset('uploads/partners') }}/{{ $partner->image }}" alt="{{ $partner->name }}"/></a>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                            {{-- <div class="section-btn-area">
                                <a class="lgx-btn" href="#">Become A Sponsor</a>
                            </div> --}}
                        </div>
                        <!--//container-->
                    </div>
                </div>
                <!--//lgx-inner-->
            </div>
        </section>
        <!--SPONSORED END-->
    
    
        <!--REGISTRATION-->
        <section>
            <div id="lgx-registration" class="lgx-registration lgx-registration3"> <!--lgx-registration2 lgx-registration3 lgx-registration4-->
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                @if(!$tickets->isEmpty())
                                <div class="lgx-registration-area"> <!--lgx-registration-area2 lgx-registration-area3 "-->
                                    @foreach($tickets as $index => $ticket)
                                    <?php $class=''; if( $index == 1 ) $class ='recommended';?>
                                    <div class="lgx-single-registration {{ $class }}">
                                        <div class="lgx-single-registration-inner">
                                            <div class="single-top">
                                                <h3 class="title">{{ $ticket->title }}</h3>
                                                <h4 class="price"><i>{{ $ticket->currency == 1 ? "USD" : "KES"}}</i>{{$ticket->price}}<span>/Head</span></h4>
                                            </div>
                                            <div class="single-bottom">
                                                <ul class="list-unstyled list">
                                                    {{-- <li>Tickets Available: {{ $ticket->amount }}</li> --}}
                                                </ul>
                                                @if($event->registration_link == NULL)
                                                    <a class="lgx-btn" href="{{ route('account.eventregistration.show', $event->slug) }}"><span>Register</span></a>
                                                @else
                                                    <a class="lgx-btn" href="{{ $event->registration_link }}"><span>Register</span></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{-- <div class="lgx-single-registration recommended">
                                        <div class="lgx-single-registration-inner">
                                            <div class="single-top">
                                                <h3 class="title">Business</h3>
                                                <h4 class="price"><i>$</i>89<span>/Month</span></h4>
                                            </div>
                                            <div class="single-bottom">
                                                <ul class="list-unstyled list">
                                                    <li>Unlimited Entrance</li>
                                                    <li>Comfortable Seat</li>
                                                    <li>Coffee Break</li>
                                                    <li>One Workshop</li>
                                                    <li>Certificate</li>
                                                </ul>
                                                <a class="lgx-btn" href="#"><span>Buy Ticket</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lgx-single-registration">
                                        <div class="lgx-single-registration-inner">
                                            <div class="single-top">
                                                <h3 class="title">Premium</h3>
                                                <h4 class="price"><i>$</i>99<span>/Month</span></h4>
                                            </div>
                                            <div class="single-bottom">
                                                <ul class="list-unstyled list">
                                                    <li>Unlimited Entrance</li>
                                                    <li>Comfortable Seat</li>
                                                    <li>Coffee Break</li>
                                                    <li>One Workshop</li>
                                                    <li>Certificate</li>
                                                </ul>
                                                <a class="lgx-btn" href="#"><span>Buy Ticket</span></a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                @else
                                <h3 class="text-center" style="color:white">No Tickets available</h3>
                                @endif
                            </div>
                        </div>
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
        </section>
        <!--REGISTRATION END-->
    
        <!--IMPORTANT DATES-->
        <section>
            <div id="lgx-dates" class="lgx-about">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="lgx-about-content-area lgx-about-content-area-left">
                                    <div class="lgx-heading">
                                        <h2 class="heading">Important Dates</h2>
                                    </div>
                                    <div class="lgx-about-content">
                                        <p class="text text-center">
                                            {!! ($event->important_dates) !!}
                                        </p>
                                    </div>
                                    <div class="section-btn-area2" style="margin-top: 20px">
                                        @if($event->cfp_file != NULL)
                                            <a href="{{ asset('uploads/abstracts') }}/{{ $event->cfp_file }}" target="_blank" class="lgx-btn lgx-btn-white text-white" style="background: orange">Download Call for Papers (PDF)</a>
                                        @endif
                                        @if($event->abstract_link != NULL)
                                            <a href="{{ $event->abstract_link }}" target="_blank" class="lgx-btn btn-danger">Submit Abstract</a>
                                        @endif
                                        @if($event->registration_link != NULL)
                                            <a href="{{ $event->registration_link }}" target="_blank" class="lgx-btn lgx-btn-white">Register</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
        </section>
        <!--IMPORTANT DATES END-->
    
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

        <div id="slideout" style="overflow: auto">
            <button class="lgx-btn lgx-btn-white" onclick="readMore()">Close</button>
            <p class="text">
                {!! $event->description !!}
            </p>
            <button class="lgx-btn lgx-btn-white" onclick="readMore()">Close</button>
        </div>

        <div id="overlay" style="overflow: auto">
            <a href="#" class="close">&times;</a>
            <div style="height:10%"></div>
            
            <p class="text">
                {!! $event->description !!}
            </p>
            
        </div>
        <div id="mask" onclick="document.location='#';"></div> <!-- the only javascript -->

@endsection

{{-- <section id="events" class="events">
    <div class="container">
        <div class="row">
            @if (count($events) > 0)
                @foreach ($events as $event)
                    <div class="col-lg-4">
                        <h2><a href="{{ route('events.show', $event->id) }}" class="">{{ $event->title }}</h2></a>
                        <div class="event-meta">
                            <div class="venue"><span class="label label-default">{{ $event->venue }}</span></div>
                            <div class="datetime"><span class="label label-info">{{ $event->start_time }}</span></div>
                        </div>
                        {!! $event->description !!}
                    </div>
                    @if ($loop->index > 0 && ($loop->index + 1) % 3 == 0) </div><hr /><div class="row"> @endif
                @endforeach
            @endif
        </div>
    </div>
</section> --}}