@extends('header')

@section('content')

<!-- bugs: login with user that isnt there odesnt work -->

<link rel="stylesheet" href="css/checkout.css">
<link rel="stylesheet" href="css/login.css">

<div id="login_body">
<img id="login_background_image"  src="/images/pexels-cottonbro-studio-106756182.jpg">
<div id="login_form_container">
    
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <h2 class="login_title">{{ __('Confirm Password') }}</h2>

        <div class="form_fields">



        <label for="password" class="label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

            <div class="form_buttons">
            <button type="submit" class="btn btn-primary">
                {{ __('Confirm Password') }}
            </button>


            </div>
        </div>


    </form>
</div>




@endsection
