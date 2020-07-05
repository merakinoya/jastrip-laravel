@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column has-text-left">
        <h1 class="title">Edit Product</h1><br>
    </div>
</div>

<div class="columns">


    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" class="column is-three-fifths is-offset-one-fifth">
        @csrf
        {{ method_field('PUT') }}

        <div class="field">
            <label class="label" for="">Event Name</label>
            <div class="control">
                <input value="{{ $product->name }}" name="name" id="name" type="text" class="input @error('name') is-invalid @enderror" required autocomplete="name" placeholder="Masukkan nama produk" autofocus>

                @error('name')
                    <strong>{{ $message }}</strong>
                @enderror

            </div>
        </div>

        <div class="field">
            <label class="label" for="">Facility</label>
            <div class="control">

                <textarea name="facility" id="name" class="textarea @error('facility') is-invalid @enderror">{{ $product->facility }}</textarea>

                @error('facility')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="columns">

            <div class="field column">
                <label class="label" for="">Strat Date</label>
                <div class="control">
                    <input value="{{ $product->start_at }}" name="start_at" id="start_at" type="date" class="input" />
                </div>
            </div>

            <div class="field column">
                <label class="label" for="">Finish Date</label>
                <div class="control">
                    <input value="{{ $product->finish_at}}" name="finish_at" type="date" />
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label" for="">Price</label>
            <div class="control">
                <input value="{{ $product->price }}" name="price" id="price" type="number" class="input" placeholder="Rp." />
            </div>
        </div>

        <div class="columns">
            <div class="column is-2">

                <img id="imagePreview" class="image-uploaded" src="{{ asset('/storage/products/'. $product->img ) }}"
                style="object-fit: cover;" alt="Image Upload">

            </div>
    
            <div class="column">
    
                <div class="field">
                    <label class="label">Upload</label>
    
                    <div id="file-js-example" class="file has-name">
                        <label class="file-label">
                            <input type="file" name="img" id="imgInp" class="file-input">
    
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Choose a file…
                                </span>
                            </span>
                            <span class="file-name">
                                No file uploaded
                            </span>
                        </label>
                    </div>
    
                </div>
    
            </div>
        </div>
        
        <br>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-medium is-primary">
                    Simpan
                </button>
            </div>
        </div>

    </form>
</div>


@endsection
