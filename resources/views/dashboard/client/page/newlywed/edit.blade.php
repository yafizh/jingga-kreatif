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
            <h3 class="my-4 text-center">Perbaharui Identitas Mempelai {{ $newlywed->sex ? 'Pria' : 'Wanita' }}</h3>
        </div>
        <div class="col-12 col-lg-8 col-xl-6 mb-3">
            <div class="p-4 bg-white jingga-shadow rounded-2 w-100">
                <form action="/newlywed/{{ $newlywed->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="nik"
                            placeholder="your identity number" name="nik" autocomplete="off" required
                            value="{{ old('nik', $newlywed->nik) }}">
                        <label for="nik">NIK</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="name"
                            placeholder="your name" name="name" autocomplete="off" required
                            value="{{ old('name', $newlywed->name) }}">
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="birthplace"
                            placeholder="your birth place" name="birthplace" autocomplete="off" required
                            value="{{ old('birthplace', $newlywed->birthplace) }}">
                        <label for="birthplace">Tempat Lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control border-0 jingga-shadow" id="birthdate"
                            placeholder="your birth date" name="birthdate" autocomplete="off" required
                            value="{{ old('birthdate', $newlywed->birthdate) }}">
                        <label for="birthdate">Tanggal Lahir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="father_name"
                            placeholder="your father's name" name="father_name" autocomplete="off" required
                            value="{{ old('father_name', $newlywed->father_name) }}">
                        <label for="father_name">Nama Ayah</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-0 jingga-shadow" id="mother_name"
                            placeholder="your mother's name" name="mother_name" autocomplete="off" required
                            value="{{ old('mother_name', $newlywed->mother_name) }}">
                        <label for="mother_name">Nama Ibu</label>
                    </div>
                    <input type="file" name="photo" id="photo" hidden>
                    <input type="file" name="documents[]" id="documents" hidden multiple>
                    @foreach ($newlywed->documents as $document)
                        <input type="file" name="old_documents[]" hidden>
                        <input type="text" name="state_old_documents[]" value="keep" hidden>
                        <input type="text" name="id_old_documents[]" value="{{ $document->id }}" hidden>
                    @endforeach
                    <div class="d-flex justify-content-between w-100 mt-4">
                        <a href="/setting" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary text-white"
                            onclick="return confirm('Yakin dengan identitas mempelai {{ $newlywed->sex ? 'pria' : 'wanita' }} yang dimasukan?')">Perbaharui</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-12 col-lg-4 col-xxl-3 mb-3">
            <div class="row h-100">
                <div class="col-12 col-sm-6 col-lg-12 d-flex align-items-center pb-3">
                    <div id="upload-photo"
                        class="d-flex text-center justify-content-between flex-column px-5 py-4 bg-white jingga-shadow rounded-2 w-100"
                        style="min-height: 240px;">
                        <h5>Tidak ada gambar</h5>
                        <p>
                            <a href="{{ asset('storage/' . $newlywed->photo) }}" target="_blank">
                                Lihat Foto
                            </a>
                        </p>
                        <button id="btn-upload-photo" class="btn btn-primary"><i class="fa-solid fa-cloud-arrow-up"></i>
                            Pilih Gambar Baru</button>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-12 d-flex align-items-center pb-3">
                    <div class="d-flex justify-content-center w-100">
                        <div id="upload-documents"
                            class="d-flex text-center justify-content-between flex-column px-4 py-4 bg-white jingga-shadow rounded-2 w-100"
                            style="min-height: 240px;">
                            @if ($newlywed->documents->count())
                                <h5>Dokumen Terpilih</h5>
                                @foreach ($newlywed->documents as $document)
                                    <div class="border rounded py-3 @if (!$loop->last) mb-3 @endif">
                                        <p>Dokumen {{ $loop->iteration }}</p>
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ asset('storage/' . $document->document) }}" target="_blank"
                                                class="btn-detail btn btn-sm btn-info text-white">Lihat</a>
                                            <button class="btn-edit btn btn-sm btn-warning text-white">Ganti</button>
                                            <button class="btn-delete btn btn-sm btn-danger">Hapus</button>
                                        </div>
                                    </div>
                                @endforeach
                                <div id="new-document-container"></div>
                            @else
                                <h5>Tidak ada Dokumen</h5>
                                <p id="new-document">Upload dokumen tambahan jika ada di sini dengan menekan tombol Pilih
                                    Dokumen
                                </p>
                            @endif
                            <button id="btn-upload-documents" class="btn btn-primary mt-3">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                Tambah Dokumen Baru
                            </button>
                            </>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
