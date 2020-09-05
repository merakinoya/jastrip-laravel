@extends('layouts.app')

@section('content')

<section class="container pt-4">

    @if($message = Session::get('status'))
        <p>{{ $message }}</p>
    @endif

    <h2 class="display-4 text-black font-weight-bold text-capitalize mb-4">Featured Trips</h2>

    <div class="row">
        @foreach($products as $dataproduct)

        <div class="col-md-4 col-sm-6 col-12">
            <div class="card border-0 shadow rounded-lg mb-4">
                <a class="position-absolute-custom text-white" href="" data-toggle="tooltip" data-placement="top" title="Wishlist">
                    <i data-feather="{{ ( Auth::user()->punyaSeller->id != $dataproduct->seller_id )? "heart" : "edit" }}"></i>
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

                    <a href="{{ route('products.edit', $dataproduct->id) }}" class="btn stretched-link  {{ ( Auth::user()->punyaSeller->id != $dataproduct->seller_id )? "d-none" : "" }}" style="position: relative;">Edit</a>
                    <button class="btn btn-outline-dark float-right">Contact</button>
                </div>
            </div>
        </div>

        @endforeach
    </div> <!-- /row-->

</section>



@endsection