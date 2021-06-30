@extends('templates.mainTemplate')

@section('style')
    <link rel="stylesheet" href="public/css/form.css">
@endsection

@section('content')
<section class="py-5 form-heading">
    <div class="color-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col text-center text-white py-5">
                <h1 class="heading-1 pt-5">Grad Gift Setup</h1>
            </div>
        </div>
    </div>
</section>
    <div class="body-container">
        <div class="row justify-content-center py-5 form-container">
            <div class="col-md-12 text-center">
                <form action="{{ route('account.detail') }}" method="post">
                    {{ csrf_field() }}
                    <p class="form-header">Would you like to create Grad Gift Account?</p>
                    <div id="yes">
                        <input class="label" type="radio" name="ans" value="1">
                        <label>Yes</label>
                    </div>
                    <div id="no">
                        <input class="label" type="radio" name="ans" checked value="0">
                        <label>No</label><br>
                    </div>
                    <div id="txt-box" style="display: none">
                    <input type="email" name="paypal" placeholder="Enter your paypal email address"><br>
                    </div><br>
                    <input type="submit" value="Next" class="submit-button">
                        
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.label').click(function () {
            var value = $(this).val();
            if (value == 1) {
                $('#txt-box').show('slow');
            } else {
                $('#txt-box').hide('slow');
            }
            });

        $('.label').click(function () {
            var value = $(this).val();
            var id = $(this).data('quesid');
            if (value == 1) {
                $('.txt-box' + id).show();
            } else {
                $('.txt-box' + id).hide();
            }
        });
    </script>
@endsection
