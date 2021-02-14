<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="keywords" content="Trip, Open Trip, Open Trip Gunung, Trip Gunung" />
    <meta name="author" content="Jastrip" />
    <!-- Short description of the document (limit to 150 characters) -->
    <!-- This content *may* be used as a part of search engine results. -->
    <meta name="description" content="Web Situs Jasa Ngetrip dengan daftar trip terbanyak" />

    <!-- Theme Color for Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#F0AF0A" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name') }}</title>


    <!-- Icon in the highest resolution we need it for -->
    <link rel="icon" sizes="192x192" href="{{ asset('/img/favicon.svg') }}" />

    <!-- Styles -->
    <link href="{{ asset('/css/mystyles.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/hamburger-menu.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/carousel.css') }}" rel="stylesheet" crossorigin="anonymous" />

    @yield('styles')

    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

    <!-- Google Maps API. -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCke8i-8IEnjPpOewrluy3MTTdnqGKSTbo&callback=initMap&libraries=&v=weekly" defer></script>

    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
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

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/products') }}">
                            Trips
                        </a>
                    </li>

                    @if (!Auth::user()->punyaSeller)
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



    <footer class="container py-4">
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

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Date Range Picker -->
    <script src="{{ asset('/daterangepicker-master/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/daterangepicker-master/daterangepicker.js') }}" type="text/javascript"></script>

    <!-- Lottie Bodymovin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.9/lottie.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('/js/script.js') }}"></script>
    <script src="{{ asset('/js/input-spinner.js') }}"></script>
    <script src="{{ asset('/js/popper-popover.js') }}"></script>
    
     <!-- Call Script from other view -->
    @stack('scripts')

    <!--Input Mask-->
    <script src="https://unpkg.com/imask"></script>


    <script type="text/javascript">
        var tglExpired = document.getElementById('expired_at').innerHTML;

        const tglExpired = document.querySelector;

        // Set the date we're counting down to
        var countDownDate = new Date(tglExpired).getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
            
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
          // Output the result in an element with id="demo"
          document.getElementById("demo").innerHTML = days + "d " + hours + "h "
          + minutes + "m " + seconds + "s ";
            
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
          }
        }, 1000);
    </script>

    <script type="text/javascript">
        $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('%D days %H:%M:%S'));
        });
        });

        $("input[type='number']").inputSpinner();

        //<input autocomlete="off" type="text" id="server_name${i+1}" name="server_name${i+1}" maxlength="8" class="form-control" tabindex="${i+6+1}" required /></br>

        $('#firstNumber').on('keyup keydown change',function(){
            var inputs = '';
            var value = parseInt($(this).val());
            for(var i = 0; i<value; i++){
                inputs += `
                <div class="row">
                    <div class="col-md-6">
                        <input id="name" type="text" name="tenant_name[]" value="{{ old('name') }}" class="form-control mb-3" required placeholder="Nama Partisipan" />
                    </div>
                </div>
                ` 
            }
            $('#forms').html(inputs)

        });

    </script>

    <script type="text/javascript">
        // Feather Icon
        feather.replace()

        //Date Range Picker
        $(function() {
            $('input[name="start_at"]').daterangepicker({
                "autoUpdateInput": false,
                "showDropdowns": true,
                "minYear": 2019,
                "maxYear": 2025,
                "timePicker24Hour": true,
                "timePickerSeconds": true,
                "maxSpan": {
                    "days": 120
                },
                "locale": {
                        "format": "DD MMM YYYY",
                        "separator": " - ",
                        "applyLabel": "Terapkan",
                        "cancelLabel": "Batalkan",
                        "fromLabel": "From",
                        "toLabel": "To",
                        "customRangeLabel": "Custom",
                        "weekLabel": "W",
                        "daysOfWeek": [
                            "Su",
                            "Mo",
                            "Tu",
                            "We",
                            "Th",
                            "Fr",
                            "Sa"
                        ],
                        "monthNames": [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "September",
                            "October",
                            "November",
                            "December"
                        ],
                        "firstDay": 1
                    },


                "format": "YYYY-MM-DD hh:mm:ss",
                "startDate" : new Date(new Date().getTime() + 24 * 60 * 60 * 1000),
                "endDate" : new Date(new Date().getTime() + 24 * 60 * 60 * 1000),
                "minDate" : new Date(new Date().getTime() + 24 * 60 * 60 * 1000)
            });

            $('input[name="start_at"]').on('apply.daterangepicker', 
            function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                $("#date_start").val(picker.startDate.format('YYYY-MM-DD'));
                $("#date_end").val(picker.endDate.format('YYYY-MM-DD'));
            });

            $('input[name="start_at"]').on('cancel.daterangepicker', 
            function(ev, picker) {
                $(this).val('');
            });


            var element = document.getElementById('priceat');
            var maskOptions = {
                mask: '{Rp} 000.000.000.000'
            };
            var mask = IMask(element, maskOptions);

        });

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