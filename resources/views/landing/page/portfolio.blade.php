@extends('landing.layout.main')

@section('content')
    <div class="jumbotron d-flex justify-content-center align-items-center flex-column text-white">
        <img src="https://images.unsplash.com/photo-1591604466107-ec97de577aff?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80"
            class="jumbotron-bg" alt="Jumbotron Images">
        <div class="jumbotron-content text-center">
            <h1 class=""><strong>Jingga</strong>Kreatif</h1>
            <h2 class="fw-light mb-4">With Us Your Dream Event Will Come True</h2>
            <a href="/introduction" class="btn btn-outline-primary rounded-pill text-white">LAKUKAN PEMESANAN</a>
        </div>
    </div>
    <div class="container-fluid">
        {{-- Profile Section --}}
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-9 col-xl-6 text-center">
                <h3 class="mb-3">APA ITU JINGGA KREATIF?</h3>
                <p style=" text-align: justify;">Jingga Kreatif adalah suatu perusahaan yang bergerak dibidang Jasa
                    Pelayanan Wedding Organizer
                    (WO). Jingga Kreatif di dukung oleh high quality concept dan professionally skilled &
                    highlymotivated developing team, Jingga Kreatif berusaha untuk memberikan yang terbaik guna
                    memenuhi komitmen dalam hal jasa pelayanan di bidang penyelenggaraan seperti, acara wedding,
                    acara promosi, launching, pameran, seminar ataupun konvensi.</p>
            </div>
        </div>
        {{-- End Profile Section --}}

        {{-- Section --}}
        <div class="row justify-content-center py-5 striped">
            <div class="col-12 col-md-9 col-xl-6 mb-5 text-center">
                <h3>ALASAN KENAPA HARUS PAKAI WO</h3>
                <p>Kenapa ya? coba kita baca sama-sama alasannya pada bagian bawah ini</p>
            </div>
            <div class="col-12 px-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-xl-3 px-4 mb-5">
                        <div class="text-primary text-center mb-3">
                            <i class="fas fa-user-clock" style="font-size: 50px;"></i>
                        </div>
                        <h5 class="text-center">Efesien Waktu dan Tenaga</h5>
                        <p class="card-text" style=" text-align: justify;">
                            Wedding Organizer memiliki tim yang akan siap mengurus semua hal yang dibutuhkan saat acara
                            pernikahan kamu nantinya. Mulai dari mengkonsep acara sampai mengkordinasikan semua pihak yang
                            terlibat didalam acara pernikahan. Sehingga hal ini akan menghemat tenaga dan waktu yang kamu
                            miliki.
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3 px-4 mb-5">
                        <div class="text-center mb-3">
                            <i class="fas fa-coins" style="font-size: 50px;"></i>
                        </div>
                        <h5 class="text-center">Hemat Biaya</h5>
                        <p style="text-align: justify;">
                            Keuntungan lainnya dari memakai jasa Wedding Organizer adalah kamu bisa menyesuaikan pesta
                            sesuai dengan budget yang dimiliki. Besarnya budget yang telah di tentukan akan membuat tim
                            wedding organizer akan mencarikan vendor sesuai dengan budget yang tersedia.
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3 px-4 mb-5">
                        <div class="text-primary text-center mb-3">
                            <i class="fas fa-users" style="font-size: 50px;"></i>
                        </div>
                        <h5 class="text-center">Bertemu Vendor-Vendor Terbaik</h5>
                        <p style="text-align: justify;">
                            Wedding Organizer adalah jasa yang dibentuk untuk mempermudah pengantin bertemu dengan banyak
                            pilihan vendor, sehingga tentunya wedding organizer ini telah mempersiapkan vendor-vendor
                            terbaik agar tidak mengecewakan costumer nya.
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3 px-4 mb-5">
                        <div class="text-center mb-3">
                            <i class="fas fa-clipboard " style="font-size: 50px;"></i>
                        </div>
                        <h5 class="text-center">Tersusun dan Detail</h5>
                        <p style="text-align: justify;">
                            Tim Wedding Organizer akan memberikan kinerja terbaiknya, yaitu mulai dari mengonsep acara,
                            membuat budget plan, mengkoordinasikan semua pihak yang terlibat dalam acara, mencarikan vendor
                            terbaik seperti catering, gedung, busana, fotographer dan lainnya, hingga membuat rundown agar
                            acara pernikahan kamu berjalan dengan lancar dan teratur sampai selesai.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Section --}}

        {{-- Our Work Section --}}
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-10">
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
