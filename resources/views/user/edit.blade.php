@extends('layouts.app')

@section('content')

@if (session('status'))
<div id="snackbar" class="notification is-info is-light">
    <button class="delete"></button>
    <strong>Message</strong>
    {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('userprofile.update', $user) }}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}

    <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input value="{{ $user->name }}" name="name" id="name" class="input @error('name') is-invalid @enderror"
                type="text" placeholder="Placeholder input field">
        </div>

        @error('name')
        <p class="help">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Gender</label>
        <div class="control">
            
            @if (Auth::user()->punyaProfile)
            <div class="control">
                <label class="radio">
                    <input type="radio"  id="option1" name="gender" value="0"  {{ ($user->punyaProfile->gender =="0" )? "checked" : "" }} > Male
                </label>

                <label class="radio">
                    <input type="radio" id="option2" name="gender" value="1" {{ ($user->punyaProfile->gender =="1" )? "checked" : "" }} > Female
                </label>
            </div>
            @else

            <div class="control">
                <label class="radio">
                    <input type="radio"  id="option1" name="gender" value="0" > Male
                </label>

                <label class="radio">
                    <input type="radio" id="option2" name="gender" value="1" > Female
                </label>
            </div>
            
            @endif


        </div>

        @error('phone')
        <p class="help">{{ $message }}</p>
        @enderror
    </div>


    <div class="field">
        <label class="label">Phone</label>
        <div class="control">

            @if (Auth::user()->punyaProfile)
                <input value="{{ $user->punyaProfile->phone  }}" name="phone" id="phone" class="input @error('phone') is-invalid @enderror" type="number" placeholder="08..">
            @else
                <input name="phone" id="phone" class="input @error('phone') is-invalid @enderror" type="number" placeholder="08..">
            @endif


        </div>

        @error('phone')
        <p class="help">{{ $message }}</p>
        @enderror
    </div>

    

    <div class="field is-grouped">
        <div class="control">
          <button type="submit" class="level-right button is-primary">Simpan Profile</button>
        </div>
      </div>

</form>

@endsection
