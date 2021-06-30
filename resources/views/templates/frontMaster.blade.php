<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--<title>{{ config('app.name', 'Laravel') }}</title>-->
    <title>My Class Of</title>



    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('public/front/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/front/css/style1.css') }}">
    @yield('style')
</head>
<body>
<div id="app">
        <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="mainNav">
        <div class="container-fluid">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">
              <img src="{{ asset('public/front/img/logo1.png') }}" class="nav-logo-img">&nbsp;&nbsp;&nbsp;My Class Of
            </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/whoweare">Who We Are</a>
              </li>
              </ul>
          </div>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <!-- <a class="nav-link js-scroll-trigger" href="#">Login</a> -->
                <button class="round-button"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></button>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
              </li>
              </ul>
          </div>
        </div>
      </nav>
      <!-- Navigation bar end -->
    <main>
        @yield('content')
    </main>
</div>
<footer>
    <div class="container-fluid footer-container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h2>The Fine Print</h2>
                <div class="row">
                    <a href="legal.html" class="important-links">Legal Notice </a>
                </div>
                <div class="row">
                    <a href="condition.html" class="important-links">Conditions of Use </a>
                </div>
                <div class="row">
                    <a href="privacy.html" class="important-links">Privacy Notice </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <h2>My Class Of <span style="font-size: 15px; vertical-align: text-top;">®</span></h2>
                <div class="row">
                    <a href="whoweare.html" class="important-links">Who We Are </a>
                </div>
                <div class="row">
                    <a href="ourservices.html" class="important-links">Our Services </a>
                </div>
                <div class="row">
                    <a href="http://dev.myclassof.com/public/support" class="important-links">Support </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <h2>Find us</h2>
                <div class="row">
                    <a href="#" class="important-links">P O Box 252 Bartlett, TN 38134</a>
                </div>
                <div class="row">
                    <a href="contactus.html" class="important-links">Contact us  </a>
                </div>
                <p>Call us +1  (901) 213-8171</p>
                <div class="row">
                    <a href="https://www.facebook.com/myclassof" class="fa fa-facebook"></a>
                    <a href="https://twitter.com/myclassof" class="fa fa-twitter"></a>
                    <a href="https://instagram.com/myclassof" class="fa fa-instagram"></a>
                    <a href="https://pinterest.com/myclassofreal" class="fa fa-pinterest "></a>
                </div>
            </div>
        </div>
        <div class="row">
            <h6 class="website-credit">Copyright © 2020 myclassof</h6>
        </div>
    </div>
</footer>
<script src="{{ asset('public/front/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/front/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@yield('script')
</body>
</html>
