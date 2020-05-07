@extends('layouts.app')

@section('content')
<section class="hero is-large is-bold">
    <div class="hero-body" style="padding-top: 100px;">
        <div class="container">


            <!-- Place Your Code HTML in here-->

            <form method="POST" action="{{ route('seller.store') }}">
                @csrf

                <div class="field">
                    <label class="label" for="">Seller Name</label>
                    <div class="control">
                        <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name"
                            required autocomplete="name" placeholder="Masukkan nama produk" autofocus>

                        @error('name')
                        <strong>{{ $message }}</strong>
                        @enderror

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
