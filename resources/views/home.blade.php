@extends('layouts.app')

@section('content')
<section class="hero is-medium">
    <div class="hero-body" style="padding-top: 100px;">
        <div class="container">

            <div class="columns is-vcentered">

                <div class="column">
                    <figure class="image">
                        <div id="lottie" width="" height="20"></div>
                    </figure>
                </div>

                <div class="column">
                    <h1 class="title">
                        Homepage
                    </h1>
                    <h2 class="subtitle">
                        Back to mama in the home
                    </h2>
                </div>


                @if (session('status'))
                <div class="" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
        </div>
</section>

@endsection
