@extends('layouts.app')

@section('content')


@if(session('status'))
<div class="alert alert-primary" role="alert">
    {{ session('status') }}
</div>
@endif

<section class="jumbotron hero-illustration mb-0">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <h1 class="display-3 text-black font-weight-bold text-capitalize">Jasa Open Trip Banyak Pilihan</h1>
                <p class="lead text-black font-weight-normal mt-1">
                    Temukan Perjalanan Seru Kalian Bersama Jastrip!
                </p>
                <a class="btn btn-primary btn-lg mt-3 shadow-lg" href="{{ url('/products') }}" role="button">Cek Sekarang &raquo;</a>
            </div>

            <div class="col-md-6">
                <!--<img src="{{ asset('img/illustration.svg') }}" alt="Illustration" />-->
            </div>
        </div>
    </div>
</section>


<section class="section section-two-illustration">
    <div class="container">

        <h2 class="display-4 text-black font-weight-bold text-capitalize mb-5">Featured Trips</h2>


        <div class="row">
            @foreach($products as $dataproduct)

            <div class="col-md-4 col-sm-6 col-12">
                <div class="card border-0 shadow rounded-lg mb-4">
                    <a class="position-absolute-custom text-white" href="" data-toggle="tooltip" data-placement="top" title="Wishlist">
                        <i data-feather="heart"></i>
                    </a>

                    @if(!$dataproduct->img)
                    <img class="card-img-top rounded-top" src="https://source.unsplash.com/x9I-6yoXrXE" alt="Product Photo" />
                    @else
                    <img class="card-img-top rounded-top" src="{{ asset('/uploads/products/'. $dataproduct->img )}}" alt="Product Photo" />
                    @endif

                    <div class="card-body">

                        <span class="badge badge-info mb-2 mr-2">Camp</span>
                        <h4 class="card-title mb-1 font-weight-bold text-black text-capitalize text-truncate">{{ $dataproduct->name }}</h4>
                        <p><small>2 days</small> • <small>10 orang</small>
                            <br>
                            <small>{{ date('d M Y',strtotime($dataproduct->start_at)) }}</small>-<small>{{ date('d M Y',strtotime($dataproduct->finish_at)) }}</small>
                        </p>
                        <p class="card-text text-muted text-truncate">{{ $dataproduct->description }}
                            <a href="{{ route('products.show', $dataproduct->id) }}" class="text-muted stretched-link">detail</a>
                        </p>
                    </div>

                    <div class="card-footer">
                        <small class="text-black-50">Updated {{ date('d M Y',strtotime($dataproduct->updated_at)) }} </small>

                        <button class="btn btn-outline-dark float-right">Contact</button>
                    </div>
                </div>
            </div>

            @endforeach
        </div> <!-- /row-->
    </div>
</section>

<section class="section">
    <div class="container">

        <h2 class="display-4 text-black font-weight-bold text-capitalize mb-5">Popular Location</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">

            <div class="col mb-3">
                <div class="card text-white border-0 shadow-lg rounded-xl w-100" style="height: 320px">
                    <img src="https://source.unsplash.com/hnJ3sT-_48Q" class="card-img rounded-xl w-100" style="height: 320px; object-fit:cover;" alt="...">
                    <div class="card-img-overlay rounded-xl">
                        <h4 class="card-title">Semeru Mountain</h4>
                        <p class="card-text">3.676 mdpl</p>
                    </div>
                </div>
            </div>
            
            <div class="col mb-3">
                <div class="card text-white border-0 shadow-lg rounded-xl w-100" style="height: 320px">
                    <img src="https://source.unsplash.com/dRi6xP2ZPBk" class="card-img rounded-xl w-100" style="height: 320px; object-fit:cover;" alt="...">
                    <div class="card-img-overlay rounded-xl">
                        <h4 class="card-title font-weight-bold">Rinjani Mountain</h4>
                        <p class="card-text">3.726 mdpl</p>
                    </div>
                </div>
            </div>

            <div class="col mb-3">
                <div class="card text-white border-0 shadow-lg rounded-xl w-100" style="height: 320px">
                    <img src="https://source.unsplash.com/_9ExPfUFWHM" class="card-img rounded-xl w-100" style="height: 320px; object-fit:cover;" alt="...">
                    <div class="card-img-overlay rounded-xl">
                        <h4 class="card-title font-weight-bold">Merapi Mountain</h4>
                        <p class="card-text">2.930 mdpl</p>
                    </div>
                </div>
            </div>

            <div class="col mb-3">
                <div class="card text-white border-0 shadow-lg rounded-xl w-100" style="height: 320px">
                    <img src="https://source.unsplash.com/DVgIwpGVNJA" class="card-img rounded-xl w-100" style="height: 320px; object-fit:cover;" alt="...">
                    <div class="card-img-overlay rounded-xl">
                        <h4 class="card-title font-weight-bold">Bromo Mountain</h4>
                        <p class="card-text">2.392 mdpl</p>
                    </div>
                </div>
            </div>


        </div>


    </div>
</section>


@endsection