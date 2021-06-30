@extends('templates.mainTemplate')

@section('style')
    <link rel="stylesheet" href="public/css/dashboard.css">
@endsection

@section('content')
    <div class="background-fix" id="background-fix">
    <div class="my-container text-center">
        <div class="color-overlay"></div>
        <div class="my-div py-5">
                <h1 class="py-4">Welcome, {{Auth::user()->first_name}}, to your personal dashboard!</h1>
                <ul class="nav nav-tabs row py-2 justify-content-center" id="myTab" role="tablist">
                  <li class="nav-item col-6 col-lg-2 d-flex" id="openbtn1">
                    <a class="nav-link active white-icon col" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                      <i class="fas fa-cog" id="icon-tab-nav"></i>
                      <p class="h3 heading3">Account Settings</p>
                    </a>
                  </li>
                  <li class="nav-item col-6 col-lg-2 d-flex">
                    <a class="nav-link white-icon col" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                      <i class="far fa-user" id="icon-tab-nav"></i>
                      <p class="h3 heading3">Public Profile Settings</p>
                    </a>
                  </li>
                  <li class="nav-item col-6 col-lg-2 d-flex">
                    <a class="nav-link white-icon col" id="gradgift-tab" data-toggle="tab" href="#gradgift" role="tab" aria-controls="gradgift" aria-selected="false">
                      <i class="fas fa-gift" id="icon-tab-nav"></i>
                      <p class="h3 heading3">GradGift Settings</p>
                    </a>
                  </li>
                  <li class="nav-item col-6 col-lg-2 d-flex">
                    <a class="nav-link white-icon col" id="upgrade-tab" data-toggle="tab" href="#upgrade" role="tab" aria-controls="upgrade" aria-selected="false">
                      <i class="fas fa-palette" id="icon-tab-nav"></i>
                      <p class="h3 heading3">Upgrades</p>
                    </a>
                  </li>
                  <li class="nav-item col-6 col-lg-2 d-flex">
                    <a class="nav-link white-icon col" id="bankinfo-tab" data-toggle="tab" href="#bankinfo" role="tab" aria-controls="bankinfo" aria-selected="false">
                      <i class="fas fa-money-check-alt" id="icon-tab-nav"></i>
                      <p class="h3 heading3">Bank Info</p>
                    </a>
                  </li>
                </ul>
        </div>
    </div>
    
    <div class="container text-center py-5 opacity">   
        <div class="tab-content card" id="myTabContent">
            
            <!-- Account Settings -->
            <div class="card-body tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="form-group row">
                    <label class="col-3 col-form-label text-right">Current username:</label> 
                    <div class="col-9">
                        <input class="form-control-plaintext" readonly value="{{ Auth::user()->username }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label text-right">Current email:</label> 
                    <div class="col-9">
                        <input class="form-control-plaintext" readonly value="{{ Auth::user()->email }}">
                    </div>
                </div>
                <!-- change username or email -->
                <form action="{{ route('update.profile') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-3 col-form-label text-right">Username:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputUsername" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="staticEmail" class="col-sm-3 col-form-label text-right">Email:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <input class="btn btn-outline-secondary btn-lg" type="submit" value="Update">
                </form>
                
                <!-- change password -->
                <h2 class="text-left pt-4">Change Password</h2>
                <hr class="pb-2"> 
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('change.password') }}">
                        
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right" for="new-password">Current Password:</label>
                            <div class="col-sm-9">
                                <input id="current-password" class="form-control"  type="password" name="current-password" required>
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>    

                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right" for="new-password">New Password:</label>
                            <div class="col-sm-9">
                                <input id="new-password" class="form-control" type="password" name="new-password" required>
    
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label text-right" for="new-password-confirm">Confirm New Password:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="new-password-confirm" type="password" name="new-password_confirmation" required>
                            </div>
                        </div>
                        
                        
                        <button class="btn btn-outline-secondary btn-lg" type="submit">Change Password</button>
                    </form>
                    
                    <!-- toggle privacy settings -->
                    <div>
                        <h2 class="text-left pt-4">Privacy</h2>
                        <hr class="pb-2"> 
                        <form action="/updatePrivacySettings" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <p class="col-12 page-privacy-title">Profile Page</p>
                                <hr class="pb-2"> 
                                <div class="col-6 text-left">Your Profile URL: <a href="/profile/{{ Auth::user()->id }}">www.myclassof.com/profile/{{ Auth::user()->id }}</a></div>
                                @if (Auth::user()->profile_privacy == 1)
                                <div class="col-2">
                                    <label for="profile-privacy">Public</label>
                                    <input type="radio" name="profile_privacy" checked value="1">
                                </div>
                                <div class="col-2">
                                    <label for="profile-privacy">Private</label>
                                    <input type="radio" name="profile_privacy" value="0">
                                </div>
                                @else
                                <div class="col-2">
                                    <label for="profile-privacy">Public</label>
                                    <input type="radio" name="profile_privacy" value="1">
                                </div>
                                <div class="col-2">
                                    <label for="profile-privacy">Private</label>
                                    <input type="radio" name="profile_privacy" checked value="0">
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <p class="col-12 mt-3 page-privacy-title">Grad Gift Page</p>
                                <hr class="pb-2"> 
                                <div class="col-6 text-left">Your GradGift URL: <a href="/gradgift/{{ Auth::user()->id }}">www.myclassof.com/gradgift/{{ Auth::user()->id }}</a></div>
                                @if (Auth::user()->gradgift_privacy == 1)
                                <div class="col-2">
                                    <label for="gradgift-privacy">Public</label>
                                    <input type="radio" name="gradgift_privacy" checked value="1">
                                </div>
                                <div class="col-2">
                                    <label for="gradgift-privacy">Private</label>
                                    <input type="radio" name="gradgift_privacy" value="0">
                                </div>
                                @else
                                <div class="col-2">
                                    <label for="gradgift-privacy">Public</label>
                                    <input type="radio" name="gradgift_privacy" value="1">
                                </div>
                                <div class="col-2">
                                    <label for="gradgift-privacy">Private</label>
                                    <input type="radio" name="gradgift_privacy" checked value="0">
                                </div>
                                @endif
                            </div>
                            <button class="btn btn-outline-secondary btn-lg" type="submit">Update</button>
                        </form>
                    </div>
            </div>
            
            <!-- Profile Settings -->
            <div class="card-body tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h2 class="text-left pt-4">Change Profile Picture</h2>
                <hr class="pb-2">
                <form action="{{ route('profile.change') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row text-center">
                        <label class="col-sm-3" for="exampleFormControlFile1">Choose File</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control-file btn btn-outline-secondary" name="dp_image">
                        </div>
                        <div class="col-5 text-left">
                            <input class="btn btn-outline-secondary btn-lg" type="submit" value="Change">
                        </div>
                    </div>
                </form>
                
                <h2 class="text-left pt-4">About Me</h2>
                <hr class="pb-2">
                <form action="{{ route('update.questions') }}" method="post">
                    {{ csrf_field() }}
                    @foreach($ans as $key => $answer)

                        <div class="each-question text-left px-5">
                            <div class="form-group row">
                                <input type="hidden" value="{{$answer->question_id}}" name="ques_id[]">
                                <p class="col-sm-6 col-form-label ">{{ $answer->Questions->question }}</p>
                                @if($answer->answer === 0)
                                <div class="yes col-sm-3">
                                    <input class="label" data-quesid="{{ $answer->question_id }}" type="radio" name="ans-{{$key}}"
                                           value="1">
                                    <label id="yes">Yes</label>
                                </div>
                                <div class="no col-sm-3">
                                    <input class="label" data-quesid="{{ $answer->question_id }}" type="radio" name="ans-{{$key}}"
                                           checked value="0">
                                    <label id="no">No</label><br>
                                </div>
                                @else
                                <div class="yes col-sm-3">
                                    <input class="label" data-quesid="{{ $answer->question_id }}" type="radio" name="ans-{{$key}}"
                                           checked value="1">
                                    <label id="yes">Yes</label>
                                </div>
                                <div class="no col-sm-3">
                                    <input class="label" data-quesid="{{ $answer->question_id }}" type="radio" name="ans-{{$key}}"
                                           value="0">
                                    <label id="no">No</label><br>
                                </div>
                                @endif
                                <div class="col-sm-12">
                                    <textarea class="w-100 detailed-box txt-box{{$answer->question_id}}" name="deatiled_answer[]">{{ $answer->deatiled_answer }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div>
                        <input class="btn btn-outline-secondary btn-lg" type="submit">
                    </div>
                </form>
            </div>
            
            <!-- GradGift Settings -->
            <div class="card-body tab-pane fade" id="gradgift" role="tabpanel" aria-labelledby="gradgift-tab">
                <h3>Edit Your Grad Gift Page</h3>
                <p class="lead">Create your own gifts to show on your <a href="/gradgift/{{Auth::user()->id}}">Grad Gift Page</a>. If you want to personalize the items that show up on your grad gift page, this is the place to do it!<br>These gifts are just ideas for your friends and family to put money towards buying.</p>
                <h4>Check out these default gift ideas!</h4>
                
                
                <form action="{{ route('addDefaultGifts') }}" method="post">
                    {{ csrf_field() }}
                    <div class="default-gifts-container">
                        @foreach($default_gifts as $default_gift)
                            <div class="default-gift">
                                <input type="hidden" name="gift[]">
                                <div name="title-{{ $default_gift->id }}" class="gift-card-title">{{$default_gift->title}}</div>
                                <input type="hidden" value="{{$default_gift->title}}" name="title-{{ $default_gift->id }}">
                                
                                <div name="price-{{ $default_gift->id }}">${{$default_gift->price}}</div>
                                <input type="hidden" value="{{$default_gift->price}}" name="price-{{ $default_gift->id }}">
                                
                                <div name="description-{{ $default_gift->id }}">{{$default_gift->description}}</div>
                                <input type="hidden" value="{{$default_gift->description}}" name="description-{{ $default_gift->id }}">
                                
                                <img src="public/images/grad/{{$default_gift->image}}" width="50px" name="image-{{ $default_gift->id }}">
                                <input type="hidden" value="public/images/grad/{{$default_gift->image}}" name="image-{{ $default_gift->id }}">
                                <div class="row justify-content-md-center p-2">
                                    <input type="checkbox" id="checkbox-{{ $default_gift->id }}" name="checkbox-{{ $default_gift->id }}" onclick="console.log(document.getElementById('checkbox-{{ $default_gift->id }}').checked)">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <input class="btn btn-outline-secondary btn-lg" type="submit" value="Save">
                </form>
                
                
                <h4>Or make your own!</h4>
                <form action="{{ route('addgradgifts') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right" for="title">Name of Gift</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right" for="description">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" type="text" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-right" for="price">Price</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" name="price">
                        </div>
                    </div>
                    <input class="btn btn-outline-secondary btn-lg" type="submit" value="Add Gift">
                </form>
                
                <h3>Your Grad Gifts</h3>
                @if(count($gifts) > 0)
                <div class="gifts-container">
                    @foreach($gifts as $gift)
                    <div class="gift">
                        <div id="default-view{{$gift->id}}">
                            <div>{{$gift->title}}</div>
                            <div>${{$gift->price}}</div>
                            <div>{{$gift->description}}</div>
                            <button onclick="toggleEdit({{$gift->id}})" class="btn btn-outline-secondary btn-sm">Edit</button>
                            <form action="/deleteGift/{{$gift->id}}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" value="Delete" class="btn btn-outline-secondary btn-sm">
                            </form>
                        </div>
                        
                        <div id="edit-view{{$gift->id}}" class="hide-view">
                            <form action="/editGift/{{$gift->id}}" method="post">
                                {{ csrf_field() }}
                                <label for="giftTitle">Title</label>
                                <input type="text" name="giftTitle" value="{{$gift->title}}">
                                <label for="giftPrice">Price</label>
                                <input type="number" name="giftPrice" value="{{$gift->price}}">
                                <label for="giftDescription">Description</label>
                                <textarea name="giftDescription">{{$gift->description}}</textarea>
                                <input type="submit" value="Save">
                            </form>
                            <button onclick="toggleEdit({{$gift->id}})">Cancel</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                    <div>You haven't made any personal grad gifts yet.</div>
                @endif
            </div>
            
            <!-- Wishlist Settings -->
            <div class="card-body tab-pane fade" id="upgrade" role="tabpanel" aria-labelledby="upgrade-tab">
                <h2>Current Membership: 
                    @if( Auth::user()->membership_tier == 0 )
                        Freshman
                    @elseif( Auth::user()->membership_tier == 1 )
                        Sophomore
                    @elseif( Auth::user()->membership_tier == 2 )
                        Junior
                    @elseif( Auth::user()->membership_tier == 3 )
                        Senior
                    @endif
                </h2>
                <h3 class="text-left pt-4">Upgrade Options</h3>
                <hr class="pb-2">
                <div class="form-group row">
                    <label class="col-3 col-form-label text-right">Sophomore ($5/month):</label>
                    <div class="col-4 text-left">You'll have access to 3 different profile themes, and you can add up to 50 pictures to your profile.</div>
                    @if( Auth::user()->membership_tier >= 1 )
                        <div>Owned</div>
                    @else
                        <input class="btn btn-outline-secondary btn-lg" type="submit" value="Upgrade" style="height: 60px;">
                    @endif
                </div>
                
                <div class="form-group row">
                    <label class="col-3 col-form-label text-right">Junior ($15/month):</label>
                    <div class="col-4 text-left">You can access all Sophomore bonuses as well as unlimited pictures, more customizable themes, and the ability to notify your family and friends who follow you about any of your graduation updates.</div>
                    @if( Auth::user()->membership_tier >= 2 )
                        <div>Owned</div>
                    @else
                        <input class="btn btn-outline-secondary btn-lg" type="submit" value="Upgrade" style="height: 60px;">
                    @endif
                </div>
                
                <div class="form-group row">
                    <label class="col-3 col-form-label text-right">Senior ($25/month):</label>
                    <div class="col-4 text-left">You get all previous tiers as well as extra storage for pictures, and you'll have access to our job placement portal.</div>
                    @if( Auth::user()->membership_tier >= 3 )
                        <div>Owned</div>
                    @else
                        <input class="btn btn-outline-secondary btn-lg" type="submit" value="Upgrade" style="height: 60px;">
                    @endif
                </div>
            </div>
            
            
            <div class="card-body tab-pane fade" id="bankinfo" role="tabpanel" aria-labelledby="bankinfo-tab">
                <h2>Stripe Account</h2>
                @if( Auth::user()->stripe_account != null )
                    <p>You already have a stripe account with us.</p>
                @endif
                <form action="{{ route('createStripeAccount') }}" method="post">
                    {{ csrf_field() }}
                    <h4>Account Info</h4>
                    <div class="form-group row">
                        <!--<label for="first_name" class="col-sm-1 col-form-label text-right">First Name:</label>-->
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">
                        </div>
                        
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="billing_address" placeholder="Billing Address" name="billing_address">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="city" placeholder="City" name="city">
                        </div>
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="state" placeholder="State" name="state">
                        </div>
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="postal_code" placeholder="Zip Code" name="postal_code">
                        </div>
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="country" value="United States" name="country">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="day" placeholder="Birth Day" name="day">
                        </div>
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="month" placeholder="Birth Month" name="month">
                        </div>
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="year" placeholder="Birth Year" name="year">
                        </div>
                        
                    </div>
                    
                    <div class="form-group row">
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ssn" placeholder="Last 4 digits of SSN" name="ssn">
                        </div>
                        <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
                        </div>
                        <!--<div class="help-tip">-->
                        <!--    <p>This is code for explaining why we're asking for ssn</p>-->
                        <!--</div>-->
                    </div>
                    
                    <h4>Bank Info</h4>
                    <div class="form-group row justify-content-md-center">
                        <div class="col">
                            <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                            <div class="col-sm-12 mb-3">
                                <input type="text" class="form-control" id="rout_num" placeholder="Routing Number" name="rout_num">
                            </div>
                            <!--<label for="last_name" class="col-sm-1 col-form-label text-right">Last Name:</label>-->
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="acc_num" placeholder="Account Number" name="acc_num">
                            </div>
                        </div>
                        <div class="col">
                            <img src="public/images/check_example.jpg">
                        </div>
                    </div>
                    
                    <div class="row">
                        <input type="checkbox" class="form-control col-2 text-right" style="height: 20px;" id="tos" name="tos">
                        <label  class="col text-left" for="tos">I have read and agree to Stripe's <a href="https://stripe.com/legal" target="blank">Services Agreement</a> and <a href="https://stripe.com/privacy" target="blank">Privacy Policy</a>, and My Class Of's <a href="/privacy" target="blank">Privacy Policy</a>.</label>
                    </div>
                    <input class="btn btn-outline-secondary btn-lg" type="submit" value="Create Account">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="/public/js/dashboard.js"></script>
    
@endsection