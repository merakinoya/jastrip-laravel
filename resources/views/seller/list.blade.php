@extends('layouts.app')

@section('content')

<!-- Place Your Code HTML in here-->

<section class="hero is-medium">
    <div class="hero-body" style="padding-top: 100px;">

        <div class="columns is-vcentered">

            <div class="column">
                <span class="skeleton-box" style="width:100px;height:80px;"></span>

                <h1 id="full-name" class="title is-1 spaced">
                    Want to be Reseller?
                </h1>
                <h2 class="subtitle is-4 spaced">
                    Please activate here to make sure you're good seller
                </h2>
                <p class="">
                    <a href="/test/index-test1.html" class="button is-medium is-warning">
                        Activate Now
                    </a>
                </p>
            </div>

            <div class="column is-6 is-offset-1 ">
                <figure class="image">
                    <div id="" width="11" height="20"></div>
                </figure>
            </div>

        </div>

    </div>
</section>


<table class="table">
    <thead>
        <tr>
            <th>Seller Name</th>
            <th>Products</th>
        </tr>
    </thead>
    <tbody>
        @foreach($seller as $dataseller)
        <tr>
            <td>{{ $dataseller->name }}</td>

            <td>
                @foreach ($dataseller->punyaProducts as $dataproduk)
                {{ $dataproduk->name }}
                @endforeach
            </td>

        </tr>
        @endforeach
    </tbody>

</table>


@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif


@endsection
