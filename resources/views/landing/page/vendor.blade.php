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

            {{-- Decoration --}}
            <div class="col-12 col-md-6 col-xl-5 mb-5">
                <h3 style="font-weight: 600;" class="text-center mb-3">Dekorasi</h3>
                <div class="d-flex gap-3 flex-wrap justify-content-center">
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://alexandra.bridestory.com/image/upload/assets/img-20220215-wa0016-M0XWiJUNA.jpg"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Galathia Decor</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://images.weddingku.com/images/upload/partners/pp/82615-jneq2utgg0ie.jpg"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Cassia Decoration</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://blessingorganizer.com/media/Blessing-Default-Image.jpg" class="card-img-top"
                            alt="..." style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Blessing Decoration</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://static.wixstatic.com/media/7b1dfb_1a74b1d718ca44219eb9a8a4ba1dab09~mv2.png"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Flori.Co</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/b25156f8d0d4f983e0136bf96a00d7c6.png"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Joelle Decoration</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="data:image/jpeg;base64,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"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Decor </h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a href="">Lihat Selengkapnya...</a>
                </div>
            </div>
            {{-- End Decoration --}}

            {{-- Documentation --}}
            <div class="col-12 col-md-6 col-xl-5 mb-5">
                <h3 style="font-weight: 600;" class="text-center mb-3">Dokumentasi</h3>
                <div class="d-flex gap-3 flex-wrap justify-content-center">
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="data:image/png;base64,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"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Lemia Project</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://placeholderlogo.com/img/placeholder-logo-1.png" class="card-img-top"
                            alt="..." style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Buana&Co</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://placeholderlogo.com/img/placeholder-logo-1.png" class="card-img-top"
                            alt="..." style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Hope Portraiture</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- End Documentation --}}


            {{-- Lighting --}}
            <div class="col-12 col-md-6 col-xl-5 mb-5">
                <h3 style="font-weight: 600;" class="text-center mb-3">Lighting</h3>
                <div class="d-flex gap-3 flex-wrap justify-content-center">
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://www.icron.com/wp/wp-content/uploads/lumens-logo.jpg" class="card-img-top"
                            alt="..." style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Lumens</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://influencermarketinghub.com/wp-content/uploads/2020/08/Lightworks.png"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Lighworks</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://frateran93.com/wp-content/uploads/2018/09/1.-Lasika.png" class="card-img-top"
                            alt="..." style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Lasika Production</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- End Lighting --}}


            {{-- Sound System --}}
            <div class="col-12 col-md-6 col-xl-5 mb-5">
                <h3 style="font-weight: 600;" class="text-center mb-3">Sound System</h3>
                <div class="d-flex gap-3 flex-wrap justify-content-center">
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="data:image/png;base64,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"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">JPMedia</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://images.weddingku.com/images/upload/partners/pp/86009-dhx3bom00uc8.jpg"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Twinbrother Production</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                    <div class="card" style="width: 12rem; height: 330px;">
                        <img src="https://www.megaindia.in/image/cache/mainlogo/logo-416x123[1]-416x123.png"
                            class="card-img-top" alt="..."
                            style="object-fit: contain; padding: 20px; min-height: 190px;">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">Mega Sound System</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><a href="">Lihat Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- End Sound System --}}


        </div>
        {{-- End The Vendors Section --}}
    </div>
@endsection
