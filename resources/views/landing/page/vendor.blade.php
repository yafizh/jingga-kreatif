@extends('landing.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-9 col-xl-6">
                <h3 class="text-center">Apa itu Vendor</h3>
                <p style=" text-align: center;">Dikutip dari Investopedia, vendor adalah pihak dalam rantai pasok yang
                    dibayar untuk menyediakan barang dan jasa bagi pihak lain. Vendor bisa berarti produsen atau bisa
                    diartikan pula distributor.</p>
            </div>
        </div>

        <div class="row justify-content-center py-5 striped">
            <div class="col-12 col-md-9 col-xl-6 text-center">
                <h3>Vendor Terbaik Kami</h3>
                <p>Kami menghadirkan Vendor-Vendor terbaik dari yang terbaik.</p>
                <h4 class="mt-5">KLIK "LIHAT DETAIL" UNTUK MELIHAT INFO LEBIH LANJUT</h4>
            </div>
        </div>

        <div id="theme-vendor-container" class="row justify-content-evenly py-5">
            <div class="col-12 mb-5 theme-shimer">
                <div class="row justify-content-center">
                    <div class="col-12 d-flex justify-content-center mb-3">
                        <h3 class="shimer-title btn animate"></h3>
                    </div>
                    <div class="col-6 col-sm-4 col-xl-2 mb-3">
                        <div class="card">
                            <div class="card-image animate"></div>
                            <div class="card-body">
                                <div class="btn card-title shimer-card-title animate mb-3"></div>
                                <div class="shimer-card-button animate btn w-100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-xl-2 mb-3">
                        <div class="card">
                            <div class="card-image animate"></div>
                            <div class="card-body">
                                <div class="btn card-title shimer-card-title animate mb-3"></div>
                                <div class="shimer-card-button animate btn w-100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 mb-5 vendor-shimer">
                <div class="row justify-content-center">
                    <div class="col-12 d-flex justify-content-center mb-3">
                        <h3 class="shimer-title btn animate"></h3>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-5 col-xxl-4 mb-3">
                        <div class="card">
                            <div class="card-image animate"></div>
                            <div class="card-body">
                                <div class="btn card-title shimer-card-title animate mb-3"></div>
                                <div class="shimer-card-button animate btn w-100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-5 col-xxl-4 mb-3">
                        <div class="card">
                            <div class="card-image animate"></div>
                            <div class="card-body">
                                <div class="btn card-title shimer-card-title animate mb-3"></div>
                                <div class="shimer-card-button animate btn w-100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-5 col-xxl-4 mb-3">
                        <div class="card">
                            <div class="card-image animate"></div>
                            <div class="card-body">
                                <div class="btn card-title shimer-card-title animate mb-3"></div>
                                <div class="shimer-card-button animate btn w-100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 mb-5 vendor-shimer">
                <div class="row justify-content-center">
                    <div class="col-12 d-flex justify-content-center mb-3">
                        <h3 class="shimer-title btn animate"></h3>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-5 col-xxl-4 mb-3">
                        <div class="card">
                            <div class="card-image animate"></div>
                            <div class="card-body">
                                <div class="btn card-title shimer-card-title animate mb-3"></div>
                                <div class="shimer-card-button animate btn w-100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-5 col-xxl-4 mb-3">
                        <div class="card">
                            <div class="card-image animate"></div>
                            <div class="card-body">
                                <div class="btn card-title shimer-card-title animate mb-3"></div>
                                <div class="shimer-card-button animate btn w-100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-5 col-xxl-4 mb-3">
                        <div class="card">
                            <div class="card-image animate"></div>
                            <div class="card-body">
                                <div class="btn card-title shimer-card-title animate mb-3"></div>
                                <div class="shimer-card-button animate btn w-100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    {{-- Detail Modal --}}
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div id="carouselDetailModalControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner"></div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDetailModalControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDetailModalControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="description p-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
