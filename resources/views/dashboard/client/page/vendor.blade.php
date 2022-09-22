@extends('dashboard.client.layout.main')

@section('content')
    {{-- Main Content --}}
    <div class="row w-100 justify-content-center">
        <div class="col-12">
            <h3 class="my-4">Pemilihan Vendor</h3>
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-3">Dekorasi</h4>
                    <div class="d-flex gap-3 flex-wrap justify-content-start">
                        <div class="card" style="width: 12rem; height: 360px;">
                            <img src="https://blessingorganizer.com/media/Blessing-Default-Image.jpg"
                                style="object-fit: contain; min-height: 176px;">
                            <div class="card-body d-flex justify-content-center align-items-center"
                                style="min-height: 88px;">
                                <h5 class="m-0 card-title text-center">Galathia Decor</h5>
                            </div>
                            <div class="card-body pt-0">
                                <button class="choose choosed btn btn-primary btn-sm w-100 my-2">Vendor Terpilih</button>
                                <button class="btn btn-outline-primary btn-sm w-100">Lihat Detail</button>
                            </div>
                        </div>
                        <div class="card" style="width: 12rem; height: 360px;">
                            <img src="https://static.wixstatic.com/media/7b1dfb_1a74b1d718ca44219eb9a8a4ba1dab09~mv2.png"
                                style="object-fit: contain; min-height: 176px;">
                            <div class="card-body d-flex justify-content-center align-items-center"
                                style="min-height: 88px;">
                                <h5 class="m-0 card-title text-center">Galathia Decor Decor</h5>
                            </div>
                            <div class="card-body pt-0">
                                <button class="choose btn btn-outline-primary btn-sm w-100 my-2">Pilih Vendor</button>
                                <button class="btn btn-outline-primary btn-sm w-100">Lihat Detail</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast Container --}}
    <div class="toast-container align-items-end d-flex flex-column position-fixed top-0 end-0"></div>
@endsection
