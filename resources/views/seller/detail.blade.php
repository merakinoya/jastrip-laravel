@extends('layouts.app')

@section('content')

<table class="table">
<thead>
    <tr>
      <th>Product Name</th>
    </tr>
  </thead>
<tbody>
    @foreach($productinhtml as $dataproduct)
    <tr>
        <td>{{ $dataproduct->name }}</td>
        
    </tr>
    @endforeach
</tbody>

</table>


@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif


@endsection
