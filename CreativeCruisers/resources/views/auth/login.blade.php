@extends('header')

@section('content')

<!-- bugs: login with user that isnt there odesnt work -->

<link rel="stylesheet" href="css/checkout.css">
<link rel="stylesheet" href="css/login.css">

<div id="login_body">
<img id="login_background_image"  src="/images/pexels-cottonbro-studio-106756182.jpg">
<div id="login_form_container">
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h2 class="login_title">{{ __('Login') }}</h2>

        <div class="form_fields">
        <label for="email" class="label">{{ __('Email Address') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        <label for="password" class="label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

            <div class="checkbox_field">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="form_buttons">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a  href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </div>
        </div>


    </form>
</div>




@endsection
