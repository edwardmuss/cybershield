@extends('layouts.guest')

@section('content')
    @include('partials.guest.header')
    <style>
        .subtitle_2 {
            font-family: Poppins,sans-serif;
            font-size: 3.8rem;
            font-weight: 300;
            color: #02aeee;
            margin: 0;
            line-height: 7.2rem;
        }
    </style>

        <!--SLIDER-->
        <section>
            <div class="lgx-slider"> <!--lgx-slider-content -->
                <div class="lgx-banner-style">
                    <div class="lgx-inner">
    
                        <div id="lgx-main-slider" class="owl-carousel">
                            
                            @foreach($events as $event)
                            <!--SLIDER ITEM -->
                            <div class="lgx-item-common">
                                <div class="slider-text-single">
                                    <figure>
                                        <img src="{{ asset('uploads/events') }}/{{ $event->image }}" alt="slide"/>
                                        <figcaption>
                                            <div class="lgx-container">
                                                <div class="lgx-hover-link">
                                                    <div class="lgx-vertical">
                                                        <!--All Animation class-->
                                                        <!--lgx-fadeIn lgx-fadeInDown lgx-fadeInDownBig lgx-fadeInLeft lgx-fadeInLeftBig lgx-fadeInRight lgx-fadeInRightBig lgx-fadeInUp lgx-fadeInUpBig
                                                        lgx-flipInX lgx-flipInY lgx-lightSpeedIn lgx-rotateIn lgx-rotateInDownLeft lgx-rotateInDownRight lgx-rotateInUpLeft lgx-rotateInUpRight lgx-slideInLeft
                                                        lgx-slideInRight lgx-bounceIn lgx-bounceInDown lgx-bounceInLeft lgx-bounceInRight lgx-bounceInUp lgx-zoomIn lgx-zoomInDown lgx-zoomInLeft
                                                        lgx-zoomInRight lgx-zoomInUp-->
                                                        <div class="lgx-banner-info"> <!--lgx-banner-info-center lgx-banner-info-black lgx-banner-info-big lgx-banner-info-bg-->
                                                            <h3 class="subtitle_2 lgx-delay lgx-fadeInDown">{{ $event->slider_top_text }}</h3>
                                                            <h2 class="title lgx-delay lgx-fadeInDown">{{ $event->slider_middle_text }}</h2>
                                                            <h3 class="subtitle_2 lgx-delay lgx-fadeInDown"> {{ $event->slider_bottom_text }}</h3>
                                                            <h3 class="date lgx-delay lgx-fadeInDown"><i class="fa fa-calendar"></i> {{ date('d', strtotime($event->start_time)) }} - {{ date('d F, Y', strtotime($event->end_time)) }}</h3>
                                                            <h3 class="location lgx-delay lgx-fadeInDown"><i class="fa fa-map-marker"></i> {{ $event->venue }}</h3>
                                                            <div class="action-area lgx-delay lgx-fadeInDown">
                                                                <div class="lgx-video-area">
                                                                    <a class="lgx-btn lgx-btn-red" href="#">Buy Ticket</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <!--SLIDER ITEM 1 End-->
                            @endforeach
    
                        </div> <!--//.lgx-main-slider-->
    
    
                        <!-- //.CONTAINER -->
                    </div>
                    <!-- //.INNER -->
                </div>
            </div>
        </section>
        <!--SLIDER END-->

        <!-- countdown -->
        <section>
            <div id="lgx-countdowns" class="lgx-countdowns lgx-countdowns4"> <!--lgx-countdowns3 lgx-countdowns4-->
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="lgx-heading text-center">
                                    <h2 class="heading" style="color: #02aeee">Next Upcoming Event</h2>
                                    <h2 class="subheading" style="color: #fff">{{ $latest_upcoming_event->title }}</h2>
                                </div>
                                <div class="circular-countdown-area">
                                    <div id="circular-countdown" data-date="{{ $latest_upcoming_event->start_time }}" data-tc-id="e74ce21a-8619-065b-4047-0b3282a50bac"><div class="time_circles"><canvas width="1140" height="285"></canvas><div class="textDiv_Days" style="top: 100px; left: 0px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Days</h4><span style="font-size: 60px; line-height: 20px;">845</span></div><div class="textDiv_Hours" style="top: 100px; left: 285px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Hours</h4><span style="font-size: 60px; line-height: 20px;">10</span></div><div class="textDiv_Minutes" style="top: 100px; left: 570px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Minutes</h4><span style="font-size: 60px; line-height: 20px;">31</span></div><div class="textDiv_Seconds" style="top: 100px; left: 855px; width: 285px;"><h4 style="font-size: 20px; line-height: 20px;">Seconds</h4><span style="font-size: 60px; line-height: 20px;">29</span></div></div></div>
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
                                    <h2 class="heading">Happy New Year 2019</h2>
                                    <h3 class="subheading">Why Happy New Year 2019 ?</h3>
                                </div>
                                <div class="lgx-about-content">
                                    <p class="text">
                                        Morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris Eonec eu ribero sit amet quam egestas semper. Aenean are ultricies mi vitae.
                                    </p>
                                    <div class="section-btn-area">
                                        <a class="lgx-btn" href="about.html">More About</a>
                                        <a class="lgx-btn lgx-btn-red lgx-scroll" href="#lgx-registration">Buy Ticket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT END-->
    
    
    
    
        <!--VIDEO-->
        <section>
            <div id="lgx-video" class="lgx-video lgx-video2">
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
                                                    <iframe id="modalvideo" src="https://www.youtube.com/embed/oSPR5Go05Vg" allowfullscreen></iframe>
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
        <div id="lgx-schedule" class="lgx-schedule lgx-schedule2 lgx-schedule-white">
            <div class="lgx-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading">
                                <h2 class="heading">Event Schedule</h2>
                                <h3 class="subheading">Welcome to the dedicated to building remarkable Schedule!</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-tab">
                                <ul class="nav nav-pills lgx-nav">
                                    <li class="active"><a data-toggle="pill" href="#home"><h3>First <span>Day</span></h3> <p><span>29 </span>Nov, 2019</p></a></li>
                                    <li><a data-toggle="pill" href="#menu1"><h3>Second <span>Day</span></h3> <p><span>28 </span>Jul, 2019</p></a></li>
                                    <li><a data-toggle="pill" href="#menu2"><h3>Third <span>Day</span></h3> <p><span>29 </span>Nov, 2019</p></a></li>
                                    <li><a data-toggle="pill" href="#menu3"><h3>Fourth <span>Day</span></h3> <p><span>30 </span>Dec, 2019</p></a></li>
                                </ul>
                                <div class="tab-content lgx-tab-content">
    
    
                                    <div id="home" class="tab-pane fade in active">
    
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <div class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">Wait is Over! Stony Brook Captures Conference</h3>
                                                                    <h4 class="author-info">By <span>Riaz Sagar</span> , Logichunt Inc.</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">10:30 <span>Am</span> - 11.30 <span>Am</span></h4>
                                                                    <h3 class="title">Team With At Least Three Conference Titles</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingThree">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author author-multi">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">11:30 <span>Am</span> - 01.30 <span>Pm</span></h4>
                                                                    <h3 class="title">Building an Awesome Community on Your Website</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , <span>Riaz Sagar</span> & <span>Devid Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingfour">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">02:00 <span>Am</span> - 03.30 <span>Pm</span></h4>
                                                                    <h3 class="title">Hungry Shawnee boys soccer team eyeing conference, sectional title in 2019</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingfive">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">03:45 <span>Am</span> - 04.00 <span>Pm</span></h4>
                                                                    <h3 class="title">Business World Event Introduction</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
    
    
                                    <div id="menu1" class="tab-pane fade">
    
                                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingOne2">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author author-multi">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">The Wait is Over! Stony Brook Captures First Conference Title</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , <span>Riaz Sagar</span> & <span>Devid Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseOne2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingTwo2">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" aria-expanded="true" aria-controls="collapseTwo2">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">Digital World Event Introduction</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingThree2">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2" aria-expanded="true" aria-controls="collapseThree2">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">Digital World Event Introduction</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseThree2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
    
    
                                    <div id="menu2" class="tab-pane fade">
    
                                        <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingOne3">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">Digital World Event Introduction</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseOne3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingTwo3">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo3" aria-expanded="true" aria-controls="collapseTwo3">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">Digital World Event Introduction</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingThree3">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree3" aria-expanded="true" aria-controls="collapseThree3">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">Digital World Event Introduction</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseThree3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
    
    
                                    <div id="menu3" class="tab-pane fade">
    
                                        <div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingOne4">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion4" href="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">Digital World Event Introduction</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseOne4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne4">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingTwo4">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion4" href="#collapseTwo4" aria-expanded="true" aria-controls="collapseTwo4">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">Digital World Event Introduction</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseTwo4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo4">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default lgx-panel">
                                                <div class="panel-heading" role="tab" id="headingThree4">
                                                    <div class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion4" href="#collapseThree4" aria-expanded="true" aria-controls="collapseThree4">
                                                            <div class="lgx-single-schedule">
                                                                <div class="author">
                                                                    <img src="http://placehold.it/800x800" alt="Speaker"/>
                                                                </div>
                                                                <div class="schedule-info">
                                                                    <h4 class="time">09:00 <span>Am</span> - 10.30 <span>Am</span></h4>
                                                                    <h3 class="title">Digital World Event Introduction</h3>
                                                                    <h4 class="author-info">By <span>Joanna Smith</span> , Design Apple</h4>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div id="collapseThree4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree4">
                                                    <div class="panel-body">
                                                        <p class="text">
                                                            Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse flexitarian Truffaut synth art party deep v chillwave.
                                                        </p>
                                                        <h4 class="location"><strong>Location:</strong>  Hall 1, Building A , Golden Street , <span>Southafrica</span> </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
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
    </section>
    <!--SCHEDULE END-->
    
    
    
        <!--SPEAKERS-->
        <section>
            <div id="lgx-speakers" class="lgx-speakers lgx-speakers2">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading lgx-heading-white">
                                    <h2 class="heading">Who’s Speaking</h2>
                                    <h3 class="subheading">Welcome to the dedicated to building remarkable Speakers!</h3>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-speaker2 lgx-single-speaker3"> <!--lgx-single-speaker lgx-single-speaker2 lgx-single-speaker3-->
                                    <figure>
                                        <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                        <figcaption>
                                            <div class="social-group">
                                                <a class="sp-tw" href="#"><i class="fa fa-twitter"></i></a>
                                                <a class="sp-fb" href="#"><i class="fa fa-facebook"></i></a>
                                                <a class="sp-insta" href="#"><i class="fa fa-instagram"></i></a>
                                                <a class="sp-in" href="#"><i class="fa fa-linkedin"></i></a>
                                            </div>
                                            <div class="speaker-info">
                                                <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                                <h4 class="subtitle">Ceo of LogicHunt</h4>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-speaker2 lgx-single-speaker3"> <!--lgx-single-speaker lgx-single-speaker2 lgx-single-speaker3-->
                                    <figure>
                                        <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                        <figcaption>
                                            <div class="social-group">
                                                <a class="sp-tw" href="#"><i class="fa fa-twitter"></i></a>
                                                <a class="sp-fb" href="#"><i class="fa fa-facebook"></i></a>
                                                <a class="sp-insta" href="#"><i class="fa fa-instagram"></i></a>
                                                <a class="sp-in" href="#"><i class="fa fa-linkedin"></i></a>
                                            </div>
                                            <div class="speaker-info">
                                                <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                                <h4 class="subtitle">Ceo of LogicHunt</h4>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-speaker2 lgx-single-speaker3"> <!--lgx-single-speaker lgx-single-speaker2 lgx-single-speaker3-->
                                    <figure>
                                        <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                        <figcaption>
                                            <div class="social-group">
                                                <a class="sp-tw" href="#"><i class="fa fa-twitter"></i></a>
                                                <a class="sp-fb" href="#"><i class="fa fa-facebook"></i></a>
                                                <a class="sp-insta" href="#"><i class="fa fa-instagram"></i></a>
                                                <a class="sp-in" href="#"><i class="fa fa-linkedin"></i></a>
                                            </div>
                                            <div class="speaker-info">
                                                <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                                <h4 class="subtitle">Ceo of LogicHunt</h4>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-speaker2 lgx-single-speaker3"> <!--lgx-single-speaker lgx-single-speaker2 lgx-single-speaker3-->
                                    <figure>
                                        <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                        <figcaption>
                                            <div class="social-group">
                                                <a class="sp-tw" href="#"><i class="fa fa-twitter"></i></a>
                                                <a class="sp-fb" href="#"><i class="fa fa-facebook"></i></a>
                                                <a class="sp-insta" href="#"><i class="fa fa-instagram"></i></a>
                                                <a class="sp-in" href="#"><i class="fa fa-linkedin"></i></a>
                                            </div>
                                            <div class="speaker-info">
                                                <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                                <h4 class="subtitle">Ceo of LogicHunt</h4>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-speaker2 lgx-single-speaker3"> <!--lgx-single-speaker lgx-single-speaker2 lgx-single-speaker3-->
                                    <figure>
                                        <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                        <figcaption>
                                            <div class="social-group">
                                                <a class="sp-tw" href="#"><i class="fa fa-twitter"></i></a>
                                                <a class="sp-fb" href="#"><i class="fa fa-facebook"></i></a>
                                                <a class="sp-insta" href="#"><i class="fa fa-instagram"></i></a>
                                                <a class="sp-in" href="#"><i class="fa fa-linkedin"></i></a>
                                            </div>
                                            <div class="speaker-info">
                                                <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                                <h4 class="subtitle">Ceo of LogicHunt</h4>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-speaker2 lgx-single-speaker3"> <!--lgx-single-speaker lgx-single-speaker2 lgx-single-speaker3-->
                                    <figure>
                                        <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                        <figcaption>
                                            <div class="social-group">
                                                <a class="sp-tw" href="#"><i class="fa fa-twitter"></i></a>
                                                <a class="sp-fb" href="#"><i class="fa fa-facebook"></i></a>
                                                <a class="sp-insta" href="#"><i class="fa fa-instagram"></i></a>
                                                <a class="sp-in" href="#"><i class="fa fa-linkedin"></i></a>
                                            </div>
                                            <div class="speaker-info">
                                                <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                                <h4 class="subtitle">Ceo of LogicHunt</h4>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <!--//.ROW-->
                        <div class="section-btn-area">
                            <a class="lgx-btn lgx-btn-big" href="speakers.html">More Speakers</a>
                        </div>
                    </div>
                    <!-- //.CONTAINER -->
                </div>
                <!-- //.INNER -->
            </div>
        </section>
        <!--SPEAKERS END-->
    
    
    
    <!--SPONSORED-->
    <section>
        <div id="lgx-sponsors" class="lgx-sponsors">
            <div class="lgx-inner-bg">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading">
                                    <h2 class="heading">Sponsores</h2>
                                    <h3 class="subheading">Welcome to the dedicated to building remarkable Sponsores!</h3>
                                </div>
                            </div>
                        </div>
                        <!--//main row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="sponsored-heading first-heading">Gold Sponsors</h3>
                                <div class="sponsors-area">
                                    <div class="single">
                                        <a class="" href="#"><img src="http://placehold.it/467x157" alt="sponsor"/></a>
                                    </div>
                                    <div class="single">
                                        <a class="" href="#"><img src="http://placehold.it/467x157" alt="sponsor"/></a>
                                    </div>
                                    <div class="single">
                                        <a class="" href="#"><img src="http://placehold.it/467x157" alt="sponsor"/></a>
                                    </div>
                                    <div class="single">
                                        <a class="" href="#"><img src="http://placehold.it/467x157" alt="sponsor"/></a>
                                    </div>
                                    <div class="single">
                                        <a class="" href="#"><img src="http://placehold.it/467x157" alt="sponsor"/></a>
                                    </div>
                                    <div class="single">
                                        <a class="" href="#"><img src="http://placehold.it/467x157" alt="sponsor"/></a>
                                    </div>
                                    <div class="single">
                                        <a class="" href="#"><img src="http://placehold.it/467x157" alt="sponsor"/></a>
                                    </div>
                                </div>
                            </div>
                            <!--//col-->
                        </div>
                        <!--//row-->
                        <div class="section-btn-area">
                            <a class="lgx-btn" href="#">Become A Sponsor</a>
                        </div>
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
                                <div class="lgx-registration-area"> <!--lgx-registration-area2 lgx-registration-area3 "-->
                                    <div class="lgx-single-registration">
                                        <div class="lgx-single-registration-inner">
                                            <div class="single-top">
                                                <h3 class="title">Personal</h3>
                                                <h4 class="price"><i>$</i>59<span>/Month</span></h4>
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
                                    <div class="lgx-single-registration recommended">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
        </section>
        <!--REGISTRATION END-->
    
    
    
    
        <!--News-->
        <section>
            <div id="lgx-news" class="lgx-news">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading">
                                    <h2 class="heading">From Our Blog</h2>
                                    <h3 class="subheading">Conferences dedicated to building remarkable events.</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-news">
                                    <figure>
                                        <a href="news-single.html"><img src="http://placehold.it/1144x690" alt=""></a>
                                    </figure>
                                    <div class="single-news-info">
                                        <div class="meta-wrapper">
                                            <span>April 25, 2018</span>
                                            <span>by <a href="#">Riazsagar</a></span>
                                            <span><a href="#">Design</a></span>
                                        </div>
                                        <h3 class="title"><a href="news-single.html">Brooklyn Beta was the most important conferen best tristique</a></h3>
                                        <a class="lgx-btn lgx-btn-white lgx-btn-sm" href="#"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-news">
                                    <figure>
                                        <a href="news-single.html"><img src="http://placehold.it/1144x690" alt=""></a>
                                    </figure>
                                    <div class="single-news-info">
                                        <div class="meta-wrapper">
                                            <span>April 25, 2018</span>
                                            <span>by <a href="#">Riazsagar</a></span>
                                            <span><a href="#">Design</a></span>
                                        </div>
                                        <h3 class="title"><a href="news-single.html">Brooklyn Beta was the most important conferen best tristique</a></h3>
                                        <a class="lgx-btn lgx-btn-white lgx-btn-sm" href="#"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="lgx-single-news">
                                    <figure>
                                        <a href="news-single.html"><img src="http://placehold.it/1144x690" alt=""></a>
                                    </figure>
                                    <div class="single-news-info">
                                        <div class="meta-wrapper">
                                            <span>April 25, 2018</span>
                                            <span>by <a href="#">Riazsagar</a></span>
                                            <span><a href="#">Design</a></span>
                                        </div>
                                        <h3 class="title"><a href="news-single.html">Brooklyn Beta was the most important conferen best tristique</a></h3>
                                        <a class="lgx-btn lgx-btn-white lgx-btn-sm" href="#"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-btn-area">
                            <a class="lgx-btn" href="news.html">View More Blogs</a>
                        </div>
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
        </section>
        <!--News END-->
    
    
    
        <!--TRAVEL INFO-->
        <section>
            <div id="lgx-travelinfo" class="lgx-travelinfo">
                <div class="lgx-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="lgx-heading">
                                    <h2 class="heading">Event Information</h2>
                                    <h3 class="subheading">Conferences dedicated to building remarkable events.</h3>
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
                                        <p class="info">Docklands Convention Centre 58 Wurundjeri Way Dablin, 3000</p>
                                    </div>
                                    <div class="lgx-travelinfo-single">
                                        <img src="{{ asset('frontend/assets/img/info-icon2.png') }}" alt="Transport"/>
                                        <h3 class="title">Transport</h3>
                                        <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do incididunt</p>
                                    </div>
                                    <div class="lgx-travelinfo-single">
                                        <img src="{{ asset('frontend/assets/img/info-icon3.png') }}" alt="Hotel & Restaurant"/>
                                        <h3 class="title">Hotel & Restaurant</h3>
                                        <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do incididunt</p>
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
            <div class="lgxmapcanvas map-canvas-default" id="map_canvas"> </div>
        </div>
        <!--GOOGLE MAP END-->
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