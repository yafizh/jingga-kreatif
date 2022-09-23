@extends('dashboard.client.layout.main')

@section('content')
    @include('dashboard.client.partials.navigation')
    <div class="row w-100 justify-content-center">
        <div class="col-12">
            <h3 class="my-4 text-center">Identitas Mempelai Pria</h3>
        </div>
        <div class="col-12 col-lg-8 col-xl-6 mb-3">
            <div class="p-4 bg-white jingga-shadow rounded-2 w-100">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border-0 jingga-shadow" id="identity_number"
                        placeholder="your identity number">
                    <label for="identity_number">NIK</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border-0 jingga-shadow" id="name"
                        placeholder="your name">
                    <label for="name">Nama Lengkap</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border-0 jingga-shadow" id="birthplace"
                        placeholder="your birth place">
                    <label for="birthplace">Tempat Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control border-0 jingga-shadow" id="birth"
                        placeholder="your birth date">
                    <label for="birth">Tanggal Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border-0 jingga-shadow" id="father_name"
                        placeholder="your father's name">
                    <label for="father_name">Nama Ayah</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border-0 jingga-shadow" id="mother_name"
                        placeholder="your mother's name">
                    <label for="mother_name">Nama Ibu</label>
                </div>
                <div class="d-flex justify-content-center w-100 mt-4">
                    <a href="/dashboard/bride" class="btn btn-primary text-white"
                        onclick="return confirm('Yakin dengan identitas mempelai pria yang dimasukan?')">Submit</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xxl-3">
            <div class="row gy-3" style="height: 100%;">
                <div class="col-12 col-sm-6 col-lg-12 d-flex align-items-center">
                    <div class="px-5 py-4 bg-white jingga-shadow rounded-2 w-100">
                        <h5 class="text-center">Tidak ada gambar</h5>
                        <p class="text-center">Upload gambar mempelai pria di sini dengan menekan tombol Pilih Gambar</p>
                        <button class="btn btn-primary w-100">Pilih Gambar</button>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-12 d-flex align-items-center">
                    <div class="px-5 py-4 bg-white jingga-shadow rounded-2 w-100">
                        <h5 class="text-center">Tidak ada Dokumen</h5>
                        <p class="text-center">Upload dokumen tambahan jika ada di sini dengan menekan tombol Pilih Dokumen
                        </p>
                        <button class="btn btn-primary w-100">Pilih Dokumen</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
