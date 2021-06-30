@extends('templates.mainTemplate')

@section('style')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/gradgift.css">
@endsection

@section('content')
        <div class="container-fluid header-container">
            <div class="color-overlay"></div>
            <div class="row">
                <div class="col-md-12 heading-text">
                        <h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}'s Grad Gifts</h1>
                        <br>
                        <p>Want to help {{ Auth::user()->first_name }} celebrate this big achievement? Check out these great gift ideas you could help put money towards! Regardless of where your graduate is headed after graduation, I'm sure they would be happy to have your support in moving on to their next stage of life!</p>
                </div>
            </div>
        </div>
        
        <div id="gift-options-container">
            @foreach($gifts as $gift)
                <div class="">
                    <label for="amount-{{$gift->id}}" class="gift-card">
                    <img src="/{{$gift->image}}" class="gift-image card-img">
                            <div id="gift-text-{{$gift->id}}" class="gift-text card-img-overlay">
                                <div class="gift-title">{{$gift->title}}</div>
                                <div>${{$gift->price}}</div> <input type="checkbox" id="amount-{{$gift->id}}" class="check-amount" name="amount-{{$gift->id}}" value="{{$gift->price}}" hidden>
                            </div>
                            <div id="gift-description-{{$gift->id}}" class="gift-description card-img-overlay">
                                <div>{{$gift->description}}</div>
                            </div>
                    </label>
                </div>
            @endforeach
            <div class="">
                <label for="other-amount" class="card other-card">
                    <img src="/public/images/grad/graduates.jpg" class="gift-image card-img">
                    <div class="other-gift-text card-img-overlay">
                        <div class="gift-title">Other Amount</div>
                        <input type="number" id="other-amount-number" name="other-amount-number">
                        <button class="other-amount-btn" onClick="addOtherAmount(document.getElementById('other-amount-number').value)">Include Amount</button>
                        <button class="other-amount-btn" onClick="removeOtherAmount()">Remove Amount</button>
                    </div>
                </label>
            </div>
        </div>
            
        <!-- Checkout Section -->
        <form method="POST" action="/checkout/{{ Auth::user()->id }}">
            {{ csrf_field() }}
            <div class="checkout-block" align="center">
                <h1>Checkout</h1>
                <div>
                    Total: $<span id="total-span">0.00</span>
                </div>
                <div id="mco-disclaimer">Disclaimer: A small fee from your transaction will go to MyClassOf</div>
                <textarea id="form-total" name="total_price" hidden>0.00</textarea>
                <textarea id="form-mco-fee" name="mco_fee" hidden>0.00</textarea>
                <input type="submit" value="Proceed to Checkout">
            </div>
        </form>
@endsection

@section('script')
    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- dynamic item rendering -->
    <script src="/public/js/gradgift.js"></script>
@endsection