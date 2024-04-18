<link href="{{ url('adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">
<link href="{{ url('adminlte/css/skins/skin-blue.min.css') }}" rel="stylesheet">
<link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css">
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- The above 3 meta tags *must* come first in the head -->

    <!-- SITE TITLE -->
    <title>
        @yield('title') | Daystar University Conferences
     </title>
      <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="author" content="Daystar University">
     <meta name="description" content="@yield('description')">
     <meta name="keywords" content="Daystar University, Daystar University Conferences">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
     <!--START og for social sharing -->
     <meta property="og:site_name" content="Daystar University Conferences">
     <meta property="og:title" content="@yield('title') | Daystar University Conferences">
     <meta property="og:description" content="@yield('description')">
     <meta property="og:image" itemprop="image" content="@yield('image')">
     <meta property="og:url" content="https://conferences.daystar.ac.ke/" />
     <meta property="og:type" content="website" />
     <!--END og for social sharing -->

    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="@yourtwitterusername"/>
    <meta name="twitter:creator" content="@daystaruni"/>
    <meta name="twitter:url" content="https://conferences.daystar.ac.ke/"/>
    <meta name="twitter:title" content=" @yield('title')"/>
    <!-- maximum 140 char -->
    <meta name="twitter:description" content="@yield('description')"/>
    <!-- maximum 140 char -->
    <meta name="twitter:image" content="@yield('image')"/>
    <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends from here -->

    <!--  FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon2.ico') }}"/>
    <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon2.ico') }}"/>
    <!-- this icon shows in browser toolbar -->
    <!--<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('frontend/assets/img/favicon/apple-icon-57x57.png') }}">-->
    <!--<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('frontend/assets/img/favicon/apple-icon-60x60.png') }}">-->
    <!--<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('frontend/assets/img/favicon/apple-icon-72x72.png') }}">-->
    <!--<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/assets/img/favicon/apple-icon-76x76.png') }}">-->
    <!--<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('frontend/assets/img/favicon/apple-icon-114x114.png') }}">-->
    <!--<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend/assets/img/favicon/apple-icon-120x120.png') }}">-->
    <!--<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('frontend/assets/img/favicon/apple-icon-144x144.png') }}">-->
    <!--<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('frontend/assets/img/favicon/apple-icon-152x152.png') }}">-->
    <!--<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/assets/img/favicon/apple-icon-180x180.png') }}">-->
    <!--<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('frontend/assets/img/favicon/android-icon-192x192.png') }}">-->
    <!--<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/assets/img/favicon/favicon-32x32.png') }}">-->
    <!--<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('frontend/assets/img/favicon/favicon-96x96.png') }}">-->
    <!--<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/assets/img/favicon/favicon-16x16.png') }}">-->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon2.ico') }}"/>
    <link rel="manifest" href="{{ asset('frontend/assets/img/favicon/manifest.json') }}">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/bootstrap/css/bootstrap.min.css') }}" media="all"/>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/fontawesome/css/font-awesome.min.css') }}" media="all"/>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/maginificpopup/magnific-popup.css') }}" media="all"/>

    <!-- Time Circle -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/timer/TimeCircles.css') }}" media="all"/>

    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/owlcarousel/owl.carousel.min.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/libs/owlcarousel/owl.theme.default.min.css') }}" media="all" />

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Oswald:400,700%7cRaleway:300,400,400i,500,600,700,900"/>

    <!-- MASTER  STYLESHEET  -->
    <link id="lgx-master-style" rel="stylesheet" href="{{ asset('frontend/assets/css/style-default.css') }}" media="all"/>

    <!-- MODERNIZER CSS  -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

{{-- <script src="{{ url('js/app.js') }}" type="text/javascript"></script> --}}

{{-- <script src="https://js.stripe.com/v3/" type="text/javascript"></script> --}}