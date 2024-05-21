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
                            <div class="lgx-about-content-area">
                                <div class="lgx-heading">
                                    <h2 class="heading">About</h2>
                                    <h3 class="subheading">{{ $event->title }}</h3>
                                </div>
                                <div class="lgx-about-content">
                                    <p class="text">
                                        {!! \Illuminate\Support\Str::limit(strip_tags($event->description), 350) !!}
                                    </p>
                                    <div class="section-btn-area">
                                        <a class="lgx-btn" href="{{ route('event.show', $event->slug) }}">READ MORE</a>
                                        <a class="lgx-btn lgx-btn-red lgx-scroll" href="{{ $event->registration_link }}">REGISTER</a>
                                        @if($event->cfp_file != NULL)
                                            <a href="{{ asset('uploads/abstracts') }}/{{ $event->cfp_file }}" target="_blank" class="lgx-btn lgx-btn-white text-white" style="background: #444">Conference Call (PDF)</a>
                                        @endif
                                        @if($event->abstract_link != NULL)
                                            <a href="{{ $event->abstract_link }}" target="_blank" class="lgx-btn btn-danger">Submit Abstract</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>

    <section style="display: none">
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
                                    <a href="{{ $event->registration_link }}" class="lgx-btn lgx-btn-red">Register</a>
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

    <!-- MORE ABOUT -->
    <section>
        <div id="lgx-travelinfo" class="lgx-travelinfo">
            <div class="lgx-inners">
                <div class="lgx-leftright-area">
                    <div class="lgx-left-area lgx-leftright-info">
                        <div class="lgx-leftright-info-inner">
                            <h3 class="title">Payment Details</h3>
                            <p class="info">Co-operative Bank (K) Ltd,</p>
                                <p><strong>Payments should be made in favour of Daystar University,</strong></p>
                                <ul>
                                    <li>A/C Number (KES): <strong>01120065209800</strong>,</li>
                                    <li>A/C Number (Dollar): <strong>02120065209800</strong>.</li>
                                    <li>Swift Code: <strong>KCOOKENA</strong></li>
                                </ul>

                                <p class="info">MPESA:</strong></p>

                                <ul>
                                    <li>Playbill Number: <strong>209800</strong>,</li>
                                    <li>Account Number: <strong>Cybersecurity Your Name</strong></li>
                                </ul>
                            <a class="lgx-btn" href="{{ $event->registration_link }}">Register</a>
                        </div>
                    </div>
                    <div class="lgx-right-area lgx-venu-img" style="background-image: url('https://www.paymentsjournal.com/wp-content/uploads/2021/12/secure-online-payment-internet-banking-via-credit-card-mobile-scaled.jpg')">
    
                    </div>
                </div>
                <div class="lgx-leftright-area">
                    <div class="lgx-right-area lgx-transport-img" style="background-image: url('https://images.unsplash.com/photo-1580927752452-89d86da3fa0a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80')">
    
                    </div>
                    <div class="lgx-left-area lgx-leftright-info">
                        <div class="lgx-leftright-info-inner">
                            <h3 class="title">Important Dates</h3>
                            <p class="info">Please note the following dates</p>
                            <p>
                                {!! ($event->important_dates) !!}
                            </p>
                            @if($event->registration_link == NULL)
                                <a class="lgx-btn" href="{{ route('account.eventregistration.show', $event->slug) }}"><span>Register</span></a>
                            @else
                                <a class="lgx-btn" href="{{ $event->registration_link }}"><span>Register</span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- //.INNER -->
        </div>
    </section>
    <!-- MORE ABOUT -->
    <!--SPEAKERS-->
    <section>
        <div id="speakers" class="lgx-speakers2 lgx-speakers2" style="background-image: url('{{ asset('frontend/assets/img/speakers.jpg') }}')">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading lgx-heading-white">
                                <h2 class="heading">Who's Speaking</h2>
                                <h3 class="subheading">Here is a list of the speakers who will be speaking</h3>
                            </div>
                        </div>
                    </div>
                    <!--//.ROW-->
                    <div class="row row-eq-height3">
                        @if($speakers != Null)
                        @foreach($speakers as $speaker)
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="lgx-single-speaker2 lgx-single-speaker3">
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
                                            <h3 class="title"><a href="{{ route('event-speakers.show', $speaker->slug) }}">{!! \Illuminate\Support\Str::limit(strip_tags($speaker->name), 20) !!}</a></h3>
                                            <h4 class="subtitle">{!! \Illuminate\Support\Str::limit(strip_tags($speaker->title), 20) !!}</h4>
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

    <!--SPONSORED-->
    <section>
        <div id="sponsors" class="lgx-sponsors2">
            <div class="lgx-inner-bg">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading">
                                    <h2 class="heading">Partners</h2>
                                    <h3 class="subheading">The following have partnered with us</h3>
                                </div>
                            </div>
                        </div>
                        <!--//main row-->
                        <div class="row">
                            <div class="col-xs-12">
                                {{-- <h3 class="sponsored-heading first-heading">Gold Sponsors</h3> --}}
                                <div class="sponsors-area sponsors-area-colorfull2">
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
