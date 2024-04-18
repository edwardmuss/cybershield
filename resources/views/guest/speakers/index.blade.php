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
                                    <h2 class="heading">All Speakers</h2>
                                </div>
                                <ul class="breadcrumb">
                                    <li><a href="{{ route('guest.home') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li class="active">Speakers</li>
                                </ul>
                            </div>
                        </div>
                    </div><!--//.ROW-->
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section> <!--//.Banner Inner-->


    <main>
        <div class="lgx-page-wrapper">
            <section>
                <div class="container">
                    <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            {!! $speakers->links() !!}
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>

@endsection