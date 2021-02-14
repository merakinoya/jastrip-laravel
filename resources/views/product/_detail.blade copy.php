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
            <li class="breadcrumb-item active text-truncate" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-md-5 foto-produk">
                <div id="carouselExampleCaptions" class="carousel slide sticky-top-produk" data-ride="carousel">

                    <div class="carousel-inner carousel-custom">
                        <div class="carousel-item active">
                            <a data-toggle="modal" data-target="#exampleModal">
                                <img src="{{ asset('/uploads/products/'. $product->img )}}" class="img-object-fit" alt="PhotoEvent" />
                            </a>
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

            <div class="col-md-7">
                <div class="media">
                    <!--  <img class="align-self-start mr-3 invisible" src="/icon/ic-trip.svg" alt="Generic placeholder image"> -->
                    <div class="media-body pb-2">
                        <h2 class="font-weight-bold text-black text-capitalize">{{ $product->name }}</h2>
                        {{ $product->dipunyaiUser->name }}
                        <?php echo $product->description ?>
                    </div>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0">
                        <i data-feather="calendar" class="mr-3"></i>
                        {{ date('d M Y',strtotime($product->start_at)) }} - {{ date('d M Y',strtotime($product->finish_at)) }}
                    </li>

                    <li class="list-group-item px-0">
                        <i data-feather="users" class="mr-3"></i>{{ $product->total_participant }} Peserta
                    </li>

                    <li class="list-group-item px-0">
                        <i data-feather="map-pin" class="mr-3"></i>Meet Point {{ $product->meet_point }}
                    </li>
                </ul>

                <hr> <!-- Divider -->


                <h3 class="mb-4">Fasilitas</h3>
                <dl><?php echo $product['facility'] ?></dl>

                <hr> <!-- Divider -->


                <h3 class="mb-4">Terms & Condition</h3>
                <dl>
                    <?php echo $product->terms_condition ?>
                </dl>

                <!--
                <h3 class="mb-4">Lokasi</h3>
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41711.325973765015!2d110.42902199738165!3d-7.452603138203962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a7b455e544767%3A0xf7af0c6e80ad2dde!2sMount%20Merbabu!5e0!3m2!1sen!2sid!4v1593963862981!5m2!1sen!2sid"></iframe>
                </div>
            -->

                <hr> <!-- Divider -->

                <h3 class="mb-4">Diposting oleh</h3>
                <ul class="list-unstyled">
                    <li class="media my-4">
         
                        @if(!$product->dipunyaiUserProfile->img_photo)
                        <div class="placeholder-image mr-2" style="width:52px; height:52px;">
                            <span class="placholder-text text-capitalize">
                                @foreach (explode(" ", $product->dipunyaiUser->name); as $w)
                                {{ $w[0] }}
                                @endforeach
                            </span>
                        </div>
                        @else

                        @if(file_exists( public_path().'/uploads/images/'. $product->dipunyaiUserProfile->img_photo ))
                        <img class="rounded-circle mb-4" style="width: 52px; height: 52px;" src="{{ asset('/uploads/images/'. $product->dipunyaiUserProfile->img_photo ) }}" alt="Profile" />
                        @else
                        <img class="rounded-circle mb-4" style="width: 52px; height: 52px;" src="{{ $product->dipunyaiUserProfile->img_photo }}" alt="Profile" />
                        @endif

                        @endif

                        <div class="media-body">
                            <h5 class="mb-1">{{ $product->dipunyaiUser->name }}</h5>

                            <small class="text-muted">Bergabung sejak {{ date('d M Y',strtotime($product->dipunyaiUser->created_at )) }}</small>
                        </div>
                    </li>
                </ul>
                <!-- 
                <h3 class="mb-4">Reviews</h3>
                <ul class="list-unstyled">
                    <li class="media my-4">
                        <img class="mr-3 rounded-circle" src="https://source.unsplash.com/b1Hg7QI-zcc/48x48" alt="Generic placeholder image">
                        <div class="media-body">
                            <div class="d-flex">
                                <h5 class="mt-0 mb-1">Adinda Sakinah Julia</h5>
                                <div class="ml-auto">
                                    <i class="feather-icon-16" data-feather="star"></i>
                                    <i class="feather-icon-16" data-feather="star"></i>
                                    <i class="feather-icon-16" data-feather="star"></i>
                                    <i class="feather-icon-16" data-feather="star"></i>
                                    <i class="feather-icon-16" data-feather="star"></i>
                                </div>
                            </div>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                            sollicitudin.
                            Cras
                            purus odio,
                        </div>
                    </li>
                </ul>
            -->

            </div>
        </div> <!-- row -->

    </div> <!-- container -->

    <!-- Bottom Nav-->
    <nav class="navbar navbar-expand-md navbar-light fixed-bottom bg-white shadow-lg border-top">
        <div class="container">
            <div class="d-flex flex-column bd-highlight">
                <h5 class="mb-0">Rp{{ number_format($product->price, 0, '', '.') }}</h5>
                <small> /{{ $product->total_participant }} orang</small>

            </div>
            @if($product->dipunyaiUserProfile->phone)
            <a href="https://wa.me/62{{ $product->dipunyaiUserProfile->phone }}?text={{ utf8_encode("Hallo, Saya tertarik melihat iklan trips Anda, Saya mau ikut join trips")}}" target="_blank" class="btn btn-primary btn-lg float-right">
                <i data-feather="message-circle"></i> Hubungi
            </a>
            @else
            <a href="https://wa.me/6282219259952?text={{ utf8_encode("Hallo admin, Saya tertarik melihat iklan trips Anda, Saya mau ikut join trips")}}" target="_blank" class="btn btn-primary btn-lg float-right">
                <i data-feather="message-circle"></i> Hubungi
            </a>
            @endif

        </div>
    </nav>

</section>


@endsection