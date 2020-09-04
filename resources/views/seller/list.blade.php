@extends('layouts.app')
@section('content')


<section class="container">
    
    @if ($message = Session::get('success'))
    <p>{{ $message }}</p>
    @endif


    <table class="table">
        <thead>
            <tr>
                <th>Seller Name</th>
                <th>User ID</th>
                <th>Products</th>
            </tr>
        </thead>
        <tbody>

            @foreach($sellers as $dataSeller)
            <tr>
                <td>
                    {{ (!$dataSeller->name )? "Unknown" : $dataSeller->name }}
                </td>
                <td>{{ $dataSeller->user_id }}</td>

                <td>
                    @foreach ($dataSeller->punyaProducts as $dataProduct)
                    {{ $dataProduct->name }} <br>
                    @endforeach
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>


</section>

@endsection