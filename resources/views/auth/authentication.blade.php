@extends('layouts.pre')

@section('content')
    @if (session()->has('message'))
    <div class="alert alert-{!! session('type') !!} alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('message') }}
    </div>
    @endif
    <div class="login-signup l-attop" id="login">
        <div class="login-signup-title">
            LOG IN
        </div>
        <form method="POST" action="{{ url('/login') }}">
        @csrf      
        <div class="login-signup-content">
            <div class="input-name">
                <h2>Email</h2>

            </div>
            <input type="email" name="email" value="" class="field-input" />
            @if ($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
            @endif
            <div class="input-name input-margin">
                <h2>Password</h2>

            </div>
            <input type="password" name="password" value="" class="field-input" />
            @if ($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
            @endif
            <div class="input-r">
                <div class="check-input">
                    <input type="checkbox" id="remember-me-2" name="rememberme" value="" class="checkme">
                    <label class="remmeberme-blue" for="remember-me-2"></label>
                </div>
                <div class="rememberme"><label for="remember-me-2">Remember Me</label></div>
            </div>
            <button type="submit" class="submit-btn">
                Login
            </button>
            <div class="forgot-pass">
                <a href="#">Forgot Password?</a>
            </div>
        </div>
        </form>
    </div>
    <div class="login-signup s-atbottom" id="signup">
        <div class="login-signup-title">
            SIGN UP
        </div>
        <form method="POST" action="{{ url('/register') }}">
        @csrf
        <div class="login-signup-content">
            <div class="input-name">
                <h2>Username</h2>
            </div>
            <input type="text" name="name" value="" class="field-input" />
            @if ($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
            @endif
            <div class="input-name input-margin">
                <h2>E-Mail</h2>
            </div>
            <input type="email" name="email" value="" class="field-input" />
            @if ($errors->has('email'))
                <span class="help-block">
                    {{ $errors->first('email') }}
                </span>
            @endif
            <div class="input-name input-margin">
                <h2>Password</h2>
            </div>
            <input type="password" name="password" value="" class="field-input" />
            @if ($errors->has('password'))
                <span class="help-block">
                    {{ $errors->first('password') }}
                </span>
            @endif
            <div class="input-name input-margin">
                <h2>Confirm Password</h2>
            </div>
            <input type="password" name="password_confirmation" value="" class="field-input" />
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    {{ $errors->first('password_confirmation') }}
                </span>
            @endif
            <button type="submit" class="submit-btn">
                Register
            </button>
        </div>
        </form>
    </div>
@endsection
