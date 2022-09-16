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
            <div class="col-10 col-sm-10 col-xxl-8">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <div class="mb-5 d-flex flex-column align-items-center">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="text-white mb-2 crew-name">
                                Galih Arum Denny</div>
                            <div class="crew-position">Director</div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="mb-5 d-flex flex-column align-items-center">
                            <img src="https://images.unsplash.com/photo-1514626585111-9aa86183ac98?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="text-white mb-2 crew-name">
                                Abdul Basit Maisur</div>
                            <div class="crew-position">Wedding Management</div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="mb-5 d-flex flex-column align-items-center">
                            <img src="https://images.unsplash.com/photo-1499996860823-5214fcc65f8f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=466&q=80"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="text-white mb-2 crew-name">
                                Younk</div>
                            <div class="crew-position">Co Director</div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="mb-5 d-flex flex-column align-items-center">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="text-white mb-2 crew-name">
                                Muhammad Syafiq</div>
                            <div class="crew-position">Designer</div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="mb-5 d-flex flex-column align-items-center">
                            <img src="https://images.unsplash.com/photo-1514626585111-9aa86183ac98?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="text-white mb-2 crew-name">
                                Obladi</div>
                            <div class="crew-position">Director</div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="mb-5 d-flex flex-column align-items-center">
                            <img src="https://images.unsplash.com/photo-1499996860823-5214fcc65f8f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=466&q=80"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="text-white mb-2 crew-name">
                                Younk</div>
                            <div class="crew-position">Co Director</div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="mb-5 d-flex flex-column align-items-center">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="text-white mb-2 crew-name">
                                Muhammad Syafiq</div>
                            <div class="crew-position">Designer</div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="mb-5 d-flex flex-column align-items-center">
                            <img src="https://images.unsplash.com/photo-1514626585111-9aa86183ac98?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="text-white mb-2 crew-name">
                                Obladi</div>
                            <div class="crew-position">Director</div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="mb-5 d-flex flex-column align-items-center">
                            <img src="https://images.unsplash.com/photo-1499996860823-5214fcc65f8f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=466&q=80"
                                class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="text-white mb-2 crew-name">
                                Younk</div>
                            <div class="crew-position">Co Director</div>
                        </div>
                    </div>
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
