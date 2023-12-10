@extends('header')

@section('content')


<link rel="stylesheet" href="css/checkout.css">
<link rel="stylesheet" href="css/login.css">
<div class="body"> 
<img class="imagecontainer" src="/images/pexels-cottonbro-studio-106756182.jpg"></img>
<div class="container">
    <div>
        <div>
            <div>
                <div>{{ __('Login') }}</div>

                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div >
                            <label for="email" class="label">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div >
                            <label for="password" class="label">{{ __('Password') }}</label>

                            <div >
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div class="checkbox">

                        
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>


                        <div>
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="button_main button_big">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="button_main button_small" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
