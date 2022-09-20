@extends('dashboard.client.layout.main')

@section('content')
    <div class="row w-100 justify-content-center">
        <div class="col-12 text-center">
            <h3 class="my-4">Formulir Pendaftaran</h3>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3 p-4 bg-white jingga-shadow rounded-2 w-100">
                <form action="" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="name"
                            placeholder="your name">
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-0 jingga-shadow" id="email"
                            placeholder="example@gmail.com">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="email_verification"
                            placeholder="random number">
                        <label for="email_verification">Verifikasi Email</label>
                    </div>
                    <div class="d-flex justify-content-center w-100 mb-3">
                        <button class="btn btn-primary text-white">Kirim Kode Verifikasi</button>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control border-0 jingga-shadow" id="password"
                            placeholder="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control border-0 jingga-shadow" id="confirm-password"
                            placeholder="confirm-password">
                        <label for="confirm-password">Konfirmasi Password</label>
                    </div>
                </form>
                <div class="d-flex justify-content-center w-100 mt-4">
                    <button class="btn btn-primary text-white disabled" style="width: 10rem;">Daftar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
