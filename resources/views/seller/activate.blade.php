@extends('layouts.app')

@section('content')

<!-- Place Your Code HTML in here-->

<section class="hero is-medium">
    <div class="hero-body" style="padding-top: 100px;">

        <div class="columns is-vcentered">

            @if (Auth::user()->punyaSeller)

            <div class="column">
                <span class="skeleton-box" style="width:100px;height:80px;"></span>

                <h1 id="full-name" class="title is-1 spaced">
                    Hello Seller ! {{ Auth::user()->punyaSeller->name }}
                </h1>
                <h2 class="subtitle is-4 spaced">
                    You already activate account as Seller
                </h2>
                <p class="">
                    <a href="/test/index-test1.html" class="button is-medium is-warning">
                        Manage Now
                    </a>
                </p>
            </div>

            @else

            <div class="column">
                <span class="skeleton-box" style="width:100px;height:80px;"></span>

                <h1 id="full-name" class="title is-1 spaced">
                    Want to be Reseller?
                </h1>
                <h2 class="subtitle is-4 spaced">
                    Please activate here to make sure you're good seller
                </h2>
                <form method="POST" action="{{ route('activate-seller-now') }}" enctype="multipart/form-data">
                    @csrf
                    <p class="">
                        <button type="submit" class="button is-medium is-primary">Activate</button>
                    </p>
                </form>
            </div>

            @endif

            <div class="column is-6 is-offset-1 ">
                <figure class="image">
                    <div id="" width="11" height="20"></div>
                </figure>
            </div>

        </div>

    </div>
</section>


@endsection
