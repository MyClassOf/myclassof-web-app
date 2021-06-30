<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Class Of</title>
    <link rel="icon" href="/public/favicon.ico" type="image/x-icon">

    <!-- Fonts and Bootstrap -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    

    <!-- Styles -->
    <link href="{{ asset('/public/css/template.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/public/css/preloader.css') }}" rel="stylesheet" type="text/css">
    <style>
        .navbar-fixed-top.scrolled {
        background: linear-gradient(to right, rgba(5,117,230,0.8), rgba(0,242,96,0.8));
        transition: background-color 200ms linear;
        }
        #loader 
        {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <script>
        var myVar;

        function myFunction() 
        {
          myVar = setTimeout(showPage, 2000);
        }

        function showPage() 
        {
          document.getElementById("loader").style.display = "none";
        }
</script>
    @yield('style')
</head>

<body  onload="myFunction()">
<!---PRE LOADER---->
<div id="loader">
<!--<img src="public/images/preloader.gif" alt="preloader" class="img-fluid">-->
<div class="preloader-background" >
	<div class="cssload-dots">
		<div class="cssload-dot"></div>
		<div class="cssload-dot"></div>
		<div class="cssload-dot"></div>
		<div class="cssload-dot"></div>
		<div class="cssload-dot"></div>
	</div>
	
	<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
		<defs>
			<filter id="goo">
				<feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="12" ></feGaussianBlur>
				<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0	0 1 0 0 0	0 0 1 0 0	0 0 0 18 -7" result="goo" ></feColorMatrix>
				<!--<feBlend in2="goo" in="SourceGraphic" result="mix" ></feBlend>-->
			</filter>
		</defs>
	</svg>
</div>	
</div>

<!-- HEADER/NAVBAR -->
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-fixed-top fixed-top">
            <div class="container">

                <a class="navbar-brand" href="/home">
                    <img class="logo-img" src="{{ asset('public/images/logo.png') }}" height="80">
                    My Class Of
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="navbar-link" href="/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-link" href="/whoweare">Who We Are</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="navbar-link" href="/mygradgift">My Grad Gift</a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-link" href="/myprofile">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-link" href="{{ route('dashboard') }}">My Dashboard</a>
                        </li>
                        @endauth
                    </ul>
                    <ul class="navbar-nav ml-auto">
                    <!--Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="navbar-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <img src="/public/images/{{ Auth::user()->image }}" class="nav-profile-picture">
                                <a id="navbarDropdown" class="navbar-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/myprofile">My Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" id="logout-button"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<!-- END HEADER/NAVBAR -->

<!-- MAIN BODY CONTENT -->
    @yield('content')
    
<!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            
            <div class="row py-4">
                <div class="col-lg-3 col-style col-md-12 col-sm-12">
                    <h1 class="footer-headings">The Fine Print</h1>
                    <ul>
                      <li><a href="/legal" class="important-links">Legal Notice </a></li>
                      <li><a href="/conditions" class="important-links">Conditions of Use </a></li>
                      <li> <a href="/privacy" class="important-links">Privacy Notice </a></li>
                    </ul>                                                                                           
                </div>
                <div class="col-lg-3 col-style col-md-12 col-sm-12">
                    <h1 class="footer-headings">My Class Of<span style="font-size:10px">®</span></h1>
                    <ul>
                      <li><a href="/whoweare" class="important-links">Who We Are </a></li>
                      <li><a href="/ourservices" class="important-links">Our Services </a></li>
                      <!--<li><a href="/support" class="important-links">Support </a></li>-->
                    </ul>
                </div>
                <div class="col-lg-3 col-style col-md-12 col-sm-12">
                    <h1 class="footer-headings">Find Us</h1>
                    <ul>
                        <li><a href="/contactus" class="important-links">Contact us</a></li>
                        <li>P O Box 252 Bartlett, TN 38134</li>
                        <li>+1  (901) 213-8171</li>
                    </ul>  
                </div>
                <div class="col-lg-3 col-style col-md-12 social col-sm-12">
                    <h1 class="footer-headings">Follow Us on our Socials</h1>
                    <a href="https://www.facebook.com/myclassof" class="fa fa-facebook fa-2x" style="color:blue;" target="blank"></a>
                    <a href="https://twitter.com/myclassof" class="fa fa-twitter fa-2x" style="color:#03a9fc;" target="blank"></a>
                    <a href="https://instagram.com/myclassof" class="fa fa-instagram fa-2x" style="color:#ef3974" target="blank"></a>
                    <a href="https://pinterest.com/myclassofreal" class="fa fa-pinterest fa-2x" style="color:red;" target="blank"></a>
                </div>
            
            
            </div>
                <div class="clearfix py-2"></div>
                <h6 class="website-credit">Copyright © 2020 MyClassOf</h6>
        </div>  
    </footer>
<!-- END OF FOOTER -->

<!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        $(function () {
          $(document).scroll(function () {
            var $nav = $(".navbar-fixed-top");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
          });
        });
    </script>
    <!-- BotPenguin bot script starts here -->
    <script id="Ym90cGVuZ3VpbkFwaQ" src="https://cdn.botpenguin.com/bot.js?apiKey=GdVdm%28-%3E%29VsCVCWo%7ED6X%3El" async></script>
    <!-- BotPenguin bot script ends here -->
    @yield('script')
</body>

</html>
