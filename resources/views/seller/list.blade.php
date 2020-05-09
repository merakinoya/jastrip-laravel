@extends('layouts.app')

@section('content')

<!-- Place Your Code HTML in here-->

<table class="table">
    <thead>
        <tr>
            <th>Seller Name</th>
            <th>Products</th>
        </tr>
    </thead>
    <tbody>
        @foreach($seller as $dataseller)
        <tr>
            <td>{{ $dataseller->name }}</td>

            <td>
                @foreach ($dataseller->punyaProducts as $dataproduk)
                {{ $dataproduk->name }}
                @endforeach
            </td>

        </tr>
        @endforeach
    </tbody>

</table>


@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif


@endsection
