@extends('layouts.app')

@section('content')



<section class="container pt-3">

    <h1 class="my-4">
        Buat Trip
    </h1>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Event Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" placeholder="Judul Trips / Event" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" autocomplete="description" placeholder="Berikan gambaran Perjalanan yang akan peserta kunjungi" autofocus></textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="row">
            <div class="form-group col">
                <label for="">Price</label>
                <input name="price" id="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Rp" />
                @error('price')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="">Total Participant</label>
                <input name="total_participant" id="total_participant" type="number" class="form-control @error('total_participant') is-invalid @enderror" placeholder="Jumlah Peserta" />
                @error('total_participant')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col">
                <label for="">Start Date</label>
                <input name="start_at" id="start_at" type="date" class="form-control">
            </div>

            <div class="form-group col">
                <label for="">Finish Date</label>
                <input name="finish_at" id="finish_at" type="date" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="meet_point">Meet Point</label>
            <input  name="meet_point" id="meet_point" type="text" class="form-control @error('meet_point') is-invalid @enderror" required autocomplete="meet_point" placeholder="Tentukan Nama Lokasi Titik Temu Peserta" autofocus>
            @error('meet_point')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Facility</label>
            <textarea name="facility" id="textarea-editor" class="form-control @error('facility') is-invalid @enderror" autocomplete="facility" placeholder="Masukkan fasilitas" autofocus></textarea>
            @error('facility')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Terms & Condition</label>
            <textarea name="terms_condition" id="terms_condition" class="form-control @error('terms_condition') is-invalid @enderror" autocomplete="terms_condition" placeholder="Syarat & Ketentuan Trips" autofocus></textarea>
            @error('terms_condition')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>




        <div class="form-group">
            <img id="imagePreview" class="image-uploaded mb-4" style="border: 1px #000000; border-radius: 8px;" src="https://bulma.io/images/placeholders/128x128.png" style="object-fit: cover;" alt="Image Upload">

            <div id="file-js-example" class="custom-file">
                <input type="file" name="img" id="imgInp" class="custom-file-input" required />
                <label class="file-name custom-file-label" for="imgInp">No file uploaded</label>

                @error('img')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <!-- Seller
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


        <button type="submit" class="btn btn-primary mt-1">
            Simpan
        </button>

    </form>

</section>

<script>
    CKEDITOR.replace( 'facility' );
</script>


@endsection