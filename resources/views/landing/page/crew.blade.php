@extends('landing.layout.main')

@section('content')
    <div class="container-fluid">
        {{-- Our Principle Section --}}
        <div class="row justify-content-center py-5" style="background-color: #F5F5F7;">
            <div class="col-12 col-md-9 col-xl-6 text-center">
                <h3 style="font-weight: 600;">PRINSIP KAMI</h3>
                <h4 class="mt-5">“Kepentingan Utama Kami Terletak pada Kepuasan Klien Kami Terhadap Layanan yang Kami
                    Berikan”</h4>
            </div>
        </div>
        {{-- End Our Principle Section --}}

        <style>
            .crew-name {
                text-align: center;
                width: 250px;
                background-color: #ff5100;
                border-radius: 30px;
                font-size: .9rem;
                padding: .4rem 1.5rem;
            }

            .crew-position {
                width: 200px;
                text-align: center;
                background-color: #E7EAED;
                border-radius: 30px;
                font-size: .9rem;
                padding: .4rem 1.5rem;
            }
        </style>

        {{-- The Vendors Section --}}
        <div class="row justify-content-center py-5">
            <h3 style="font-weight: 600;" class="text-center mb-5">MEET THE TEAM</h3>
            <div class="col-10 col-sm-10 col-xl-9 col-xxl-8">
                <div class="row justify-content-center">
                    @foreach ($employees as $employee)
                        <div class="col-auto">
                            <div class="mb-5 d-flex flex-column align-items-center">
                                <img src="{{ asset('storage/' . $employee->photo) }}" class="rounded-circle mb-3"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                                <div class="text-white mb-2 crew-name">{{ $employee->name }}</div>
                                <div class="crew-position">{{ $employee->position }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        {{-- End The Vendors Section --}}

        {{-- Logo Section --}}
        <div class="row justify-content-center py-5" style="background-color: #E7EAED;">
            <div class="col-10 col-md-6">
                <img src="/images/logo.png" width="100%" alt="">
            </div>
        </div>
        {{-- End Logo Section --}}

        {{-- Address Section --}}
        <div class="row text-center py-5" style="background-color: #E7EAED;">
            <div class="col-12 mb-3">
                <i class="fa-solid fa-location-dot fa-2xl" style="color: #ff5100;"></i>
            </div>
            <div class="col-12">
                <h5>Jl. Ir. PM. Noor Kel. Sungai Ulin Kecamatan Banjarbaru utara Kota Banjarbaru - 70714</h5>
            </div>
        </div>
        {{-- End Address Section --}}

        {{-- Email Section --}}
        <div class="row text-center py-5" style="background-color: #E7EAED;">
            <div class="col-12 mb-3">
                <i class="fa-solid fa-envelope fa-2xl" style="color: #ff5100;"></i>
            </div>
            <div class="col-12">
                <h5>jinggakreatif@gmail.com</h5>
            </div>
        </div>
        {{-- End Email Section --}}
    </div>
@endsection
