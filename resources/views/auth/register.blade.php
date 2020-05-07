@extends('layouts.app')

@section('content')

<!-- Columns-->
<div class="columns is-vcentered">

    <!-- Column 1-->
    <div class="column is-three-fifths">
        <figure class="image">
            <div id="camp-outdoor" width="11" height="20"></div>
        </figure>
    </div>

    <!-- Column 1-->
    <div class="column">

        <div class="container">
            <h1 class="title">
                {{ __('Register') }}
            </h1>
            <h2 class="subtitle">
                Sign Up in here
            </h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- INPUT FIELD NAME --->
                <div class="field">
                    <label class="label">{{ __('Name') }}</label>
                    <div class="control">
                        <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" placeholder="Text input" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- INPUT FIELD EMAIL --->
                <div class="field">
                    <label class="label">{{ __('E-Mail Address') }}</label>
                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- INPUT FIELD PASSWORD --->
                <div class="field">
                    <label class="label">{{ __('Password') }}</label>
                    <p class="control has-icons-left">
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="field">
                    <label class="label">{{ __('Confirm Password') }}</label>
                    <p class="control has-icons-left">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required
                            autocomplete="new-password">

                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="field">
                    <button type="submit" class="button is-medium is-warning">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
