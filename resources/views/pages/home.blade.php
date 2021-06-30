@extends('templates.mainTemplate')

@section('style')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('public/front/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="public/css/ourservices.css">
    <link rel="stylesheet" href="public/css/home.css">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
@endsection

@section('content')
    <header>
         <!-- bootstrap for spacing py-lg-5 py-md-3 py-1-->
        <div class="container-fluid top-header-banner">
            <div class="color-overlay"></div>
            <div class="row">
                <div class="content-body text-center" style="z-index: 1;">
                    <h1 class="text-white font-weight-bold text-break py-5 heading-1">Welcome to My Class Of</h1>
                </div>  
            </div>
        </div>
    </header>
    <div class="container py-5">
           <div class="row p-5">
                <div class="col-lg-6 col-md-6 px-3">
                    <h1 class="intro-heading">Welcome Grads!</h1>
                    <hr class="hr-intro">
                    <p class="intro-para" id="intro-para">We are so glad to have you! My Class Of ®
                    is an online website for Graduates, by Graduates – High School, College, Trade School and everything in between – to enable them in planning your graduation and future and more! Create your free account today to see all we have to offer!
                    We are here to help Grads’ lives – so tell us how we can help you today!</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <video width="90%" controls loop>
                        <source src="{{ asset('public/images/WhoWeAre.MP4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
    </div>
    <!--<div class="container-fluid">-->
        <div class="text-center">
            <h1>Our Services</h1>
        </div>
    <!--    <div class="row m-5">-->
    <!--        <div class="col-md-4">-->
    <!--            <div class="box">-->
    <!--                <div class="our-services settings">-->
    <!--                    <div class="icon"> <img src="https://i.imgur.com/6NKPrhO.png"></div>-->
    <!--                    <h4>Settings</h4>-->
    <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-md-4">-->
    <!--            <div class="box">-->
    <!--                <div class="our-services speedup">-->
    <!--                    <div class="icon"> <img src="https://i.imgur.com/KMbnpFF.png"> </div>-->
    <!--                    <h4>Speedup</h4>-->
    <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-md-4">-->
    <!--            <div class="box">-->
    <!--                <div class="our-services privacy">-->
    <!--                    <div class="icon"> <img src="https://i.imgur.com/AgyneKA.png"> </div>-->
    <!--                    <h4>Privacy</h4>-->
    <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="row m-5">-->
    <!--        <div class="col-md-4">-->
    <!--            <div class="box">-->
    <!--                <div class="our-services backups">-->
    <!--                    <div class="icon"> <img src="https://i.imgur.com/vdH9LKi.png"> </div>-->
    <!--                    <h4>Backups</h4>-->
    <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-md-4">-->
    <!--            <div class="box">-->
    <!--                <div class="our-services ssl">-->
    <!--                    <div class="icon"> <img src="https://i.imgur.com/v6OnUqu.png"> </div>-->
    <!--                    <h4>SSL secured</h4>-->
    <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-md-4">-->
    <!--            <div class="box">-->
    <!--                <div class="our-services database">-->
    <!--                    <div class="icon"> <img src="https://i.imgur.com/VzjZw9M.png"> </div>-->
    <!--                    <h4>Database</h4>-->
    <!--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="row offers-first-row">
        <div class="container-fluid">
            <div class="row offers-boxes">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <i class="fa fa-users"></i>
                    <h6 class="small-boxes-heading">Communication From Anywhere</h6>
                    <p class="small-boxes-para">Keep your friends and family updated at anytime, from anywhere, with your fingertips!</p>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <i class="fa fa-bank"></i>
                    <h6 class="small-boxes-heading">Safe and Secure Grad Gift Fund</h6>
                    <p class="small-boxes-para">Link a bank account (checking or savings) safely and securely to your My Class Of account and receive monetary gifts via PayPal integrations.</p>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <i class="fa fa-microphone"></i>
                    <h6 class="small-boxes-heading">Tell Your Story</h6>
                    <p class="small-boxes-para">Everyone has a story to tell, use your pages to tell YOUR story about yourself, your time, and where you’re going..</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <i class="fa fa-check"></i>
                    <h6 class="small-boxes-heading">Next Steps for Your Future</h6>
                    <p class="small-boxes-para">If you’re done with college, or it isn’t your next step, we have options for you to consider! We’ve been where you are, and we’re here to help!</p>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <i class="fa fa-tag"></i>
                    <h6 class="small-boxes-heading">Wish Lists Integration</h6>
                    <p class="small-boxes-para">Tell your friends and family what you need for your next steps! Create as many wish lists as you need, so they will know what you need for Graduation gifts!</p>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <i class="fa fa-laptop"></i>
                    <h6 class="small-boxes-heading">Your Design Freedom</h6>
                    <p class="small-boxes-para">We provide many options for you to choose your favorite designs! Paid and Unpaid options. Make this your website, uniquely yours.</p>
                </div>
            </div>
        </div>
    </div>

<section class="">
    <div class="container py-5 why-were-here">
      
          <!-- FOR DEMO PURPOSE -->
          <header class="text-center mb-5">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <h1 class="text-white">Why We're Here</h1>
                </div>
            </div>
          </header>
          <!-- END -->
      
      
      
        <div class="row text-center l-5">
            <div class="col-lg-3">
              <div class="bg-white py-5 rounded-lg shadow px-4">
                <p>Number of Colleges in the World</p>
                <h1 class="text-primary">5100</h1>
              </div>
            </div>
            
            <div class="col-lg-3">
                <div class="bg-white py-5 rounded-lg shadow px-4">
                    <p>Number of High Schools in the World</p>
                    <h1 class="text-primary">24181</h1>
              </div>
            </div>
            
            <div class="col-lg-3">
              <div class="bg-white py-5 rounded-lg shadow px-4">
                    <p>Number of Trade Schools in the Us</p>
                    <h1 class="text-primary">250</h1>
              </div>
            </div>
            
            <div class="col-lg-3">
              <div class="bg-white py-5 rounded-lg shadow px-4">
                    <p>My Class Of's Level of Passion to Help</p>
                    <h1 class="text-primary">150</h1>
              </div>
            </div>
      
        </div>
    </div>
</section>
<!-- PRICING PLAN -->

<section>
    <div class="container py-5">
      
          <!-- FOR DEMO PURPOSE -->
          <header class="text-center mb-5">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <h1>Subscriptions</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <p>Though you can register for a completely free account, check out the subscription options for our registered users.</p>
                </div>
            </div>
          </header>
          <!-- END -->
      
      
      
        <div class="row text-center">
            <div class="col-lg">
              <div class="bg-white py-5 rounded-lg shadow px-4">
                <div class="row">
                      <div class="col-12">
                         <h1 class="h6 text-uppercase font-weight-bold mb-4">Freshman</h1>
                         <h2 class="h1 font-weight-bold">Free</h2>
                        <div class="custom-separator my-4 mx-auto bg-secondary"></div>
                         <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                          <li class="mb-3">
                            <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Basic color themes for your profile</li>
                          <li class="mb-3">
                            <i class="fa fa-check" style="color:rgb(0,242,96);"></i> Add up to 10 pictures to your profile</li>
                          <li class="mb-3 text-muted">
                            <i class="fa fa-times mr-2"></i>
                            <del> Customize the design of your profile</del>
                          </li>
                          <li class="mb-3 text-muted">
                            <i class="fa fa-times mr-2"></i>
                            <del>Contact family and friends via email and text through MyClassOf</del>
                          </li>
                          <li class="mb-3 text-muted">
                            <i class="fa fa-times mr-2"></i>
                            <del>Access to our job placement services</del>
                          </li>
                        </ul>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-block p-2 shadow rounded-pill">Subscribe</a>
              </div>
            </div>
            <!-- Subscription Table-->
            <div class="col-lg">
              <div class="bg-white py-5 rounded-lg shadow px-4">
                <div class="row">
                      <div class="col-12">
                         <h1 class="h6 text-uppercase font-weight-bold mb-4">Sophomore</h1>
                         <h2 class="h1 font-weight-bold">$5<span class="text-small font-weight-normal ml-2">/ month</span></h2>
                        <div class="custom-separator my-4 mx-auto bg-secondary"></div>
                         <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                          <li class="mb-3">
                            <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Extra color themes for your profile</li>
                          <li class="mb-3">
                            <i class="fa fa-check" style="color:rgb(0,242,96);"></i> Add up to 50 pictures to your profile</li>
                          <li class="mb-3 text-muted">
                            <i class="fa fa-times mr-2"></i>
                            <del> Customize the design of your profile</del>
                          </li>
                          <li class="mb-3 text-muted">
                            <i class="fa fa-times mr-2"></i>
                            <del>Contact family and friends via email and text through MyClassOf</del>
                          </li>
                          <li class="mb-3 text-muted">
                            <i class="fa fa-times mr-2"></i>
                            <del>Access to our job placement services</del>
                          </li>
                        </ul>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-block p-2 shadow rounded-pill">Subscribe</a>
              </div>
            </div>
            <!-- END -->
      
      
            <!-- Pricing Table-->
            <div class="col-lg">
                <div class="bg-white py-5 rounded-lg shadow px-4">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="h6 text-uppercase font-weight-bold mb-4">Junior</h1>
                            <h2 class="h1 font-weight-bold">$15<span class="text-small font-weight-normal ml-2">/ month</span></h2>
                  
                            <div class="custom-separator my-4 mx-auto bg-secondary"></div>
      
                            <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                              <li class="mb-3">
                                <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Extra color themes for your profile</li>
                              <li class="mb-3">
                                <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Add up to 500 pictures to your profile</li>
                              <li class="mb-3">
                                <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Customize the design of your profile</li>
                              <li class="mb-3">
                                <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Contact family and friends via email and text through MyClassOf</li>
                              <li class="mb-3 text-muted">
                                <i class="fa fa-times mr-2"></i>
                                <del>Access to our job placement services</del>
                              </li>
                            </ul>
                         </div>
                       </div>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-block p-2 shadow rounded-pill">Subscribe</a>
              </div>
            </div>
            <!-- END -->
      
      
            <!-- Pricing Table-->
            <div class="col-lg">
              <div class="bg-white py-5 rounded-lg shadow px-4">
                    <div class="row">
                        <div class="col-12">
                        <h1 class="h6 text-uppercase font-weight-bold mb-4">Senior</h1>
                        <h2 class="h1 font-weight-bold">$25<span class="text-small font-weight-normal ml-2">/ month</span></h2>
              
                        <div class="custom-separator my-4 mx-auto bg-secondary"></div>
              
                        <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                          <li class="mb-3">
                            <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Access to all color themes for your profile</li>
                          <li class="mb-3">
                            <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Add unlimited pictures to your profile</li>
                          <li class="mb-3">
                            <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Customize the design of your profile</li>
                          <li class="mb-3">
                            <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Contact family and friends via email and text through MyClassOf</li>
                          <li class="mb-3">
                            <i class="fa fa-check mr-2" style="color:rgb(0,242,96);"></i> Access to our job placement services</li>
                        </ul>
                     </div>
                   </div>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-block p-2 shadow rounded-pill">Subscribe</a>
              </div>
            </div>
            <!-- END -->
      
        </div>
        
    </div>
</section>


@endsection
