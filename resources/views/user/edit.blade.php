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


    @if(session('status'))
    <div class="alert alert-primary" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('userprofile.update', $user) }}" enctype="multipart/form-data" class="container">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ $user->name }}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Placeholder input field">
            @error('name')
            <span class="invalid-feedback" role="alert"> {{ $message }} </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="gender">Gender</label>

            <div class="form-control-plaintext @error('gender') is-invalid @enderror">
                @if (Auth::user()->punyaProfile)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="option1" value="0" {{ ($user->punyaProfile->gender =="0" )? "checked" : "" }} />
                    <label class="form-check-label" for="option1">Laki-Laki</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="option2" value="1" {{ ($user->punyaProfile->gender =="1" )? "checked" : "" }} />
                    <label class="form-check-label" for="option2">Perempuan</label>
                </div>
                @endif
            </div>
        </div>
        @error('gender')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
        @enderror
        </div>


        <div class="form-group">
            <label>Phone</label>

            @if (Auth::user()->punyaProfile)
            <input value="{{ $user->punyaProfile->phone  }}" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" type="tel" placeholder="08.." />
            @endif

            @error('phone')
            <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Simpan Profile</button>
        </div>

    </form>

</section>

@endsection