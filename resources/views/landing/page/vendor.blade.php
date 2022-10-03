@extends('landing.layout.main')

@section('content')
    <style>
        .card {
            max-width: 12rem;
        }

        .card-image {
            position: relative;
            height: 176px;
        }

        .card-image img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .overplay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            opacity: 0;
            visibility: none;
            transition: 0.5s ease;
            background-color: #393839;

            text-align: center;
            color: #fff;

            /* Flex Box */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card:hover .overplay {
            opacity: 1;
        }
    </style>
    <div class="container-fluid">
        {{-- Vendor Section --}}
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-9 col-xl-6">
                <h3 style="font-weight: 600;" class="text-center">APA ITU VENDOR?</h3>
                <p style=" text-align: justify;">Dikutip dari Investopedia, vendor adalah pihak dalam rantai pasok yang
                    dibayar untuk menyediakan barang dan jasa bagi pihak lain. Vendor bisa berarti produsen atau bisa
                    diartikan pula distributor.</p>
            </div>
        </div>
        {{-- End Vendor Section --}}

        {{-- Our Best Vendor Section --}}
        <div class="row justify-content-center py-5" style="background-color: #F5F5F7;">
            <div class="col-12 col-md-9 col-xl-6 text-center">
                <h3 style="font-weight: 600;">VENDOR TERBAIK KAMI?</h3>
                <p>Kami menghadirkan Vendor-Vendor terbaik dari yang terbaik.</p>
                <h4 class="mt-5">KLIK "LIHAT DETAIL" UNTUK MELIHAT INFO LEBIH LANJUT</h4>
            </div>
        </div>
        {{-- End Our Best Vendor Section --}}




        <style>
            .card-title {
                height: 48px;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
            }

            .card-title h5 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .btn-outline-primary:hover {
                color: white !important;
            }
        </style>
        {{-- The Vendors Section --}}
        <div class="row justify-content-evenly py-5">
            <div class="col-12 mb-5">
                <div class="row justify-content-center">
                    <div class="col-12 text-center mb-3">
                        <h3>Konsep</h3>
                    </div>
                    @foreach ($themes as $theme)
                        <div class="col-6 col-sm-4 col-xl-2 mb-3">
                            <div class="card">
                                <div class="card-image">
                                    <img src="{{ asset('storage/' . $theme->thumbnail) }}">
                                    <div class="overplay">
                                        <h5 class="text-center text-white">{{ $theme->name }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-title mb-3">
                                        <h5 class="m-0">{{ $theme->name }}</h5>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm w-100">Lihat Detail</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @foreach ($vendors['vendor_type_id'] as $vendor_type_id)
                <div class="col-12 col-lg-5 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center mb-3">
                            <h3>{{ $vendors['vendor'][$vendor_type_id][0]->vendorType->name }}</h3>
                        </div>
                        @foreach ($vendors['vendor'][$vendor_type_id] as $vendor)
                            <div class="col-6 col-sm-4 col-md-3 col-lg-5 col-xxl-4 mb-3">
                                <div class="card" style="margin: auto;">
                                    <div class="card-image">
                                        <img src="{{ asset('storage/' . $vendor->logo) }}">
                                        <div class="overplay">
                                            <h5 class="text-center text-white">{{ $vendor->name }}</h5>
                                            <h5 class="text-center text-white">
                                                Rp {{ number_format($vendor->price, 0, ',', '.') }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title mb-3">
                                            <h5 class="m-0">{{ $vendor->name }}</h5>
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm w-100">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        {{-- End The Vendors Section --}}
    </div>
@endsection
