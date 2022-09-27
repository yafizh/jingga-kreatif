@extends('landing.layout.main')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                    height="400" class="d-block w-100" alt="..." style="object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Jinggal Kreatif</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam accusantium unde eius quaerat cum ab
                        illo? Odit ad quas, maxime unde, omnis molestias minus nisi ipsum exercitationem voluptatem beatae
                        harum.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        {{-- Profile Section --}}
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-9 col-xl-6">
                <div class="text-center">
                    <a href="/dashboard/introduction" class="btn text-white btn-primary">Pesan Disini</a>
                    <div class="py-4">
                        <h3>APA ITU JINGGA KREATIF?</h3>
                        <p style=" text-align: justify;">Jingga Kreatif adalah suatu perusahaan yang bergerak dibidang Jasa
                            Pelayanan Wedding Organizer
                            (WO). Jingga Kreatif di dukung oleh high quality concept dan professionally skilled &
                            highlymotivated developing team, Jingga Kreatif berusaha untuk memberikan yang terbaik guna
                            memenuhi komitmen dalam hal jasa pelayanan di bidang penyelenggaraan seperti, acara wedding,
                            acara promosi, launching, pameran, seminar ataupun konvensi.</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Profile Section --}}

        {{-- Section --}}
        <div class="row justify-content-center pt-5" style="background-color: #F5F5F7;">
            <div class="col-12 col-md-9 col-xl-6">
                <h3 class="text-center">ALASAN KENAPA HARUS PAKAI WO</h3>
                <p class="text-center">Kenapa ya? coba kita baca sama-sama alasannya pada bagian bawah ini</p>
            </div>
        </div>
        <div class="row justify-content-center p-5" style="background-color: #F5F5F7;">
            <div class="col-12 col-md-6 col-xl-3 px-4 mb-5">
                <div class="text-center text-primary"><i class="fas fa-user-clock" style="font-size: 50px;"></i></div>
                <h5 class="text-center my-3" style="font-weight: 550;">Efesien Waktu dan Tenaga</h5>
                <p class="card-text" style=" text-align: justify;">
                    Wedding Organizer memiliki tim yang akan siap mengurus semua hal yang dibutuhkan saat acara
                    pernikahan kamu nantinya. Mulai dari mengkonsep acara sampai mengkordinasikan semua pihak yang
                    terlibat didalam acara pernikahan. Sehingga hal ini akan menghemat tenaga dan waktu yang kamu
                    miliki.
                </p>
            </div>
            <div class="col-12 col-md-6 col-xl-3 px-4 mb-5">
                <div class="text-center"><i class="fas fa-coins" style="font-size: 50px;"></i></div>
                <h5 class="text-center my-3" style="font-weight: 550;">Hemat Biaya</h5>
                <p style="text-align: justify;">
                    Keuntungan lainnya dari memakai jasa Wedding Organizer adalah kamu bisa menyesuaikan pesta
                    sesuai dengan budget yang dimiliki. Besarnya budget yang telah di tentukan akan membuat tim
                    wedding organizer akan mencarikan vendor sesuai dengan budget yang tersedia.
                </p>
            </div>
            <div class="col-12 col-md-6 col-xl-3 px-4 mb-5">
                <div class="text-center text-primary"><i class="fas fa-users" style="font-size: 50px;"></i></div>
                <h5 class="text-center my-3" style="font-weight: 550;">Bertemu Vendor-Vendor Terbaik</h5>
                <p style="text-align: justify;">
                    Wedding Organizer adalah jasa yang dibentuk untuk mempermudah pengantin bertemu dengan banyak
                    pilihan vendor, sehingga tentunya wedding organizer ini telah mempersiapkan vendor-vendor
                    terbaik agar tidak mengecewakan costumer nya.
                </p>
            </div>
            <div class="col-12 col-md-6 col-xl-3 px-4 mb-5">
                <div class="text-center"><i class="fas fa-clipboard " style="font-size: 50px;"></i></div>
                <h5 class="text-center my-3" style="font-weight: 550;">Tersusun dan Detail</h5>
                <p style="text-align: justify;">
                    Tim Wedding Organizer akan memberikan kinerja terbaiknya, yaitu mulai dari mengonsep acara,
                    membuat budget plan, mengkoordinasikan semua pihak yang terlibat dalam acara, mencarikan vendor
                    terbaik seperti catering, gedung, busana, fotographer dan lainnya, hingga membuat rundown agar
                    acara pernikahan kamu berjalan dengan lancar dan teratur sampai selesai.
                </p>
            </div>
        </div>
        {{-- End Section --}}

        {{-- Our Work Section --}}
        <div class="row justify-content-center py-5">
            <div class="col-10">
                <h3 class="text-center mb-5">HASIL KERJA KAMI</h3>
                <div class="d-flex gap-3 flex-wrap justify-content-center">
                    <iframe width="400" height="220" src="https://www.youtube.com/embed/9tCFRiUFTwk"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    <iframe width="400" height="220" src="https://www.youtube.com/embed/6vGoiL75K8k"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    <iframe width="400" height="220" src="https://www.youtube.com/embed/kNLq8uOExCE"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    <iframe width="400" height="220" src="https://www.youtube.com/embed/UtsM8XWQ2BI"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    <iframe width="400" height="220" src="https://www.youtube.com/embed/TIca-hfktP4"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    <iframe width="400" height="220" src="https://www.youtube.com/embed/CCtEI2DBTXc"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                </div>
                <div class="text-center py-4">
                    <button class="btn text-white btn-primary rounded-pill px-3">Lihat Lebih Banyak</button>
                </div>
            </div>
        </div>
        {{-- End Our Work Section --}}
    </div>
@endsection
