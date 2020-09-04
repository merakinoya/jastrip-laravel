@extends('layouts.app')
@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Seller Name</th>
            <th>User ID</th>
            <th>Products</th>
        </tr>
    </thead>
    <tbody>
        {{ $sellers->punyaProducts }}

    </tbody>

</table>

@endsection
