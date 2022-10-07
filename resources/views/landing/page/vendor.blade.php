@extends('landing.layout.main')

@section('content')
    <style>
        .card {
            max-width: 12rem;
        }

        .card-image {
            height: 176px;
        }

        .card-image img {
            object-fit: cover;
            height: 100%;
            width: 100%;
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
                                </div>
                                <div class="card-body">
                                    <div class="card-title mb-3">
                                        <h5 class="m-0">{{ $theme->name }}</h5>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm w-100" data-bs-toggle="modal"
                                    data-bs-target="#detailThemeModal{{ $theme->id }}">Lihat Detail</button>

                                    {{-- Detail Modal --}}
                                    <div class="modal fade" id="detailThemeModal{{ $theme->id }}" tabindex="-1"
                                        aria-labelledby="detailModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel">{{ $theme->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div id="carouselDetailModalControls" class="carousel slide"
                                                        data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach ($theme->themeImages as $i => $themeImage)
                                                                @if (!$i)
                                                                    <div class="carousel-item active">
                                                                        <img src="{{ asset('storage/' . $themeImage->image) }}"
                                                                            style="height:320px; object-fit: cover;"
                                                                            class="d-block w-100">
                                                                    </div>
                                                                @else
                                                                    <div class="carousel-item">
                                                                        <img src="{{ asset('storage/' . $themeImage->image) }}"
                                                                            style="height:320px; object-fit: cover;"
                                                                            class="d-block w-100">
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <button class="carousel-control-prev" type="button"
                                                            data-bs-target="#carouselDetailModalControls"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button"
                                                            data-bs-target="#carouselDetailModalControls"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                    <div class="description p-3">
                                                        {{ $theme->description }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



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
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title mb-3">
                                            <h5 class="m-0">{{ $vendor->name }}</h5>
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm w-100" data-bs-toggle="modal"
                                            data-bs-target="#detailModal{{ $vendor->id }}">Lihat Detail</button>


                                        {{-- Detail Modal --}}
                                        <div class="modal fade" id="detailModal{{ $vendor->id }}" tabindex="-1"
                                            aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel">{{ $vendor->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-0">
                                                        <div id="carouselDetailModalControls" class="carousel slide"
                                                            data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                @foreach ($vendor->vendorImages as $i => $vendorImage)
                                                                    @if (!$i)
                                                                        <div class="carousel-item active">
                                                                            <img src="{{ asset('storage/' . $vendorImage->image) }}"
                                                                                style="height:320px; object-fit: cover;"
                                                                                class="d-block w-100">
                                                                        </div>
                                                                    @else
                                                                        <div class="carousel-item">
                                                                            <img src="{{ asset('storage/' . $vendorImage->image) }}"
                                                                                style="height:320px; object-fit: cover;"
                                                                                class="d-block w-100">
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <button class="carousel-control-prev" type="button"
                                                                data-bs-target="#carouselDetailModalControls"
                                                                data-bs-slide="prev">
                                                                <span class="carousel-control-prev-icon"
                                                                    aria-hidden="true"></span>
                                                                <span class="visually-hidden">Previous</span>
                                                            </button>
                                                            <button class="carousel-control-next" type="button"
                                                                data-bs-target="#carouselDetailModalControls"
                                                                data-bs-slide="next">
                                                                <span class="carousel-control-next-icon"
                                                                    aria-hidden="true"></span>
                                                                <span class="visually-hidden">Next</span>
                                                            </button>
                                                        </div>
                                                        <div class="description p-3">
                                                            {{ $vendor->description }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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
