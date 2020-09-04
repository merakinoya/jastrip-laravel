@extends('layouts.app')
@section('content')


<section class="container">

  @if(session('status'))
  <div class="alert alert-primary" role="alert">
    {{ session('status') }}
  </div>
  @endif

  <form method="POST" action="{{ route('seller.update', $userseller) }}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}

    <div class="form-group">
      <label for="name">Name</label>
      <input value="{{ $userseller->name }}" name="name" id="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Masukan Nama Toko Anda">
      @error('name')
      <span class="invalid-feedback" role="alert"> {{ $message }} </span>
      @enderror
    </div>


    <button type="submit" class="btn btn-primary">Simpan Profile</button>
    </div>

  </form>

  
</section>

@endsection