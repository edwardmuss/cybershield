@extends('layouts.guest')
@section( 'title', "$event->title" )
@section( 'description', strip_tags($event->description))
@section( 'image', "https://conferences.daystar.ac.ke/uploads/events/$event->image" )


@section('content')
    @include('partials.guest.event-header')
     <!--Banner Inner-->
     <section>
        <div class="lgx-banner lgx-banner-inner" style="background-image: url('{{ asset('uploads/events') }}/{{ $event->image }}');">
            <div class="lgx-page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading-area">
                                <div class="lgx-heading lgx-heading-white">
                                    <h2 class="heading" style="text-shadow: 5px 2px #000000;">{{ $event->title}}</h2>
                                </div>
                                <ul class="breadcrumb" style="text-shadow: 1px 1px #000000;">
                                    <li><a href="{{ route('guest.home') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li class="active">{{ Illuminate\Support\Str::substr($event->title, 0, 100) }}</li>
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
                                    <div class="text-area">
                                        <div class="speaker-info">
                                            <h1 class="title">{{ $event->venue . ' | '. date('d', strtotime($event->start_time)) . '-' . date('d F, Y', strtotime($event->end_time))}}</h1>
                                            {{-- <h4 class="subtitle">{{ $event->title }}</h4> --}}
                                        </div>
                                    </div>
                                </header>
                                <section>
                                    <p>
                                        {!! $event->description !!}
                                    </p>
                                </section>

                                <div class="section-btn-area">
                                    <a href="{{ route('auth.register') }}" class="lgx-btn lgx-btn-red">Register</a>
                                    @if($event->cfp_file != NULL)
                                        <a href="{{ asset('uploads/abstracts') }}/{{ $event->cfp_file }}" target="_blank" class="lgx-btn lgx-btn-white text-white" style="background: orange">Download Call for Papers (PDF)</a>
                                    @endif
                                    @if($event->abstract_link != NULL)
                                        <a href="{{ $event->abstract_link }}" target="_blank" class="lgx-btn btn-danger">Submit Abstract</a>
                                    @endif
                                </div>
                                
                            </article>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </section>
            <!--News END-->
        </div>
    </main>

@endsection
