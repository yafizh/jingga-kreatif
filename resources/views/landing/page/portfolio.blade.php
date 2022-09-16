@extends('landing.layout.main')

@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8d2VkZGluZ3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
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
        <div class="row justify-content-center py-5" style="background-color: #F5F5F7;">
            <div class="col-12 col-md-9 col-xl-6">
                <div class="text-center mt-2">
                    <a href="index.php?page=login" class="btn btn-primary mt-4">Pesan Disini</a>
                    <div class="py-4">
                        <h3 style="font-weight: 600;">APA ITU JINGGA KREATIF?</h3>
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
        <div class="row justify-content-center py-5">
            <div class="col-12 col-md-9 col-xl-6">
                <div class="text-center mt-2">
                    <div class="py-4">
                        <h3 style="font-weight: 600;">ALASAN KENAPA HARUS PAKAI WO</h3>
                        <p>Kenapa ya? coba kita baca sama-sama alasannya pada bagian bawah ini</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center px-5">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-user-clock " style="font-size: 50px; color: #ff5100;"></i>
                        </div>
                        <h5 class="card-title" style="font-weight: 550;">Efesien Waktu dan Tenaga</h5>
                        <p class="card-text" style=" text-align: justify;">
                            Wedding Organizer memiliki tim yang akan siap mengurus semua hal yang dibutuhkan saat acara
                            pernikahan kamu nantinya. Mulai dari mengkonsep acara sampai mengkordinasikan semua pihak yang
                            terlibat didalam acara pernikahan. Sehingga hal ini akan menghemat tenaga dan waktu yang kamu
                            miliki.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <div class="mb-3"><i class="fas fa-coins" style="font-size: 50px;"></i></div>
                        <h5 class="card-title" style="font-weight: 550;">Hemat Biaya</h5>
                        <p class="card-text" style=" text-align: justify;">
                            Keuntungan lainnya dari memakai jasa Wedding Organizer adalah kamu bisa menyesuaikan pesta
                            sesuai dengan budget yang dimiliki. Besarnya budget yang telah di tentukan akan membuat tim
                            wedding organizer akan mencarikan vendor sesuai dengan budget yang tersedia.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <div class="mb-3"><i class="fas fa-users " style="font-size: 50px; color: #ff5100;"></i></div>
                        <h5 class="card-title" style="font-weight: 550;">Bertemu Vendor-Vendor Terbaik</h5>
                        <p class="card-text" style=" text-align: justify;">
                            Wedding Organizer adalah jasa yang dibentuk untuk mempermudah pengantin bertemu dengan banyak
                            pilihan vendor, sehingga tentunya wedding organizer ini telah mempersiapkan vendor-vendor
                            terbaik agar tidak mengecewakan costumer nya.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card border-0">
                    <div class="card-body text-center">
                        <div class="mb-3"><i class="fas fa-clipboard " style="font-size: 50px;"></i></div>
                        <h5 class="card-title" style="font-weight: 550;">Tersusun dan Detail</h5>
                        <p class="card-text" style=" text-align: justify;">
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

        {{-- Section --}}

        {{-- End Section --}}
    </div>
@endsection
