@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-large card-body white shadow-1">
                    <h2>Login</h2>
                    <br>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                        <hr>
                        <p class="blue-text center">
                            Or Use Your Social Account
                        </p>
                        <br>
                        <div class="center">

                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{url('/login/facebook')}}"><img
                                                src="{{asset('css/social-icons/facebook.svg')}}" alt="facebook"
                                                style="width: 25%"></a>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('/login/google')}}"><img
                                                src="{{asset('css/social-icons/search.svg')}}" alt="google"
                                                style="width: 25%"></a>
                                    <br>

                                </div>
                                <div class="col-md-4">
                                    <a href="{{url('/login/twitter')}}"><img
                                                src="{{asset('css/social-icons/twitter.svg')}}" alt="twitter"
                                                style="width: 25%"></a>
                                    <br>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <br>
        <div class="center">
            <a class="btn btn-link white blue-text" href="{{ route('register') }}">
                Don't have an account? Sign Up
            </a>
        </div>
    </div>
@endsection
