
    
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="lgx-container ">
    <!-- ***  ADD YOUR SITE CONTENT HERE *** -->
    
    
    <!--HEADER-->
    <header>
        <div id="lgx-header" class="lgx-header">
            <div class="lgx-header-position "> <!--lgx-header-position-fixed lgx-header-position-white lgx-header-fixed-container lgx-header-fixed-container-gap lgx-header-position-white-->
                <div class="lgx-container"> <!--lgx-container-fluid-->
                    <nav class="navbar navbar-default lgx-navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" style="colo:#fff;" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="lgx-logo">
                                <a href="{{ route('guest.home') }}" class="lgx-scroll">
                                    <img src="{{ asset('frontend/assets/img//conferences-logo.png') }}" alt="Daystar Conferences Logo"/>
                                </a>
                            </div>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <div class="lgx-nav-right navbar-right">
                                <div class="lgx-cart-area">
                                    @if(Auth::user())
                                        <a class="lgx-btn lgx-btn-red" href="#logout" onclick="$('#logout').submit();">{{ "Logout" }}</a>
                                        {{-- <a class="lgx-btn lgx-btn-red" href="#">{{ explode(" ", Auth::user()->name)[0] ."s' Dashboard" }}</a> --}}
                                    @else
                                        <a class="lgx-btn lgx-btn-red" href="{{ route('auth.register') }}">Register</a>
                                    @endif
                                </div>
                            </div>
                            <ul class="nav navbar-nav lgx-nav navbar-right">
                                <li><a href="{{ route('guest.home') }}">Home</a></li>
                                <li><a class="lgx-scroll" href="@if(Route::is('guest.home') ) #about @else {{ route('guest.home') }}#about @endif">About</a></li>
                                <li><a class="lgx-scroll" href="@if(Route::is('guest.home') ) #about @else {{ route('guest.home') }}#schedule @endif">Schedule</a></li>
                                <li><a class="lgx-scroll" href="@if(Route::is('guest.home') ) #about @else {{ route('guest.home') }}#speaker @endif">Speakers</a></li>
                                <li><a class="lgx-scroll" href="@if(Route::is('guest.home') ) #about @else {{ route('guest.home') }}#sponsors @endif">Sponsors</a></li>
                                @if(Auth::user() && Auth::user()->role_id == 3)
                                <li><a  href="{{ route('account.profile') }}">My Dashboard</a></li>
                                    {{-- <a class="lgx-btn lgx-btn-red" href="#">{{ explode(" ", Auth::user()->name)[0] ."s' Dashboard" }}</a> --}}
                                @elseif(Auth::user() && Auth::user()->role_id == 1)
                                    <li><a  href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                                @elseif(Auth::user() && Auth::user()->role_id == 2)
                                    <li><a  href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                                @endif
                            </ul>
                        </div><!--/.nav-collapse -->
                    </nav>
                </div>
                <!-- //.CONTAINER -->
            </div>
        </div>
    </header>
    {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">@lang('quickadmin.logout')</button>
    {!! Form::close() !!}
    <!--HEADER END-->
    {{-- @include('includes.flash_message') --}}
    
    