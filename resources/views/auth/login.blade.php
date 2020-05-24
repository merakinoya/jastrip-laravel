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
                {{ __('Login') }}
            </h1>
            <h2 class="subtitle">
                Signin in here
            </h2>


            <form method="POST" action="{{ route('login') }}">
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
                    <label class="label" for="password">{{ __('Password') }}</label>

                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @if (Route::has('password.request'))
                        <a class="is-link level-right" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="button is-medium is-warning">
                            {{ __('Login') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

<script>
    var animation = bodymovin.loadAnimation({
        container: document.getElementById('camp-outdoor'), // Required
        path: 'https://assets6.lottiefiles.com/packages/lf20_umBOmV.json',
        renderer: 'svg', // Required
        loop: true, // Optional
        autoplay: true, // Optional
        name: "Hello World", // Name for future reference. Optional.
    });

</script>

@endsection
