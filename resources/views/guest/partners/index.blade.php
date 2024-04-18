@extends('layouts.guest')

@section('content')
    @include('partials.guest.header')
        <!--Banner Inner-->
    <section>
        <div class="lgx-banner lgx-banner-inner" style="background-image: url('{{ asset('frontend/assets/img/header-image.jpg') }}')">
            <div class="lgx-page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading-area">
                                <div class="lgx-heading lgx-heading-white">
                                    <h5 class="heading">All Partners/Sponsors</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li><a href="{{ route('guest.home') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li class="active">Partners/Sponsors</li>
                                </ul>
                            </div>
                        </div>
                    </div><!--//.ROW-->
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section> <!--//.Banner Inner-->


    <main>
            <!--SPONSORED-->
            <section>
                <div id="lgx-sponsors" class="lgx-sponsors2">
                    <div class="lgx-inner-bg">
                        <div class="lgx-inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="lgx-heading">
                                            <h2 class="heading">Partners</h2>
                                            <h3 class="subheading">The following have partnered with us during our conferences/events</h3>
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
                                <div class="d-flex justify-content-center text-center">
                                    {!! $partners->links() !!}
                                </div>
                            </div>
                            <!--//container-->
                        </div>
                    </div>
                    <!--//lgx-inner-->
                </div>
            </section>
            <!--SPONSORED END-->
    </main>

@endsection