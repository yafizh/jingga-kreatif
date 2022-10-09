@extends('dashboard.client.layout.main')

@section('content')
    {{-- Main Content --}}
    <div class="row w-100 justify-content-center">
        <div class="col-12 my-4">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3>Perbaharui Konsep dan Vendor Wedding</h3>
                </div>
                <div class="col-12 col-md-6">
                    <h3 id="total_price">Total: Rp. {{ number_format($total_price, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-12" id="grid-container"></div>
        <div class="col-12">
            <div class="d-flex justify-content-center w-100 mt-4">
                <form action="/wedding/updateChoosedThemeAndVendor/{{ $wedding->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="choosed_vendor" id="choosed_vendor" value="{{ $vendors }}" hidden>
                    <input type="text" name="choosed_theme" id="choosed_theme" value="{{ $theme }}" hidden>
                    <button type="submit" class="btn btn-primary text-white"
                        onclick="return confirm('Yakin dengan semua konsep & vendor yang dipilih?')">Perbaharui Konsep dan
                        Vendor</button>
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
            </div>
        </div>
    </div>
@endsection
