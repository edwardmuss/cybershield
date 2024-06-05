@extends('layouts.guest')
@section( 'title', "Resources" )
@section( 'description', "Download The Conference Resources such as the programmes of of Abstract...")
@section( 'image', "https://www.daystar.ac.ke/cybershield-conference/uploads/events/1712906458_tech-bg.jpg" )

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
                                    <h2 class="heading">Resources</h2>
                                </div>
                                <ul class="breadcrumb">
                                    <li><a href="{{ route('guest.home') }}"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li class="active">Resources</li>
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
                        <div class="col-md-12">
                            <table class="table lgx-table2 table-stripped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Conference Programme</td>
                                        <td> <a href="{{ asset('uploads') }}/abstracts/Global cybershield conference program 2024.pdf" target="_blank">Download</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Book of Abstract</td>
                                        <td> <a href="{{ asset('uploads') }}/abstracts/Global cybershield conference abstruct presentation order 2024.pdf" target="_blank">Download</a></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    

                </div>
            </section>
        </div>
    </main>

@endsection