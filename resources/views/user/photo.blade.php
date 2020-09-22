@extends('layouts.app')

@section('content')


<section class="container">
    
    <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb bg-white px-0">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}" class="">
                    <i data-feather="arrow-left" width="16" height="16"></i> Back</a>
            </li>
            <li class="breadcrumb-item active text-truncate" aria-current="page">{{ $pagename }}</li>
        </ol>
    </nav>

    


    @if (session('status'))
    <div id="snackbar" class="notification is-info is-light">
        <button class="delete"></button>
        <strong>Message</strong>
        {{ session('status') }}
    </div>
    @endif


    <div class="container">
        <form method="POST" action="{{ route('userprofile.uploadPhoto') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                @if(!Auth::user()->punyaProfile->img_photo)
                <img id="imagePreview" class="image-uploaded mb-4" src="https://bulma.io/images/placeholders/128x128.png" style="border: 1px #000000; border-radius: 8px; object-fit: cover;" alt="Image Upload" />
                @else
                @if(file_exists( public_path().'/uploads/images/'.Auth::user()->punyaProfile->img_photo ))
                <img id="imagePreview" class="image-uploaded mb-4" src="{{ asset('/uploads/images/'. Auth::user()->punyaProfile->img_photo ) }}" style="border: 1px #000000; border-radius: 8px; object-fit: cover;" alt="Image Upload" />
                @else
                <img id="imagePreview" class="image-uploaded mb-4" src="{{ Auth::user()->punyaProfile->img_photo }}" style="border: 1px #000000; border-radius: 8px; object-fit: cover;" alt="Image Upload" />
                @endif
                @endif

                <div id="file-js-example" class="custom-file">
                    <input type="file" name="img_photo" id="imgInp" class="custom-file-input @error('img') is-invalid @enderror" required />
                    <label class="file-name custom-file-label" for="imgInp">{{ Auth::user()->punyaProfile->img_photo }}</label>

                    @error('img')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Photo</button>
        </form>
    </div>

</section>

@endsection