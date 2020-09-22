<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="keywords" content="Trip, Open Trip, Open Trip Gunung, Trip Gunung">
    <meta name="author" content="Jastrip">
    <!-- Short description of the document (limit to 150 characters) -->
    <!-- This content *may* be used as a part of search engine results. -->
    <meta name="description" content="Web Situs Jasa Ngetrip dengan daftar trip terbanyak">

    <!-- Theme Color for Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#F0AF0A">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>


    <!-- Icon in the highest resolution we need it for -->
    <link rel="icon" sizes="192x192" href="{{ asset('/img/favicon.svg') }}">

    <!-- Styles -->
    <link href="{{ asset('/css/mystyles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/hamburger-menu.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/carousel.css') }}" crossorigin="anonymous">

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>

</head>

<body id="app">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="nav-brand-custom" src="{{ asset('img/nav-brand.svg') }}" alt="{{ config('app.name', 'Laravel') }}" />
            </a>

            <button class="navbar-toggler in-collapsed p-0 border-0" type="button" data-toggle="offcanvas" data-target="#myNavbar" aria-expanded="false" aria-controls="myNavbar" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="myNavbar">
                <ul class="navbar-nav ml-auto">

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>

                    <!-- Signup -->
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-primary ml-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif

                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">
                            Home
                        </a>
                    </li>

                    @if (Auth::user()->punyaSeller)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/products') }}">
                            Trips
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/activate-seller') }}">
                            Join As Seller
                        </a>
                    </li>
                    @endif


                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>


                            @if(!Auth::user()->punyaProfile->img_photo)
                            <div class="placeholder-image mr-2">
                                <span class="placholder-text" style="font-size: x-small;">
                                    @foreach (explode(" ", Auth::user()->name); as $w)
                                    {{ $w[0] }}
                                    @endforeach
                                </span>
                            </div>
                            @else
                            @if(file_exists( public_path().'/uploads/images/'.Auth::user()->punyaProfile->img_photo ))
                            <img class="rounded-circle mr-1 mb-1" style="background-color: #999999; width:24px; height:24px;" src="{{ asset('/uploads/images/'. Auth::user()->punyaProfile->img_photo ) }}" alt="Profile" />
                            @else
                            <img class="rounded-circle mr-1 mb-1" style="background-color: #999999; width:24px; height:24px;" src="{{ Auth::user()->punyaProfile->img_photo }}" alt="Profile" />
                            @endif
                            @endif

                            <b class="text-capitalize">{{ Auth::user()->name }}</b> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/userprofile') }}">My Profile</a>
                            <a class="dropdown-item" href="{{ url('/products/create') }}">Add Products</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-muted" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>

        </div>
    </nav>


    <main style="margin-top: 88px; margin-bottom: 20px;">
        <!-- YOUR CONTENT WIL BE HERE-->
        @yield('content')

    </main>


    <footer class="container py-5">

        <hr>
        <div class="row mt-5">
            <div class="col-12 col-md">
                <img class="mb-2" src="{{ asset('img/nav-brand.svg') }}" alt="Logo Brand" height="">
                <small class="d-block mb-3 text-muted">&copy; 2017-2020</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li class="my-1"><a class="text-muted" href="#">Cool stuff</a></li>
                    <li class="my-1"><a class="text-muted" href="#">Random feature</a></li>
                    <li class="my-1"><a class="text-muted" href="#">Team feature</a></li>
                    <li class="my-1"><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li class="my-1"><a class="text-muted" href="#">Another one</a></li>
                    <li class="my-1"><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>

            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li class="my-1"><a class="text-muted" href="#">Team</a></li>
                    <li class="my-1"><a class="text-muted" href="#">Locations</a></li>
                    <li class="my-1"><a class="text-muted" href="#">Privacy</a></li>
                    <li class="my-1"><a class="text-muted" href="#">Terms & Condition</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div class="custom-footer">
        <small>
            <p> &copy; 2010
                <script>
                    new Date().getFullYear() > 2014 && document.write("-" + new Date().getFullYear());
    
                </script>, Copyright
                by <a href="https://ilhamarl">Ilham Anasruloh</a>
            </p>
        </small>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.9/lottie.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>


    <script>
        // Feather Icon
        feather.replace()

        //Lottie Animation
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie'), // Required
            path: 'https://assets6.lottiefiles.com/packages/lf20_h9fcK1.json',
            renderer: 'svg', // Required
            loop: true, // Optional
            autoplay: true, // Optional
            name: "Hello World", // Name for future reference. Optional.
        });

    </script>

</body>

</html>