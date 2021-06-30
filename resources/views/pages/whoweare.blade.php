@extends('templates.mainTemplate')

@section('style')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/whoweare.css">
@endsection

@section('content')
    <section class="py-5 who_we_are">
        <div class="color-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col text-center text-white py-5">
                    <h1 class="heading-1 pt-5">Who we are</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="who_we_are_body">
        <div class="container my-4">
            <div class="row">
                <div class="col-md-3">
                    <img src="https://dev.myclassof.com/public/images/whoweare.jpg" width="100%" alt="">
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <p>
                                Having a senior in high school, I told her a week or so into the COVID-19 crisis, I wish we had a way to keep our family updated about your graduation and Senior activities.
                                <br> I wish there was a central place to update friends and family regularly. Send updates from when you need to. A place to add wish lists, attach a bank account so when you eventually send out (new) Graduation Announcements, you could reference the web address, since some family may not be able to travel right now.
                                <br>I wish there was a way you could document what’s happening now and share your story, and tell what you will be doing next year, something you can keep and build on as you go through your career.
                                <br>This is our wish for you. To help all of you on your journey and make life easier as you navigate this world, and to have a centralized place to find all you need as you make your way to the next step. We’ve been there. And now we’re here for you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection