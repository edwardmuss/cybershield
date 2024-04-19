    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- The above 3 meta tags *must* come first in the head -->

    <!-- SITE TITLE -->
    <title>
        @yield('title') | Conferences
     </title>
      <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="author" content="Daystar University">
     <meta name="description" content="@yield('description')">
     <meta name="keywords" content="Daystar University, Conferences">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
     <!--START og for social sharing -->
     <meta property="og:site_name" content="Conferences">
     <meta property="og:title" content="@yield('title') | Conferences">
     <meta property="og:description" content="@yield('description')">
     <meta property="og:image" itemprop="image" content="@yield('image')">
     <meta property="og:url" content="https://cybershield.daystar.ac.ke/" />
     <meta property="og:type" content="website" />
     <!--END og for social sharing -->

    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="@yourtwitterusername"/>
    <meta name="twitter:creator" content="@daystaruni"/>
    <meta name="twitter:url" content="https://cybershield.daystar.ac.ke/"/>
    <meta name="twitter:title" content=" @yield('title')"/>
    <!-- maximum 140 char -->
    <meta name="twitter:description" content="@yield('description')"/>
    <!-- maximum 140 char -->
    <meta name="twitter:image" content="@yield('image')"/>
    <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends from here -->

    <!--  FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png') }}"/>
    <link rel="manifest" href="{{ asset('frontend/assets/img/favicon/manifest.json') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="{{ url('adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet"
      href="{{ url('quickadmin/css') }}/select2.min.css"/> --}}
<link href="{{ url('adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">
<link href="{{ url('adminlte/css/skins/skin-blue.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.min.css"/>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous"> --}}

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #02aeee;
      border: 1px solid #02aeee;
      border-radius: 4px;
      cursor: default;
      float: left;
      margin-right: 5px;
      margin-top: 5px;
      padding: 0 5px;
}
.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
        border: 1px solid #d2d6de;
        border-radius: 0;
        padding: 12px 12px;
        height: 50px;
    }
</style>