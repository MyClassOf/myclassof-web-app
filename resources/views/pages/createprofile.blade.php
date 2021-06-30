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
                <h1 class="heading-1 pt-5">Profile URL</h1>
            </div>
        </div>
    </div>
</section>
    <div class="body-container">
        <div class="row justify-content-center py-5 form-container">
            <div class="col-md-12 text-center">
                 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form action="{{ route('create.profiles') }}" method="post">
                    {{ csrf_field() }}
                    <p class="form-header">Would you like to create profile url?</p>
                    <div id="yes">
                        <input id="label1" type="radio" name="ans" value="1">
                        <label for="label1">YES</label>
                    </div>
                    <div id="no">
                        <input id="label2" type="radio" name="ans" checked value="0">
                        <label for="label2">NO</label><br>
                    </div>
                    <input class="mb-5" style="display: none;" id="txt-box" cols="50" rows="1" name="deatiled_answer"
                              placeholder="Enter your profile url"></input><br>
                              @if(Session::has('message'))
                                <p class="alert alert-danger">{{ Session::get('message') }}</p>
                                @endif
                    <input type="submit" value="Next" class="submit-button">
                        
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#label1').click(function () {
                $('#txt-box').show('slow');
            });
            $('#label2').click(function () {
                $('#txt-box').hide('slow');
            });
        });
    </script>
@endsection
