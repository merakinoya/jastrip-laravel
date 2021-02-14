@extends('layouts.app')
@section('content')
<!-- Place Your Code HTML in here-->


<section class="container">

    <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb bg-white px-0">
            <li class="breadcrumb-item">
                <a href="{{ url()->previous() }}" class="">
                    <i data-feather="arrow-left" width="16" height="16"></i> Back</a>
            </li>
            <li class="breadcrumb-item active text-truncate" aria-current="page">Booking</li>
        </ol>
    </nav>





    <div class="container">

        <div class="row">

            <div class="col-md-7">

                <form method="POST" action="{{ route('booking.store', $product->id) }}" enctype="multipart/form-data" class="">
                    @csrf

                    <h5 class="mb-2 text-bold">
                        Jumlah Partisipan
                    </h3>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="number" id="number" name="participant_amount" value="0" min="1" max="{{ $product->total_participant }}" step="1" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="0" required
                                    tabindex="6">
                            </div>
                        </div>


                        <hr> <!-- Divider -->

                        <div class="media m-0">
                            <div class="media-body">
                                <h5 class="mt-0">Info Partisipan</h5>
                                <p class="text-black-50">Mohon masukkan nama sesuai kartu identitas</p>

                                <div id="forms"></div>

                            </div>
                        </div>


                        <hr> <!-- Divider -->

                        <button type="submit" id="booking-button" class="btn btn-primary btn-lg">
                            Booking
                        </button>

                </form>
            </div>





            <div class="col-md-5 foto-produk user-select-none">

                <div id="carouselExampleCaptions" class="carousel slide sticky-top-produk" data-ride="carousel">
                    <div class="card" style="height: 480px; border-radius: 12px;">


                        <div class="card-body">

                            <a data-toggle="modal" data-target="#exampleModal">
                                <div class="media">
                                    <img src="{{ asset('/uploads/products/'. $product->img )}}" class="align-self-start mr-3 img-object-fit" style="width:88px; height: 88px;" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $product->name }}</h5>
                                        <p class="text-black-50 text-muted text-truncate">
                                            {{ $product->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <hr>

                            <h5 class="card-title">Facility</h5>
                            <p class="card-text text-black-50 text-muted text-truncate">{{ strip_tags($product['facility']) }}</p>

                            <table class="table table-borderless m-0 p-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="pl-0">Rincian Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="pl-0">Trips x 1 orang</td>
                                        <th scope="row" class="float-right pr-0">Rp{{ number_format($product->price, 0, '', '.') }}</th>
                                    </tr>
                                    <tr>
                                        <td class="pl-0">Biaya operasional</td>
                                        <th scope="row" class="float-right pr-0">Rp5.000</th>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>



                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $product->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('/uploads/products/'. $product->img )}}" class="img-object-fit" alt="PhotoEvent" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div> <!-- col-md-5 side left -->




        </div> <!-- row -->

    </div> <!-- container -->

</section>




@endsection