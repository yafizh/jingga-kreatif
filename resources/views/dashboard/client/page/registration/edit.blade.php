@extends('dashboard.client.layout.main')

@section('content')
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
        <div class="col-12">
            <h3 class="my-4 text-center">Perbaharui Identitas Akun</h3>
        </div>
        <div class="col-12 col-lg-8 col-xl-4 mb-3">
            <div class="p-4 bg-white jingga-shadow rounded-2 w-100">
                <form action="/client/{{ $client->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="name" name="name"
                            placeholder="your name" autocomplete="off" required value="{{ old('name', $client->name) }}">
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="phone_number"
                            name="phone_number" placeholder="your phone number" autocomplete="off" required
                            value="{{ old('phone_number', $client->phone_number) }}">
                        <label for="phone_number">Nomor Telepon</label>
                    </div>
                    <div class="d-flex justify-content-center w-100 mt-4">
                        <button type="submit" class="btn btn-primary text-white">
                            Perbaharui Identitas
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-8 col-xl-4 mb-3">
            <div class="p-4 bg-white jingga-shadow rounded-2 w-100">
                <form action="/client/change-email/{{ $client->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control border-0 jingga-shadow" id="email" name="email"
                            placeholder="example@gmail.com" autocomplete="off" required
                            value="{{ old('email', $client->email) }}">
                        <label for="email">Alamat Email Aktif</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="email_verification"
                            name="email_verification" placeholder="random number" autocomplete="off" required>
                        <label for="email_verification">Kode Verifikasi Email</label>
                    </div>
                    <div class="d-flex justify-content-center w-100 mt-4">
                        <button type="button" id="verif-code-btn" class="btn btn-primary text-white me-1" disabled>Kirim
                            Kode Verifikasi</button>
                        <button type="submit" id="submit-btn" class="btn btn-primary text-white" disabled>Perbaharui
                            Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
