@extends('landing.layout.main')

@section('content')
    <div class="container-fluid">
        {{-- Our Principle Section --}}
        <div class="row justify-content-center py-5 striped">
            <div class="col-12 col-md-9 col-xl-6 text-center">
                <h3 class="mb-5">PRINSIP KAMI</h3>
                <h4>“Kepentingan Utama Kami Terletak pada Kepuasan Klien Kami Terhadap Layanan yang Kami
                    Berikan”</h4>
            </div>
        </div>
        {{-- End Our Principle Section --}}

        {{-- The Vendors Section --}}
        <div class="row justify-content-center py-5">
            <h3 class="text-center mb-5">Meet The Team</h3>
            <div class="col-10 col-sm-10 col-xl-9 col-xxl-8">
                <div class="row justify-content-center">
                    @foreach ($employees as $employee)
                        <div class="col-auto">
                            <div class="mb-5 d-flex flex-column align-items-center">
                                <img src="{{ asset('storage/' . $employee->photo) }}" class="rounded-circle mb-3 crew-photo">
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
        <div class="row justify-content-center py-5">
            <h3 style="font-weight: 600;" class="text-center mb-5">Frequently Asked Questions</h3>
            <div class="col-12 col-md-8">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseOne">
                                Bagaimana Cara Memesan WO Jingga Kreatif?
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default variables.
                                It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                                Bagaimana Cara Memilih Konsep dan Vendor?
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until
                                the collapse plugin adds the appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default variables.
                                It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseThree">
                                Bagaimana Cara Menghubungi Crew Jingga Kreatif?
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                                collapse plugin adds the appropriate classes that we use to style each element. These
                                classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default variables.
                                It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Logo Section --}}
    </div>
@endsection
