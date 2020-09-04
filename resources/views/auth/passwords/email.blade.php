@extends('layouts.app')

@section('content')


<div class="container">
    <h1>{{ __('Reset Password') }}</h1>

    @if (session('status'))
    <div class="alert alert-warning" role="alert"> {{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">
            {{ __('Send Password Reset Link') }}
        </button>

    </form>
</div>
@endsection