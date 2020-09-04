@extends('layouts.app')

@section('content')


@if(session('status'))
<div class="alert alert-primary" role="alert">
    {{ session('status') }}
</div>
@endif

<section class="jumbotron hero-illustration" style="background-color: #fff">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
            <h1 class="display-4 text-black font-weight-bold text-capitalize">Jasa Open Trip Banyak Pilihan</h1>
            <p class="lead text-black font-weight-normal mt-1">
                Temukan Perjalanan Seru Kalian Bersama Jastrip!
            </p>
            <a class="btn btn-primary btn-lg mt-3" href="#" role="button">Cek Sekarang &raquo;</a>
        </div>

        <div class="col-md-6">
            <!--<img src="{{ asset('img/illustration.svg') }}" alt="Illustration" />-->
        </div>
      </div>
    </div>
</section>


<section class="container">

    @if($message = Session::get('status'))
    <p>{{ $message }}</p>
    @endif

    <div class="row mb-4 mt-4">
        <div class="col">
            <h2 class="display-5 text-black font-weight-bold text-capitalize">{{ $pagename }}</h2>
        </div>
    </div>

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
                    <p class="card-text text-muted text-truncate">{{ $dataproduct->facility }}
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

</section>


@endsection