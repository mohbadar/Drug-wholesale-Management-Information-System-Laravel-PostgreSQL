<!--================================================================================
  Product Name: University Management System
  Version: 1.0
  Developer :Mohammad Badar Hashimi
  Phone : +093-794035544
  Address: Kabul , Afghanistan

  Authors Email:  mohammadbadarhashimi@gmail.com
  ================================================================================ -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
            <meta name="msapplication-tap-highlight" content="no"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ URL::asset('assets/images/ministrylogo.png') }}">

    <title>Behrooz-@yield('title')</title>

    <!-- ================================================
    CSS
    ================================================ -->
    <!-- CORE CSS-->
    <link href="{{ URL::asset('assets/css/materialize.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/style.css') }}" type="text/css" rel="stylesheet">
    <!-- CSS style Horizontal Nav (Layout 03)-->
    <link href="{{ URL::asset('assets/css/style-horizontal.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/desk_top_sideNav.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/font/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/animate.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/dropify/css/dropify.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/js/plugins/sweetalert/sweetalert.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/persianDatepicker-default.css') }}" type="text/css" rel="stylesheet">
    <link rel='stylesheet prefetch' href="{{ URL::asset('assets/tinymce/js/tinymce/skins/lightgray/skin.min.css') }}">
    <!-- Custome CSS-->
    <link href="{{ URL::asset('assets/css/custom.css') }}" type="text/css" rel="stylesheet">
   <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-1.11.2.min.js') }}"></script> 
    <!--     additional links -->
    @yield('links')
    </head>
