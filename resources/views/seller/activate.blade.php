@extends('layouts.app')
@section('content')


<section class="container">

    
    <div class="columns is-vcentered">

        @if (Auth::user()->punyaSeller)

            <h1 id="full-name" class="title is-1 spaced">
                Hello Seller ! {{ Auth::user()->punyaSeller->name }}
            </h1>
            <h2 class="subtitle is-4 spaced">
                You already activate account as Seller
            </h2>
        </div>

        @else
            <h1 id="full-name" class="title is-1 spaced">
                Do you want to be a seller?
            </h1>
            <h2 class="subtitle is-4 spaced">
                Please activate here to make sure you're good seller
            </h2>
            <form method="POST" action="{{ route('activate-seller-now') }}" enctype="multipart/form-data">
                @csrf
                <p class="">
                    <button type="submit" class="btn btn-primary">Activate</button>
                </p>
            </form>

        @endif


    </div>
</section>

@endsection