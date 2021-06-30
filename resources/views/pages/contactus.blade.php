@extends('templates.mainTemplate')

@section('style')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/contactus.css">
    <link rel="stylesheet" href="public/css/support.css">
    
@endsection

@section('content')
<section class="py-5 contact-heading">
    <div class="color-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col text-center text-white py-5">
                <h1 class="heading-1 pt-5">Contact Us</h1>
            </div>
        </div>
    </div>
</section>

<div class="contact-form-container">
    <h3>Send us some feedback. We'd love to hear from you!</h3>
  <form action="/action_page.php">
    <label for="fname"></label>
    <input type="text" id="fname" name="firstname" placeholder="Name">

    <label for="lname"></label>
    <input type="text" id="lname" name="lastname" placeholder="Last name">

    <label for="lname"></label>
    <input type="text" id="email" name="email" placeholder="Email Address">

    <label for="subject"></label>
    <textarea id="subject" name="subject" placeholder="What's on your mind?" style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

<div class="col text-center pt-5">
    <h1 class="heading-2">Need help with anything?</h1>
</div>
<div class="body-background">
        <div class="row , margin-top"></div>
        <div class="container contact-form">
            <form method="post" action="{{ route('contact') }}">
                <h3>Have you tried our chatbot yet? Try it on the bottom right corner of your screen.</h3>
                <p>If our bot still couldn't help, fill out a support ticket and we'll do our best to address it.</p>
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

@section('script')
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
@endsection