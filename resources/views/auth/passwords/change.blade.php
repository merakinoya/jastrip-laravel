@extends('layouts.app')
@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


<form class="form-horizontal" method="POST" action="{{ route('userprofile.updatePassword') }}">
    @csrf

    <!-- CURRENT PASSWORD --->
    <div class="field">
        <label class="label">{{ __('Password') }}</label>
        <p class="control has-icons-left">
            <input id="current-password" name="current-password" type="password"
                class="input @error('password') is-invalid @enderror" required autocomplete="new-password">

            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </p>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>


    <!-- NEW PASSWORD --->
    <div class="field">
        <label class="label">{{ __('Password') }}</label>
        <p class="control has-icons-left">
            <input id="new-password" name="new-password" type="password"
                class="input @error('password') is-invalid @enderror" required autocomplete="new-password">

            <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
            </span>
        </p>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>

    <div class="field">
        <button type="submit" class="button is-medium is-primary">
            Ubah Password
        </button>

    </div>




</form>


@endsection
