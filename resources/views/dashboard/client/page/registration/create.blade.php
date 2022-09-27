@extends('dashboard.client.layout.main')

@section('content')
    @include('dashboard.client.partials.navigation')
    <style>
        @keyframes changeLetter {
            0% {
                content: "Loading.";
            }

            25% {
                content: "Loading..";
            }

            50% {
                content: "Loading...";
            }

            75% {
                content: "Loading....";
            }

            100% {
                content: "Loading.....";
            }
        }

        .loading::after {
            animation: changeLetter 5s linear infinite;
            content: "Loading";
        }
    </style>
    <div class="row w-100 justify-content-center">
        <div class="col-12 text-center">
            <h3 class="my-4">Formulir Pendaftaran</h3>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3 p-4 bg-white jingga-shadow rounded-2 w-100">
                <form id="registration-form" action="/dashboard/registration" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="name" name="name"
                            placeholder="your name" autocomplete="off" required>
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="phone_number" name="phone_number"
                            placeholder="your phone number" autocomplete="off" required>
                        <label for="phone_number">Nomor Telepon</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-0 jingga-shadow" id="email" name="email"
                            placeholder="example@gmail.com" autocomplete="off" required>
                        <label for="email">Alamat Email Aktif</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="email_verification"
                            name="email_verification" placeholder="random number" autocomplete="off" required>
                        <label for="email_verification">Kode Verifikasi Email</label>
                    </div>
                    <div class="d-flex justify-content-center w-100 mb-3">
                        <button type="button" id="verif-code-btn" class="btn btn-primary text-white" disabled>Kirim Kode
                            Verifikasi</button>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control border-0 jingga-shadow" id="password"
                            placeholder="password" name="password" required>
                        <label for="password">Password</label>
                        <div class="invalid-tooltip">
                            Password harus sama.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control border-0 jingga-shadow" id="confirm_password"
                            placeholder="confirm password" name="confirm_password" required>
                        <label for="confirm_password">Konfirmasi Password</label>
                        <div class="invalid-tooltip">
                            Password harus sama.
                        </div>
                    </div>
                    <div class="d-flex justify-content-center w-100 mt-4">
                        <button type="submit" class="btn btn-primary text-white">
                            Daftar Akun
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
