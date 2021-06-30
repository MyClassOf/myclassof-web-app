@extends('templates.mainTemplate')

@section('style')
    <link rel="stylesheet" href="/public/css/profile.css">
@endsection

@section('content')
    @if($user_info[0]->gradgift_privacy == 0)
        <div>This user has made this page private</div>
    @else
    <!-- Profile Picture Section -->   
    <section class="py-5 who_we_are">
        <div class="color-overlay"></div>
        <div class="container pt-5">
            <div class="row pt-5">
                
                <div class="col-12 text-center">
                    <div class="text-center">
                        <img src="{{ asset('public/images'."/".$user_info[0]->image) }}" class="profile-image">
                    </div>
                </div>
                
                <div class="col-12 text-center text-white py-5">
                    <div class="profile-info ">
                        <div class="username">
                            <h2>{{ $user_info[0]->first_name }} {{ $user_info[0]->last_name }}</h2>
                        </div>
                        <div>
                            <h4 class="username">{{ $user_info[0]->username }}</h4>
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
                    <div><span class="label-text">Email:</span> {{ $user_info[0]->email }}</div>
                    <div><span class="label-text">Education Level:</span> {{ $user_info[0]->education_level }}</div>
                    <div><span class="label-text">Degree:</span> {{ $user_info[0]->degree }}</div>
                    <div><span class="label-text">Graduation year:</span> {{ $user_info[0]->graduation_year }}</div>
                    
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
    @endif
@endsection