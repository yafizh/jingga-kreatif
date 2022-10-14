@extends('dashboard.client.layout.main')

@section('content')
    @if (session('success'))
        <div class="toast-container position-fixed p-3">
            <div class="toast text-bg-success border-0" role="alert" aria-live="polite" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    <div class="row w-100 justify-content-center">
        <div class="col-12">
            <h3 class="my-4 text-center">Perbaharui Identitas Akun</h3>
        </div>
        <div class="col-12 col-md-8 col-xl-4 mb-3">
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
                    <div class="d-flex justify-content-between w-100 mt-4">
                        <a href="/setting" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary text-white">
                            Perbaharui Identitas
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-8 col-xl-4 mb-3">
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
                        <input type="text" class="form-control border-0 jingga-shadow" id="email_verification_code"
                            name="email_verification_code" placeholder="random number" autocomplete="off" required>
                        <label for="email_verification_code">Kode Verifikasi Email</label>
                    </div>
                    <div class="d-flex justify-content-center w-100 mt-4">
                        <button type="button" id="send-code-verification" class="btn btn-primary text-white me-1" disabled>
                            Kirim Kode Verifikasi
                        </button>
                        <button type="submit" id="submit-email-form-btn" class="btn btn-primary text-white" disabled>
                            Perbaharui Email
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
