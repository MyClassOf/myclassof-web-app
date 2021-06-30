@extends('templates.mainTemplate')

@section('style')
    <link rel="stylesheet" href="public/css/support.css">
@endsection

@section('content')
<section class="py-5 support-heading">
    <div class="color-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col text-center text-white py-5">
                <h1 class="heading-1 pt-5">Support</h1>
            </div>
        </div>
    </div>
</section>
    <div class="body-background">
        <div class="row , margin-top"></div>
        <div class="container contact-form">
            <form method="post" action="{{ route('contact') }}">
                <h3>How can we help?</h3>
                <div class="row">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" required placeholder="Name *" value="">
                        </div>
                        <div class="form-group">
                            <input type="email" name="txtEmail" class="form-control" required  placeholder="Email *" value="">
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control"  placeholder="Phone Number " value="">
                        </div>
                    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" required placeholder="Message *"  style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                            <input type="submit" name="btnSubmit" id="bg-color" class="btnContact" value="Send Message">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

