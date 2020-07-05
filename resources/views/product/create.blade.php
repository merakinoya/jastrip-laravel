@extends('layouts.app')

@section('content')

<div class="columns">
    <div class="column has-text-left">
        <h1 class="title">Bulma Card Layout Template</h1><br>
    </div>
    <div class="column has-text-right">
        <h1 class="title"><a href="{{ url('/products/create') }}">+ Add New</a></h1><br>
    </div>
</div>

<div class="columns">


    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"
        class="column is-three-fifths is-offset-one-fifth">
        @csrf

        <div class="field">
            <label class="label" for="">Event Name</label>
            <div class="control">
                <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" required
                    autocomplete="name" placeholder="Masukkan nama produk" autofocus>

                @error('name')
                    <strong>{{ $message }}</strong>
                @enderror

            </div>
        </div>

        <div class="field">
            <label class="label" for="">Facility</label>
            <div class="control">

                <textarea name="facility" id="name" class="textarea @error('facility') is-invalid @enderror"
                    autocomplete="facility" placeholder="Masukkan fasilitas" autofocus></textarea>

                @error('facility')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="columns">

            <div class="field column">
                <label class="label" for="">Strat Date</label>
                <div class="control">
                    <input name="start_at" id="start_at" type="date" class="input">


                </div>
            </div>

            <div class="field column">
                <label class="label" for="">Finish Date</label>
                <div class="control">
                    <input name="finish_at" id="finish_at" type="date" class="input">


                </div>
            </div>
        </div>

        <div class="field">
            <label class="label" for="">Price</label>
            <div class="control">
                <input name="price" id="price" type="number" class="input" placeholder="Rp." >
            </div>
        </div>

        <div class="columns">
            <div class="column is-2">

                <img id="imagePreview" class="image-uploaded" src="https://bulma.io/images/placeholders/128x128.png"
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
        

        <!--
        <div class="field">
            <label class="label" for="">Seller</label>
            <div class="control">
                <div class="select is-rounded">
                    <select name="seller_id">
                        @foreach($seller as $data) <option value="{{ $data->id }}">{{ $data->name }}</option> @endforeach
                    </select>
                </div>
            </div>
        </div>
        -->

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
