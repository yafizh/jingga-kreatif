@extends('dashboard.client.layout.main')

@section('content')
    @include('dashboard.client.partials.navigation')
    <div class="row w-100 justify-content-center">
        <div class="col-12">
            <h3 class="my-4">Pembayaran</h3>
        </div>
        <div class="col-12">
            <div class="mb-3 p-4 bg-white jingga-shadow rounded-2 w-100">
                <div class="row p-4 text-center">
                    <div class="col-12 col-md-6">
                        <h2 class="mb-3">Rp. 5.000.000</h2>
                        <h5 class="text-muted">Perlu Dibayar</h5>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <h2 class="mb-3">Rp. 0</h2>
                        <h5 class="text-muted">Telah Dibayar</h5>
                    </div>
                </div>
                <hr>
                {{-- <div class="row align-items-center">
                    <div class="col-12 text-center col-lg-3 my-1 align-self-center">Pembayaran Vendor</div>
                    <div class="col-12 text-center col-lg-3 my-1 align-self-center">Rp. 5.000.000</div>
                    <div class="col-12 text-center col-lg-3 my-1 align-self-center"><span class="rounded-pill text-white px-3 py-1 bg-warning">Menuggu Pembayaran</span></div>
                    <div class="col-12 text-center col-lg-3 my-1 align-self-center"><button class="btn btn btn-primary">Lakukan Pembayaran</button></div>
                </div> --}}
                <div class="row align-items-center">
                    <h5 class="text-center text-muted mb-0">Tidak Ada Pembayaran</h5>
                </div>
                <hr>
            </div>
        </div>
    </div>
@endsection
