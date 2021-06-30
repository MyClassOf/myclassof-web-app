@extends('templates.mainTemplate')

@section('style')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/checkout.css">
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
    <!--<div>Checkout page</div>-->
    <!--<a href="">Cancel</a>-->
    <h1>Redirecting</h1>
    <div id="session_id">{{ $id }}</div>
    <div>{{ $checkout_session }}</div>
    <button id="checkout-button" style="padding: 30px;">Checkout</button>
    <button id="checkout-session" style="padding: 30px;" onclick="getCheckoutSession()">Get Checkout</button>
@endsection

@section('script')
    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        let stripe = Stripe('pk_test_51HMagKF0gpNxTBlR0lYxtRjVJTwYmnLTuuatNYAMx4fBzHB6VuHvo9QVbHwOCUpAb0cUYzmKxoudjQxOg0pdWVYr00GAI7kubW');
        let session_id = document.getElementById('session_id').innerText;
        console.log(session_id);
        
        function getCheckoutSession(){
            fetch(`/getcheckout`)
                .then(data=>data.json())
                .then(resp=>console.log(resp))
        }
        

        let checkoutButton = document.getElementById('checkout-button');
        
        checkoutButton.addEventListener('click', function() {
          stripe.redirectToCheckout({
            sessionId: session_id
          }).then(function (result) {
          });
        });
    </script>
@endsection