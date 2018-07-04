<!DOCTYPE html>
<html lang="en">

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
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  
  <!-- Favicons-->
  <link rel="icon" href="/images/favicon/favicon-32x32.png'" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="{{url('assets/images/apple-touch-icon-152x152.png')}}">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  
  <title>Drug Whole Sale System</title>


  <!-- CORE CSS-->
  
  <link href="{{url('assets/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{url('assets/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{url('assets/css/custom-style.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- CSS style Horizontal Nav (Layout 03)-->    
    <link href="{{url('assets/css/style-horizontal.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{url('assets/css/page-center.css')}}" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="{{url('assets/css/prism.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">

<!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->


 <div id="login-page" class="row">


  <div class="col s12 z-depth-4 card-panel">
      <div class="card-panel">
      <div><h4 class="center" style="color:green">ولایت غور</h4></div>
      <div><h5 class="center" style="color:green">ریاست صحت عامه</h5></div>
      <div><h5 class="center" style="color:green">عمده فروشی بهروز</h5></div>
      </div>

    <div class="col s12 z-depth-4  card-panel">
      <form class="login-form" onsubmit="return login_form_validation()" id="first-login-form" method="post" action="{{route('login')}}" class="">
        <div id="login-page-offset">
        </div>
        <div class="row">
         
        </div>
        <input type="hidden" name="_token" value={{ Session::token() }}>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person prefix"></i>
            <input id="email" name="email" type="text">
            <label for="email" class="center-align">آي دی کاربری</label>
            
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock prefix"></i>
            <input id="password" name="password" type="password">
            <label for="password">پسورد</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button id="login-button" type="submit" class="btn waves-effect waves-light col s12">ورود به سیستم</button>
          </div>
        </div>
      </form>
    </div>
  </div>





  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="{{url('assets/js/jquery-1.11.2.min.js')}}"></script>
  <!--materialize js-->
  <script type="text/javascript" src="{{url('assets/js/materialize.js')}}"></script>
  <!--prism-->
  <script type="text/javascript" src="{{url('assets/js/prism.js')}}"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="{{url('assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="{{url('assets/js/plugins.js')}}"></script>

</body>


<!-- Mirrored from demo.geekslabs.com/materialize/v2.1/layout03/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Aug 2015 16:06:31 GMT -->
</html>