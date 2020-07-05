@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))
    <p>{{ $message }}</p>
@endif


<div class="columns">
    <div class="column has-text-left">
        <h1 class="title">Bulma Card Layout Template</h1><br>
    </div>

    <div class="column has-text-right">
      <h1 class="title"><a href="{{ url('/products/create') }}">+ Add New</a></h1><br>
  </div>
</div>

<div id="app" class="row columns is-multiline">

    @foreach($productinhtml as $dataproduct)

        <div v-for="card in cardData" key="card.id" class="column is-4">
            <div class="card large">
                <div class="card-image is-16by9">
                    <figure class="image">

            
                        <a href="">
                          <img 
                          style="min-height:120px; max-height:200px; object-fit: cover;"

                          @if(!$dataproduct->img)
                          
                          src="https://bulma.io/images/placeholders/1280x960.png" 
                          @else

                          src="{{ asset('/storage/products/'. $dataproduct->img ) }}"
                          @endif
                          
                          ></a>

                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                      <!--
                        <div class="media-left">
                            <figure class="image is-48x48">
                                <img src="https://bulma.io/images/placeholders/48x48.png" alt="Image">
                            </figure>
                        </div>
                        -->
                        <div class="media-content">
                            <p class="title is-4 no-padding">{{ $dataproduct->name }} </p>
                            <p>
                                <span class="title is-6">
                                    <a href="#"> Data </a> 
                                  </span>
                              </p>
                            <p class="subtitle is-6">Subtot</p>
                        </div>
                    </div>
                    <a href="{{ route('products.edit', $dataproduct->id) }}" class="btn btn-sm btn-success">Edit</a>
                    <div class="content has-text-right">
                        Content
                        <div class="background-icon"><span class="icon-twitter"></span></div>
                    </div>
                </div>
            </div>
        </div>


    @endforeach

</div>




@endsection
