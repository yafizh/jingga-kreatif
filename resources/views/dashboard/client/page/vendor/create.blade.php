@extends('dashboard.client.layout.main')

@section('content')
    @include('dashboard.client.partials.navigation')
    {{-- Main Content --}}
    <div class="row w-100 justify-content-center">
        <div class="col-12 my-4">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3>Pemilihan Vendor & Konsep Wedding</h3>
                </div>
                <div class="col-12 col-md-6">
                    <h3 id="total_price">Total: Rp. 0</h3>
                </div>
            </div>
        </div>
        <div class="col-12" id="grid-container">
            {{-- <div class="mb-3">
                <h4 class="mb-3">Dekorasi</h4>
                <div class="d-flex gap-3 flex-wrap justify-content-start">
                    <div class="card" style="width: 12rem;">
                        <div class="card-image">
                            <img src="https://static.wixstatic.com/media/7b1dfb_1a74b1d718ca44219eb9a8a4ba1dab09~mv2.png">
                            <div class="overplay">
                                <h5 class="text-center text-white">Galathia Decor Decor</h5>
                                <h6 class="text-white">Rp. 1.000.000</h6>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <button class="choose btn btn-outline-primary btn-sm w-100 my-2">Pilih Vendor</button>
                            <button class="btn btn-outline-primary btn-sm w-100">Lihat Detail</button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center w-100 mt-4">
                <form action="/wedding/storeChoosedThemeAndVendor" method="POST">
                    @csrf
                    <input type="text" name="choosed_vendor" id="choosed_vendor" hidden>
                    <input type="text" name="choosed_theme" id="choosed_theme" hidden>
                    <button type="submit" class="btn btn-primary text-white"
                        onclick="return confirm('Yakin dengan semua konsep & vendor yang dipilih?')">Selesai
                        Memilih</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Toast Container --}}
    <div class="toast-container align-items-end d-flex flex-column position-fixed top-0 end-0"></div>

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
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
