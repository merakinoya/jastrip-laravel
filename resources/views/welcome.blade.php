<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/css/mystyles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:200,600" rel="stylesheet">

</head>

<body>
    <nav class="navbar is-fixed-top is-spaced is-white" role="navigation" aria-label="main navigation">

            <!-- navbar items -->
            <a class="navbar-item" href="{{ url('/') }}">
                <b class="title">{{ config('app.name', 'Laravel') }}</b>
            </a>

        <!-- navMenu refrences from data-target navMenu, is-active for shown on mobile -->

        @if (Route::has('login'))
        <div id="navMenu" class="navbar-menu">

            <a class="navbar-item" href="{{ url('/home') }}">
                Home
            </a>

            @auth
            <a id="navbarDropdown" class="navbar-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            @else
            <a href="{{ route('login') }}" class="navbar-item">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="navbar-item">Register</a>
            @endif

            @endauth
        </div>
        @endif

    </nav>

    <footer class="footer">
        <p>
            &copy; 2010
            <script>
                new Date().getFullYear() > 2014 && document.write("-" + new Date().getFullYear());

            </script>, Copyright
            by <a href="https://ilhamarl">Ilham Anasruloh</a>
        </p>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.9/lottie.min.js"></script>

    <script src="{{ asset('/js/script.js') }}"></script>

    <script>
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie'), // Required
            path: 'https://assets6.lottiefiles.com/packages/lf20_h9fcK1.json',
            renderer: 'svg', // Required
            loop: true, // Optional
            autoplay: true, // Optional
            name: "Hello World", // Name for future reference. Optional.
        });

        var animation = bodymovin.loadAnimation({
            container: document.getElementById('camp-outdoor'), // Required
            path: 'https://assets6.lottiefiles.com/packages/lf20_umBOmV.json',
            renderer: 'svg', // Required
            loop: true, // Optional
            autoplay: true, // Optional
            name: "Hello World", // Name for future reference. Optional.
        });

    </script>
</body>
</html>