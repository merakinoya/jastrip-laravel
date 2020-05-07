@extends('layouts.app')

@section('content')
<section class="hero is-large is-bold">
    <div class="hero-body" style="padding-top: 100px;">
        <div class="container">


            <!-- Place Your Code HTML in here-->

            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                <div class="field">
                    <label class="label" for="">Event Name</label>
                    <div class="control">
                        <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name"
                            required autocomplete="name" placeholder="Masukkan nama produk" autofocus>

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
                        <input name="price" id="price" type="number" class="input">


                    </div>
                </div>

                <div class="field">
                    <label class="label" for="">Seller</label>

                    <div class="control">
                        <div class="select is-rounded">
                            <select name="seller_id">
                                @foreach ($seller as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="field spacing">
                    <button type="submit" class="button is-medium is-primary">
                        Simpan
                    </button>
                </div>

            </form>


        </div>
    </div>
</section>

@endsection
