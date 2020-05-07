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
    {{ method_field('patch') }}

    <div class="field">
        <label class="label">Photo</label>
        <div class="control">
            <div class="file has-name is-right is-fullwidth">
                <label class="file-label">
                    <input type="file" name="img_photo">
                    
                </label>
            </div>
        </div>

        @error('name')
        <p class="help">{{ $message }}</p>
        @enderror
    </div>


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
        <label class="label">Jenis Kelamin</label>

        <div class="control">
            <div class="select is-rounded">
                <select name="gender">
                    <option value="Pria" {{ ($user->punyaProfile->gender == 'Pria') ? 'selected' : '' }}>Pria</option>
                    <option value="Wanita" {{ ($user->punyaProfile->gender  == 'Wanita') ? 'selected' : '' }}>Wanita
                    </option>
                </select>
            </div>
        </div>

        @error('phone')
        <p class="help">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label class="label">Phone</label>
        <div class="control">

            <input value="{{ $user->punyaProfile->phone }}" name="phone" id="phone"
                class="input @error('phone') is-invalid @enderror" type="number" placeholder="Placeholder input field">
        </div>

        @error('phone')
        <p class="help">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="level-right button is-primary">Simpan Profile</button>

</form>

<script>
    // Close Notif 
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });

</script>

@endsection
