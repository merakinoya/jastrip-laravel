@extends('layouts.app')

@section('content')


<div class="container">
    <h1 class="title">
        {{ __('Reset Password') }}</h1>
        <h2 class="subtitle">
            Send verification link to your email
            </h2>


            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="field">
                    <label class="label" for="email">{{ __('E-Mail Address') }}</label>


                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="button is-medium is-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>

            </form>
</div>
@endsection
