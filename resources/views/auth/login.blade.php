@extends('layouts.app')

@section('content')


<div class="container">
    <h1 class="title"> {{ __('Login') }}</h1>

    <!-- FORM -->
    <form method="POST" action="{{ route('login') }}"> 
        @csrf

        <!-- EMAIL -->
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
            @enderror
        </div>

        <!-- PASSWORD -->
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            @if (Route::has('password.request'))
            <a class="float-right" href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }} </a>
            @endif

            @error('password')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <!-- CHECK REMEMBER ME-->
        <div class="form-group form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
        </div>

        <!-- BUTTON -->
        <div class="mt-4  d-flex flex-wrap">
                <button type="submit" class="btn btn-primary mb-4">{{ __('Login') }}</button>

                <a class="btn btn-link" href="{{ route('register') }}">Belum punya akun? Daftar di sini</a>
        </div>
    </form>

    <div class="">
        <a href="{{ url('/login/google') }}" class="btn btn-outline-secondary btn-block">
            <img width="16px" style="margin:8px;" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
            {{ __('Sign in with Google') }}
        </a>
        <a href="{{ url('/login/facebook') }}" class="btn btn-block btn-outline-info d-none">{{ __('Sign In with Facebook') }}</a>
        <a href="{{ url('/login/github') }}" class="btn btn-outline-secondary btn-block d-none">{{ __('Sign In with Github') }}</a>
    </div>
</div>

@endsection