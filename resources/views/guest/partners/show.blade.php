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
                                    <h2 class="heading">{{ $speaker->name }}</h2>
                                </div>
                                <ul class="breadcrumb">
                                    <li><a href="{{ route('guest.home') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li><a href="{{ route('event-speakers.index') }}">Speakers</a></li>
                                    <li class="active">{{ $speaker->name }}</li>
                                </ul>
                            </div>
                        </div>
                    </div><!--//.ROW-->
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section> <!--//.Banner Inner-->


    <main>
        <div class="lgx-post-wrapper">
            <!--News-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <article>
                                <header>
                                    <figure>
                                        <img src="{{ asset('uploads/speakers') }}/{{ $speaker->image }}" alt="{{ $speaker->name }}" width="500" />
                                    </figure>
                                    <div class="text-area">
                                        <div class="speaker-info">
                                            <h1 class="title"><a href="{{ route('event-speakers.show', $speaker->id) }}">{{ $speaker->name }}</a></h1>
                                            <h4 class="subtitle">{{ $speaker->title }}</h4>
                                        </div>
                                        {{-- <ul class="list-inline lgx-social">
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul> --}}
                                    </div>
                                </header>
                                <section>
                                    <p>
                                        {!! $speaker->bio !!}
                                    </p>
                                </section>
                                <footer>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="title">Share</h4>
                                            <div class="lgx-share">
                                                <ul class="list-inline lgx-social">
                                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                            </article>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </section>
            <!--News END-->
        </div>
    </main>

@endsection