@extends('layouts.app')
@section('content')


<section class="container">

    <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb bg-white px-0">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}" class="">
                    <i data-feather="arrow-left" width="16" height="16"></i> Back</a>
            </li>
            <li class="breadcrumb-item active text-truncate" aria-current="page">Edit Profile</li>
        </ol>
    </nav>


    @if(session('status'))
    <div class="alert alert-primary" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('userprofile.update') }}" enctype="multipart/form-data" class="container">
        @csrf
        <!-- method_field('PUT')-->

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
                <input type="file" name="img_photo" id="imgInp" class="@error('img') is-invalid @enderror custom-file-input col-4" />

                <label class="file-name custom-file-label" for="imgInp">

                    @if(!Auth::user()->punyaProfile->img_photo)
                     Upload Photo Profile
                    @else
                        {{ Auth::user()->punyaProfile->img_photo }}
                    @endif
                </label>

                @error('img')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ $user->name}}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Placeholder input field">
            @error('name')
            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>

            <div class="form-control-plaintext @error('gender') is-invalid @enderror">
    
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="option1" value="0" {{ ($user->punyaProfile->gender =="0" )? "checked" : "" }} />
                    <label class="form-check-label" for="option1">Laki-Laki</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="option2" value="1" {{ ($user->punyaProfile->gender =="1" )? "checked" : "" }} />
                    <label class="form-check-label" for="option2">Perempuan</label>
                </div>
            </div>
        </div>
        @error('gender')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
        </div>


        <div class="form-group">
            <label>Phone</label>
            <input value="{{ $user->punyaProfile->phone  }}" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" type="tel" placeholder="08.." />

            @error('phone')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Simpan Profile</button>
        </div>

    </form>

</section>

@endsection