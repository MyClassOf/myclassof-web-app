@extends('templates.mainTemplate')

@section('style')
    <link rel="stylesheet" href="public/css/login-register.css">
@endsection

@section('content')
<section class="py-5 login">
    <div class="color-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col text-center text-white py-5">
                <h1 class="heading-1 pt-5">Connect To Your World</h1>
            </div>
        </div>
    </div>
</section>
<div class="form-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="form-card">
                <!--<div class="card-header">Connect to Your<br>World</div>-->

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <!--/****** edited by asad (Drop down Menu)******/-->
                        <div class="form-group row">
                            <label for="drop-down" class="col-md-4 col-form-label text-md-right">Select Option</label>

                            <div class="col-md-6">
                                <select name="education_level" class="educ-select">
                                  <option value="High school">High school</option>
                                  <option value="Bachelors">Bachelors</option>
                                  <option value="Masters">Master’s</option>
                                  <option value="Doctorate">Doctorate</option>
                                  <option value="Trade school">Trade school</option>
                                  <option value="Vocational">Vocational</option>
                                  <option value="Law School">Law School</option>
                                </select>
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="degree" class="col-md-4 col-form-label text-md-right">Degree</label>

                            <div class="col-md-6">
                                <input id="degree" type="text" class="form-control" name="degree" required>
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="graduation_year" class="col-md-4 col-form-label text-md-right">Graduation Year</label>

                            <div class="col-md-6">
                                <input id="graduation_year" type="text" class="form-control" name="graduation_year" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="other-page-text">Already registered with us? <a class="other-page-link" href="/login">Log In</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
