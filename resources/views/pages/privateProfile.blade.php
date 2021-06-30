@extends('templates.mainTemplate')

@section('style')
    <link rel="stylesheet" href="/public/css/profile.css">
@endsection

@section('content')
    <!-- Profile Picture Section -->   
    <section class="py-5 who_we_are">
        <div class="color-overlay"></div>
        <div class="container pt-5">
            <div class="row pt-5">
                
                <div class="col-12 text-center">
                    <div class="text-center">
                        <img src="{{ asset('public/images'."/".Auth::user()->image) }}" class="profile-image">
                    </div>
                </div>
                
                <div class="col-12 text-center text-white py-5">
                    <div class="profile-info ">
                        <div class="username">
                            <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                        </div>
                        <div>
                            <h4 class="username">{{ Auth::user()->username }}</h4>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
        
    <div class="container-fluid"> 
        <div class="row p-5">
                <div class="col profile-details p-3">
                    <h3 class="section-title">Basic Info</h3>
                    <div><span class="label-text">Email:</span> {{ Auth::user()->email }}</div>
                    <div><span class="label-text">Education Level:</span> {{ Auth::user()->education_level }}</div>
                    <div><span class="label-text">Degree:</span> {{ Auth::user()->degree }}</div>
                    <div><span class="label-text">Graduation year:</span> {{ Auth::user()->graduation_year }}</div>
                    
                    <div class="wishlist">
                        @if($ans[12]->answer === 1)
                        <a href="{{ $ans[12]->deatiled_answer }}" class="wishlist-button" target="blank">My Amazon Wishlist</a>
                        @endif
                    </div>
                </div>
        
                <div class="col questions p-3">
                    <h3 class="section-title">About Me</h3>
                    @foreach($ans as $answer)
                        @if($answer -> question_id < count($ans))
                            @if($answer->answer === 1)
                                <div class="each-question">
                                    <h5 class="question">{{ $answer->Questions->question }}</h5>
                                    <p class="answer">{{ $answer->deatiled_answer }}</p>
                                </div>
                            @endif
                       @endif
                    @endforeach
                </div>
        </div>
    </div>
@endsection