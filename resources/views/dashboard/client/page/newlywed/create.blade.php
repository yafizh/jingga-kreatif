@extends('dashboard.client.layout.main')

@section('content')
    @include('dashboard.client.partials.navigation')
    <div class="row w-100 justify-content-center">
        <div class="col-12">
            <h3 class="my-4 text-center">Identitas Mempelai {{ $newlywed ? 'Pria' : 'Wanita' }}</h3>
        </div>
        <div class="col-12 col-lg-8 col-xl-6 mb-3">
            <div class="p-4 bg-white jingga-shadow rounded-2 w-100">
                <form action="/dashboard/newlywed" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="nik"
                            placeholder="your identity number" name="nik" autocomplete="off" required autofocus
                            value="{{ old('nik') }}">
                        <label for="nik">NIK</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="name"
                            placeholder="your name" name="name" autocomplete="off" required value="{{ old('name') }}">
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="birthplace"
                            placeholder="your birth place" name="birthplace" autocomplete="off" required
                            value="{{ old('birthplace') }}">
                        <label for="birthplace">Tempat Lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control border-0 jingga-shadow" id="birthdate"
                            placeholder="your birth date" name="birthdate" autocomplete="off" required
                            value="{{ old('birthdate') }}">
                        <label for="birthdate">Tanggal Lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="father_name"
                            placeholder="your father's name" name="father_name" autocomplete="off" required
                            value="{{ old('father_name') }}">
                        <label for="father_name">Nama Ayah</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="mother_name"
                            placeholder="your mother's name" name="mother_name" autocomplete="off" required
                            value="{{ old('mother_name') }}">
                        <label for="mother_name">Nama Ibu</label>
                    </div>
                    <input type="radio" name="sex" value="1" {{ $newlywed ? 'checked' : '' }} hidden>
                    <input type="radio" name="sex" value="0" {{ $newlywed ? '' : 'checked' }} hidden>
                    <input type="file" name="photo" id="photo" hidden required>
                    <input type="file" name="documents[]" hidden>
                    <div class="d-flex justify-content-center w-100 mt-4">
                        <button type="submit" class="btn btn-primary text-white"
                            onclick="return confirm('Yakin dengan identitas mempelai pria yang dimasukan?')">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xxl-3 mb-3">
            <div class="row h-100">
                <div class="col-12 col-sm-6 col-lg-12 d-flex align-items-center pb-2">
                    <div class="d-flex justify-content-between flex-column px-5 py-4 bg-white jingga-shadow rounded-2 w-100"
                        style="min-height: 240px;">
                        <h5 class="text-center">Tidak ada gambar</h5>
                        <p id="preview-upload-photo" class="text-center">Upload gambar mempelai pria di sini dengan menekan
                            tombol Pilih Gambar</p>
                        {{-- <p class="text-center"><a href="" target="_blank">Mempelai pria.jpg</a></p> --}}
                        <button id="btn-upload-photo" class="btn btn-primary"><i class="fa-solid fa-cloud-arrow-up"></i>
                            Pilih Gambar</button>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-12 d-flex align-items-center pb-2">
                    <div class="d-flex justify-content-center w-100">
                        <div class="d-flex justify-content-between flex-column px-5 py-4 bg-white jingga-shadow rounded-2 w-100"
                            style="min-height: 240px;">
                            <h5 class="text-center">Tidak ada Dokumen</h5>
                            {{-- <p class="text-center">Upload dokumen tambahan jika ada di sini dengan menekan tombol Pilih
                                Dokumen
                            </p> --}}
                            <ol>
                                <li><a href="" target="_blank">Dokumen 1</a></li>
                                <li><a href="" target="_blank">Dokumen 1</a></li>
                                <li><a href="" target="_blank">Dokumen 1</a></li>
                                <li><a href="" target="_blank">Dokumen 1</a></li>
                            </ol>

                            <button class="btn btn-primary"><i class="fa-solid fa-cloud-arrow-up"></i> Pilih
                                Dokumen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
