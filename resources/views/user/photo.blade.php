@extends('layouts.app')

@section('content')

@if (session('status'))
<div id="snackbar" class="notification is-info is-light">
    <button class="delete"></button>
    <strong>Message</strong>
    {{ session('status') }}
</div>
@endif



<form method="POST" action="{{ route('userprofile.uploadPhoto') }}" enctype="multipart/form-data">
    @csrf

    <div class="columns">
        <div class="column is-2">

            @if (Auth::user()->punyaProfile)
            <img id="imagePreview" class="image-uploaded" src="{{ asset('/storage/images/'. Auth::user()->punyaProfile->img_photo ) }}">
            @else
            <img id="imagePreview" class="image-uploaded" src="https://bulma.io/images/placeholders/128x128.png"
                style="object-fit: cover;" alt="Image Upload">
            @endif
        </div>

        <div class="column">

            <div class="field">
                <label class="label">Upload</label>

                <div id="file-js-example" class="file has-name">
                    <label class="file-label">
                        <input type="file" name="img_photo" id="imgInp" class="file-input">

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



            <div class="field">
                <div class="control">
                    <button type="submit" class="level-right button is-primary">Simpan Photo</button>
                </div>
            </div>

        </div>
    </div>

    </div>

</form>

@endsection
