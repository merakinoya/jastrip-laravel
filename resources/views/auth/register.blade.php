@extends('layouts.app')

@section('content')

<!-- Columns-->
<div class="columns is-vcentered">

    <!-- Column 1-->
    <div class="column">
        <div class="container">
            <h1 class="title">{{ __('Register') }}</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- INPUT FIELD NAME --->
                <div class="form-group">
                    <label class="label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Your Name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                    @enderror
                </div>

                <!-- INPUT FIELD EMAIL --->
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                <!-- INPUT FIELD PASSWORD --->
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert"> {{ $message }} </span>
                    @enderror
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password-confirm" aria-describedby="validationFeedback" placeholder="Password Confirmation">
                    @error('password')
                    <span id="validationFeedback" class="invalid-feedback" role="alert"> {{ $message }} </span>
                    @enderror
                </div>


                <!-- BUTTON SIGNUP -->
                <div class="mt-4 d-flex flex-wrap">
                    <button type="submit" class="btn btn-primary mb-4">
                        {{ __('Sign Up') }}
                    </button>

                    <a class="btn btn-link" href="{{ route('login') }}">Sudah memiliki akun? Login di sini</a>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection