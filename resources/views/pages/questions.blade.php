@extends('templates.mainTemplate')

@section('style')
    <link rel="stylesheet" href="public/css/form.css">
    <link rel="stylesheet" href="public/css/question-popup.css">
@endsection

@section('content')
    
    <!-- timeout popup -->
    <div class="hover_bkgr hide-element">
        <span class="helper"></span>
        <div>
            <h1>Session Timeout</h1>
            <div>Due to inactivity, your session has timed out.</div>
            <div>You will be logged out in <span id="timeout-timer">30</span> seconds.</div>
            <div>Would you like to continue?</div>
            <div id="button-container">
                <button class="popup-button" id="yes-button">Yes</button>
                <button class="popup-button" id="no-button">No</button>
            </div>
            
        </div>
    </div>
    
    <section class="py-5 form-heading">
        <div class="color-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col text-center text-white py-5">
                    <h1 class="heading-1 pt-5">Tell Us About Yourself</h1>
                </div>
            </div>
        </div>
    </section>
    
    <div class="body-container"> 
       
        <div class="row justify-content-center form-container">
             
        <div class="col-md-12 text-center">
            <h1 class="form-header">Now that you have registered, Let's get your profile set up with a few questions!</h1>
                <form id="regForm" action="{{ route('question') }}" method="post">
                    {{ csrf_field() }}
                    @foreach($question as $key => $questions)
                        <div class="each-question">
                            <input type="hidden" value="{{$questions->id}}" name="ques_id[]">
                            <p>{{ $questions->question }}</p>
                            <div class="yes">
                                <input class="label" data-quesid="{{ $questions->id }}" type="radio" name="ans-{{$key}}"
                                       value="1">
                                <label id="yes">Yes</label>
                            </div>
                            <div class="no">
                                <input class="label" data-quesid="{{ $questions->id }}" type="radio" name="ans-{{$key}}"
                                       checked value="0">
                                <label id="no">No</label><br>
                            </div>
                            <textarea class="detailed-box txt-box{{$questions->id}}" style="display: none;"
                                      name="deatiled_answer[]"
                                      placeholder="Enter your detailed answer"></textarea>
                        </div>
                    @endforeach
                    <!-- flag to keep track of whether or not to auto log the user out -->
                    <input name="form-complete-status" id="form-complete-status" style="display: none;" value="true"></input>
                    <div>
                        <button type="button" class="submit-button" id="nextBtn" onclick="submitForm()">Next</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

  
    
@endsection

@section('script')
    <script src="public/js/questions.js"></script>
@endsection
