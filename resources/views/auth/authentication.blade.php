@extends('layouts.pre')

@section('content')
    <div class="login-signup l-attop" id="login">
        <div class="login-signup-title">
            LOG IN
        </div>
        <form method="POST" action="{{ url('/login') }}">
        @csrf      
        <div class="login-signup-content">
            <div class="input-name">
                <h2>Username</h2>

            </div>
            <input type="email" name="email" value="" class="field-input" />
            <div class="input-name input-margin">
                <h2>Password</h2>

            </div>
            <input type="password" name="password" value="" class="field-input" />
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
            <div class="input-name input-margin">
                <h2>E-Mail</h2>
            </div>
            <input type="email" name="email" value="" class="field-input" />
            <div class="input-name input-margin">
                <h2>Password</h2>
            </div>
            <input type="password" name="password" value="" class="field-input" />
            <div class="input-name input-margin">
                <h2>Confirm Password</h2>
            </div>
            <input type="password" name="password_confirmation" value="" class="field-input" />
            <button type="submit" class="submit-btn">
                Register
            </button>
        </div>
        </form>
    </div>
@endsection
