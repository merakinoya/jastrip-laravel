<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">

    <link href="{{ asset('/node_modules/bulma/css/bulma.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" defer></script>

    <!-- Styles -->
    <link href="{{ asset('/css/mystyles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('/js/dropzone/dropzone.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:200,600" rel="stylesheet">

    <style>
        nav.navbar {
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

<body>
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

            @if (Route::has('login'))
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <!-- navbar items -->
                </div>

                <div class="navbar-end">

                    <a class="navbar-item" href="{{ url('/home') }}">
                        Home
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        @auth
                        <a id="navbarDropdown" class="navbar-link" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="navbar-dropdown is-boxed">
                            <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>


                    @else
                    <a href="{{ route('login') }}" class="navbar-item">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="navbar-item">Register</a>
                    @endif

                    @endauth


                    @endif


                    <div id="signinButton" class="navbar-item">
                        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-longtitle="true"></div>
                    </div>

                </div>
            </div>

        </div>
    </nav>

    <section class="hero is-medium background-image" style="background-image: url('/content/images/2018/06/cover.jpg')">
        <div class="hero-body" style="padding-top: 100px;">
            <div class="container">
                <div class="columns is-vcentered">

                    <div class="column is-5">
                        <span class="skeleton-box" style="width:100px;height:80px;"></span>
                        <h1 id="full-name" class="title is-1 spaced">
                            Catering by Ride
                        </h1>
                        <h2 class="subtitle is-4 spaced">
                            Let this cover page describe a product or service.
                        </h2>
                        <p class="">
                            <a href="/test/index-test1.html" class="button is-medium is-warning">
                                This is CTA
                            </a>
                        </p>
                    </div>

                    <div class="column is-6 is-offset-1 ">
                        <figure class="image">
                            <div id="lottie" width="11" height="20"></div>
                        </figure>
                    </div>

                </div>
            </div>
        </div>
    </section>

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





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.9/lottie.min.js"></script>

    <script src="{{ asset('/js/script.js') }}"></script>

    <script src="{{ asset('/js/dropzone/dropzone.js') }}"></script>

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
