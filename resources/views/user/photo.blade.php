@extends('layouts.app')

@section('content')

@if (session('status'))
<div id="snackbar" class="notification is-info is-light">
    <button class="delete"></button>
    <strong>Message</strong>
    {{ session('status') }}
</div>
@endif



<form method="POST" action="{{ route('userprofile.store') }}" enctype="multipart/form-data" class="dropzone" id="drop-upload">
    @csrf

    <input type="file" name="img_photo">

    <button type="submit" class="level-right button is-primary">Simpan Profile</button>

</form>

<script>
    $("#drop-upload").dropzone({ url: "/public/storage" });
</script>

@endsection
