<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bulma CSS 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
        <link href="" rel="stylesheet">
    -->

    <script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" defer></script>

    <!-- Styles -->
    <link href="{{ asset('/css/mystyles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:200,600" rel="stylesheet">

    <style>
        .navbar {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06) !important;
        }

        .card-shadow {
            transition: box-shadow .5s;
            background-color: white;
            color: #4a4a4a;
            max-width: 100%;
            position: relative;
            border: 0.5px solid #f5f5f5;
            border-radius: 3px;
        }

        .card-shadow:hover {
            border: 0px solid #dbdbdb;
            border-radius: 3px;
            box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.1), 0 0px 0 1px rgba(10, 10, 10, 0.02);
        }
    </style>
</head>

<body id="app">

    <header class="header">
        <nav class="navbar is-fixed-top is-spaced is-white" role="navigation" aria-label="main navigation">
            <!-- navbar brands -->
            <div class="container">
                <div class="navbar-brand">
                    <!-- navbar items -->
                    <a class="navbar-item" href="{{ url('/') }}">
                        <b class="title">{{ config('app.name', 'Laravel') }}</b>
                    </a>
                    <!-- navbar burger with data-target in id="navMenu" -->
                    <div role="button" class="navbar-burger burger" data-target="navMenu" aria-label="menu"
                        aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <!-- navMenu refrences from data-target navMenu, is-active for shown on mobile -->
                <div id="navMenu" class="navbar-menu">
                    <div class="navbar-start">
                        <!-- navbar items -->
                    </div>


                    @guest
                    <div class="navbar-end">

                        <a href="{{ route('login') }}" class="navbar-item">Login</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="navbar-item">Register</a>
                        @endif

                        @else
                        <a class="navbar-item" href="{{ url('/home') }}">
                            Home
                        </a>

                        <a class="navbar-item" href="{{ url('/products') }}">
                            Products
                        </a>

                        <a class="navbar-item" href="{{ url('/activate-seller') }}">
                            Seller
                        </a>

                        <div class="navbar-item has-dropdown is-hoverable">
                            <a id="navbarDropdown" class="navbar-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="navbar-dropdown is-boxed">

                                <a class="navbar-item" href="{{ url('/userprofile') }}">
                                    Profil Pengguna
                                </a>

                                <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>

                        <div id="signinButton" class="navbar-item">
                            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-longtitle="true">
                            </div>
                        </div>

                    </div>

                    @endguest

                </div>
            </div>
        </nav>

    </header>

    <!--
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    -->

        <main class="container" style="padding-top: 80px;">
            <div class="section">

            <!-- YOUR CONTENT WIL BE HERE-->
            @yield('content')

            </div>
        </main>


    <footer class="footer">
        <div class="content has-text-centered spaced">
            <p>
                &copy; 2010
                <script>
                    new Date().getFullYear() > 2014 && document.write("-" + new Date().getFullYear());

                </script>, Copyright
                by <a href="https://ilhamarl">Ilham Anasruloh</a>
            </p>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
