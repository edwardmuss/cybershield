@extends('layouts.guest')
@section( 'title', "Home" )
@section( 'description', "Global Cybershield Conference (GCC) is organized by Daystar University School of Science, Engineering & Health (SSEH) in collaboration with Cyberpro Global - a leading provider of educational technologies & cyber training solutions.")
@section( 'image', "https://www.daystar.ac.ke/cybershield-conference/uploads/events/1712906458_tech-bg.jpg" )

@section('content')
    @include('partials.guest.event-header')
    <style>
        .subtitle_2 {
            font-family: Poppins,sans-serif;
            font-size: 3.8rem;
            font-weight: 300;
            color: #02aeee;
            margin: 0;
            line-height: 7.2rem;
        }
        .lgx-video .lgx-inner {
            background: rgba(27, 39, 61, 0.1);
            padding: 20rem 0 28rem;
        }
    </style>

    <section>
        <div class="lgx-banner lgx-banner16" style="background-image: url({{ asset('uploads/events') }}/{{ $event->image }}), linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.7)); background-blend-mode: overlay; background-position:bottom">
            <div class="lgx-banner-style">
                <div class="lgx-inner lgx-inner-fixed">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-banner-info lgx-banner-info-center"> <!--lgx-banner-info-center lgx-banner-info-black lgx-banner-info-big lgx-banner-info-bg--> <!--banner-info-margin-->
                                    <h3 class="subtitle">{{ $event->slider_top_text }}</h3>
                                    <h2 class="title">{{ $event->slider_middle_text }}</span></h2>
                                    {{-- <h3 class="location"><i class="fa fa-map-marker"></i> 21 King Street, Dhaka 1205, Bangladesh.</h3> --}}
                                    <p class="location">{{ $event->slider_bottom_text }}</p>
                                    <div class="action-area">
                                        <div class="lgx-video-area">
                                            <p class="video-area"><a id="myModalLabel" class="icon" href="#" data-toggle="modal" data-target="#lgx-modal">
                                                <i class="fa fa-play " aria-hidden="true"></i>
                                            </a> Promo Video</p>
                                            <!-- Modal-->
                                            <div id="lgx-modal" class="modal fade lgx-modal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe id="modalvideo" src="https://www.youtube.com/embed/dPt3VUd3hmo" allowfullscreen=""></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- //.Modal-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                    </div>
                    <!-- //.CONTAINER -->
                </div>
                <!-- //.INNER -->
            </div>
        </div>
    </section>
    <section>
        @if($latest_upcoming_event != Null)
        <div class="lgx-countdown">
            <div class="lgx-inner-countdown">
                <div class="countdown-left-info">
                    {{-- <h2 class="title">Happening</h2> --}}
                    <h3 class="subtitle">{{ $event->title }}</h3>
                    <p class="date">{{ date('d', strtotime($event->start_time)) }} - {{ date('d F, Y', strtotime($event->end_time)) }}</p>
                </div>
                <div class="countdown-right">
                    <div class="lgx-countdown-area lgx-countdown-simple">
                        <div id="lgx-countdown" data-date="{{ $event->start_time }}"><span class="lgx-days">00 <i> Days </i></span> <span class="lgx-hr">00 <i> Hour </i></span> <span class="lgx-min">00 <i> Minu </i></span> <span class="lgx-sec">00 <i> Seco </i></span></div>
                    </div>
                </div>
            </div><!-- //.INNER -->
        </div>
        @endif
    </section>

        <!--ABOUT-->
    <section>
        <div id="about" class="lgx-about">
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
                                    <a href="{{ route('event.show', $event->slug) }}" class="lgx-btn lgx-btn-red" id="open-overlay">Event Details</a>
                                    <a href="{{ route('auth.register') }}" class="lgx-btn lgx-btn-red">Register</a>
                                    @if($event->cfp_file != NULL)
                                        <a href="{{ asset('uploads/abstracts') }}/{{ $event->cfp_file }}" target="_blank" class="lgx-btn lgx-btn-white text-white" style="background: orange">Download Call for Papers (PDF)</a>
                                    @endif
                                    @if($event->abstract_link != NULL)
                                        <a href="{{ $event->abstract_link }}" target="_blank" class="lgx-btn btn-danger">Submit Abstract</a>
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
    
    <!--VIDEO-->
    <section>
        <div id="lgx-video" class="lgx-video lgx-video" style="background-image: url('{{ asset('frontend/assets/img/slider1.jpg') }}')">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="lgx-video-title text-center text-white"><span>Watch Our Promo video!</h2>
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
                                                <iframe id="modalvideo" src="https://www.youtube.com/embed/om-jeuMLXQM" allowfullscreen></iframe>
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

    <!--GOOGLE MAP-->
    <div class="innerpage-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255282.8986900671!2d36.497397422790506!3d-1.2975203458171543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f11eb4f9d91a5%3A0xf51b4362dde71587!2sDaystar%20University-Nairobi%20Campus%2CMbagathi%20Way!5e0!3m2!1sen!2ske!4v1684142488778!5m2!1sen!2ske" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!--GOOGLE MAP END-->
@endsection
