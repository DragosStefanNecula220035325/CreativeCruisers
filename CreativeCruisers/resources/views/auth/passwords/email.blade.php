
@extends('header')

@section('content')

<!-- bugs: login with user that isnt there odesnt work -->

<link rel="stylesheet" href="css/checkout.css">
<link rel="stylesheet" href="css/login.css">

<div id="login_body">
<img id="login_background_image"  src="/images/pexels-cottonbro-studio-106756182.jpg">
<div id="login_form_container">
    
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <h2 class="login_title">{{ __('Reset Password') }}</h2>
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
        @endif
        <div class="form_fields">
        <label for="email" class="label">{{ __('Email Address') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror



            <div class="form_buttons">
            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>


            </div>
        </div>


    </form>
</div>




@endsection

