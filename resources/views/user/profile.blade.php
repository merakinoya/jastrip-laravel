@extends('layouts.app')

@section('content')


<section class="container container-xl">

    @if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-4 mt-3">
            <div class="d-flex flex-row bd-highlight">

                <a href="{{ route('userprofile.photo') }}">
                    @if(!Auth::user()->punyaProfile->img_photo)
                    <div class="placeholder-image mr-2" style="width:52px; height:52px;">
                        <span class="placholder-text text-capitalize">
                            @foreach (explode(" ", Auth::user()->name); as $w)
                            {{ $w[0] }}
                            @endforeach
                        </span>
                    </div>
                    @else

                    @if(file_exists( public_path().'/uploads/images/'.Auth::user()->punyaProfile->img_photo ))
                    <img class="rounded-circle mb-4" style="width: 52px; height: 52px;" src="{{ asset('/uploads/images/'. Auth::user()->punyaProfile->img_photo ) }}" alt="Profile" />
                    @else
                    <img class="rounded-circle mb-4" style="width: 52px; height: 52px;" src="{{ Auth::user()->punyaProfile->img_photo }}" alt="Profile" />
                    @endif

                    @endif
                </a>

                <div class="list-group ml-3">
                    <h2 class="text-capitalize">
                        {{ Auth::user()->name }}
                    </h2>

                    <a href="{{ route('userprofile.edit') }}">Edit Profil</a>
                </div>
            </div>

            <hr>

            <div class="nav-scroller">
                <div class="nav nav-pills scrollable flex-sm-column flex-row sticky-top-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">


                    @if(Auth::user()->punyaSeller)
                    <a class="nav-item nav-link text-nowrap @if(!session('error')) active @endif" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Toko
                        {{ $user->punyaSeller->name }}</a>
                    @else
                    <a class="nav-item nav-link text-nowrap @if(!session('error')) active @endif" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Daftar Seller</a>
                    @endif

                    <a class="nav-item nav-link text-nowrap" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Transaction</a>

                    <a class="nav-item nav-link text-nowrap" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Settings</a>

                    <a class="nav-item nav-link text-nowrap  @if(session('error')) active @endif" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Change
                        Password</a>

                </div>
            </div>
        </div>


        <div class="col-md-8 mt-3">

            @if(Auth::user()->punyaProfile->gender == NULL || Auth::user()->punyaProfile->phone == NULL || Auth::user()->punyaProfile->img_photo == NULL )
            <div class="alert alert-info alert-dismissible fade show mb-1" role="alert" style="background-color: #ffffff00;">
                <strong>💁🏻 Data Profil Kamu belum lengkap</strong> silakan lengkapi profil mu.
                <button type="button" class="close">
                    <i data-feather="arrow-right-circle"></i>
                </button>
                <a href="{{ route('userprofile.edit', $user) }}" class="stretched-link"></a>
            </div>
            <hr>
            @endif

            <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade @if(!session('error')) show active @endif" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row mb-4">
                        @if(Auth::user()->punyaSeller)
                        <h4 class="font-weight-bolder col">{{ Auth::user()->punyaSeller->name }}</h4>
                        @else
                        <h4 class="font-weight-bolder col">Store</h4>
                        @endif

                        <a href="{{ route('sellerprofile.edit', $user) }}" class="col text-right">Edit</a>
                    </div>

                    <hr>
                    <div class="row mb-4">
                        <h4 class="font-weight-bolder col">My Products</h4>
                        <a href="{{ url('/products/create') }}" class="col text-right">+ Add Products</a>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">


                        @foreach(Auth::user()->punyaProducts as $dataproduct )

                        <div class="col mb-4">
                            <div class="card border-0 shadow rounded-lg">
                                <a class="position-absolute-custom text-white" href="" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                    <i data-feather="{{ ( Auth::user()->punyaSeller->id != $dataproduct->seller_id )? "heart" : "eye" }}"></i>
                                </a>


                                @if(!$dataproduct->img)
                                <img class="card-img-top rounded-top" src="https://source.unsplash.com/x9I-6yoXrXE" alt="Product Photo" />
                                @else
                                <img class="card-img-top rounded-top" src="{{ asset('/uploads/products/'. $dataproduct->img )}}" alt="Product Photo" />
                                @endif

                                <div class="card-body">

                                    <span class="badge badge-info mb-2 mr-2">Camp</span>
                                    <h4 class="card-title mb-1 font-weight-bold text-black text-capitalize text-truncate">{{ $dataproduct->name }}</h4>
                                    <p><small>2 days</small> • <small>10 orang</small>
                                        <br>
                                        <small>{{ date('d M Y',strtotime($dataproduct->start_at)) }}</small>-<small>{{ date('d M Y',strtotime($dataproduct->finish_at)) }}</small>
                                    </p>
                                    <p class="card-text text-muted text-truncate">{{ $dataproduct->description }}
                                        <a href="{{ route('products.show', $dataproduct->id) }}" class="text-muted" target="_blank">detail</a>
                                    </p>

                                    <small class="text-black-50">Updated {{ date('d M Y',strtotime($dataproduct->updated_at)) }} </small>
                                </div>

                                <div class="card-footer">

                                    <form action="{{ route('products.destroy', $dataproduct->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('products.edit', $dataproduct->id) }}" class="btn btn-outline-dark float-right  {{ ( Auth::user()->punyaSeller->id != $dataproduct->seller_id )? "d-none" : "" }}"
                                            style="position: relative;">Edit</a>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link text-muted float-right" data-toggle="modal" data-target="#exampleModal">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">😱 Yakin ingin hapus produk ini?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Produk ini tidak akan bisa ditampilkan kembali
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batalkan</button>
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div> <!-- .row My Products -->
                </div>


                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h4 class="font-weight-bolder mb-4">Transaction</h4>
                    <div class="table-responsive">
                        <table class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <th scope="col">BookID</th>
                                    <th scope="col">Trips Name</th>
                                    <th scope="col">Participant</th>
                                    <th scope="col">Expire Date</th>

                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(Auth::user()->punyaBooking as $booking )

                                <tr>
                                    <th scope="row">{{ $booking->id }}</th>

                                    <td>
                                        <a href="{{ route('products.show', $booking->dipunyaiProduct->id) }}" target="_blank">
                                            {{ $booking->dipunyaiProduct->name }}
                                        </a>
                                    </td>

                                    <td>{{ $booking->participant_amount }} Orang</td>

                                    <td>
                                        {{ date('d M Y, h:i:sa',strtotime($booking->expired_at)) }}
                                        <!--
                                            <span id="expired_at" class="d-none"> $booking->expired_at </span>
                                            <span id="demo"></p>
                                        -->
                                    </td>

                                    <td>
                                        @if($booking->canceled_at == NULL)
                                            <a class="btn btn-outline-primary btn-sm text-wrap">Bayar Sekarang</a>
                                        @else
                                            <a class="badge rounded-pill bg-light text-dark text-wrap">Dibatalakn</a>
                                        @endif
                                    </td>

                                    @if($booking->canceled_at == NULL)
                                    <td>
                                        <form method="POST" action="{{ route('booking.cancel', $booking->id) }}" enctype="multipart/form-data" class="">
                                            @csrf
                                            @method('PATCH')

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-link btn-sm text-muted float-right" data-toggle="modal" data-target="#modal-cancel-booking">
                                                Batalkan Booking
                                            </button>

                                            <div class="modal fade" id="modal-cancel-booking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Alasan Cancel</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label for="reason" class="col-form-label">Alasan Batal</label>
                                                                    <textarea name="reason" id="reason" cols="10" rows="10" class="form-control"></textarea>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Kembali</button>
                                                            <button type="submit" class="btn btn-danger">Ya, Batalkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </td>

                                    @else

                                    <td>
                                        <form action="{{ route('booking.delete', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-link btn-sm text-muted float-right" data-toggle="modal" data-target="#modal-delete-booking">
                                                Delete
                                            </button>

                                            <div class="modal fade" id="modal-delete-booking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">😱 Yakin ingin hapus produk ini?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Produk ini tidak akan bisa ditampilkan kembali
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batalkan</button>
                                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </td>

                                    @endif



                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>







                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <h4 class="font-weight-bolder">Settings</h4>
                </div>



                <div class="tab-pane fade @if(session('error')) show active @endif" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <h4 class="font-weight-bolder mb-4">Change Password</h4>


                    <form method="POST" action="{{ route('userprofile.updatePassword') }}" enctype="multipart/form-data" class="mt-4">
                        @csrf

                        @if(Auth::user()->password)
                        <div class="form-group {{ $errors->has('current-password') ? 'has-error' : '' }}">
                            <label for="old-password">Password Lama</label>
                            <input type="password" name="current-password" id="current-password" class="form-control" placeholder="Masukkan password lama" />

                            @if ($errors->has('current-password'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('new-password') }}</span>
                            @endif
                        </div>
                        @endif

                        <hr>
                        <div class="form-group {{ $errors->has('new-password') ? 'has-error' : '' }}">
                            <label for="new-password">Password Baru</label>
                            <input type="password" name="new-password" class="form-control" id="new-password" placeholder="Masukkan password baru" />
                            @if ($errors->has('new-password'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('new-password') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('current-password') ? 'has-error' : '' }}">
                            <label for="confirm-password">Konfirmasi Password Baru</label>
                            <input type="password" name="new-password_confirmation" id="new-password_confirmation" class="form-control" placeholder="Konfirmasi password baru" />
                            @if ($errors->has('new-password_confirmation'))
                            <span class="invalid-feedback" role="alert">{{ $errors->first('new-password') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Save Password</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


</section>


@endsection