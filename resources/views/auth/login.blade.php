@extends('templates.mainTemplate')

@section('style')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/login-register.css">
@endsection


@section('content')
    <section class="py-5 login">
        <div class="color-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col text-center text-white py-5">
                    <h1 class="heading-1 pt-5">Login</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="form-container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-card">
                   <!-- <div class="card-header">{{ __('Login') }}</div> -->

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Username or Email') }}</label>

                                <div class="col-md-6">
                                    <input id="login" type="text"
                                           class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="login" value="{{ old('username') ?: old('email') }}" required
                                           autofocus>

                                    @if ($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
                                </div>
                            </div>
                        </form>
                        <div class="other-page-text">Don't have an account yet? No problem! <a class="other-page-link" href="/register">Sign up now!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
