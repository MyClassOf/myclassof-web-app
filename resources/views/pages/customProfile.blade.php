@extends('templates.mainTemplate')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('public/images'."/".Auth::user()->image) }}" class="img-fluid">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h4> {{ Auth::user()->username }}</h4>
                </div>
                <div class="row pt-4">
                    <h4> {{ Auth::user()->email }}</h4>
                </div>
                <div class="row pt-4">
                    <a href="https://www.amazon.com/gp/registry/wishlist/ref=cm_gift_wl_ad" class="btn-next">Amazon
                        Wishlist</a>
                </div>
            </div>
        </div>
        <div class="row pt-4 pb-4">
            <div class="col-md-4">
                <form action="{{ route('profile.change') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="dp_image"><br>
                    <input type="submit" class="btn-next mt-1" value="Change">
                </form>
            </div>
        </div>

        <div class="row">
            @foreach($ans as $answer)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $answer->Questions->question }}</h5>
                            <p class="card-text">{{ $answer->answer == 1 ? "Yes" : "No" }}</p>
                            <p class="card-text">{{ $answer->deatiled_answer }}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
