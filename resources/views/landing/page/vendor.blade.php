@extends('landing.layout.main')

@section('content')
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

        {{-- The Vendors Section --}}
        <div class="row justify-content-evenly py-5">
            <div class="col-12 mb-5">
                <h3 style="font-weight: 600;" class="text-center mb-3">Konsep</h3>
                <div class="d-flex gap-3 flex-wrap justify-content-center">
                    @foreach ($themes as $theme)
                        <div class="card" style="width: 12rem; height: 330px;">
                            <img src="{{ asset('storage/' . $theme->thumbnail) }}" class="card-img-top" alt="..."
                                style="object-fit: contain; padding: 20px; min-height: 190px;">
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <h5 class="card-title text-center">{{ $theme->name }}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
            @foreach ($vendors['vendor_type_id'] as $vendor_type_id)
                <div class="col-12 col-md-6 col-xl-5 mb-5">
                    <h3 style="font-weight: 600;" class="text-center mb-3">
                        {{ $vendors['vendor'][$vendor_type_id][0]->vendorType->name }}</h3>
                    <div class="d-flex gap-3 flex-wrap justify-content-center">
                        @foreach ($vendors['vendor'][$vendor_type_id] as $vendor)
                            <div class="card" style="width: 12rem; height: 330px;">
                                <img src="{{ asset('storage/' . $vendor->logo) }}" class="card-img-top" alt="..."
                                    style="object-fit: contain; padding: 20px; min-height: 190px;">
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <h5 class="card-title text-center">{{ $vendor->name }}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="text-center py-4">
                        <a href="">Lihat Selengkapnya...</a>
                    </div> --}}
                </div>
            @endforeach


        </div>
        {{-- End The Vendors Section --}}
    </div>
@endsection
