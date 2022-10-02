@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Edit Data Riwayat Pertemuan</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary shadow">
                            <form action="/dashboard/meeting/{{ $meeting->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="topic">Topik Pertemuan</label>
                                        <input type="text" class="form-control" id="topic"
                                            placeholder="Masukkan Nama Vendor" name="topic" autocomplete="off"
                                            value="{{ old('topic', $meeting->topic) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="meeting_date">Tanggal</label>
                                        <input type="date" class="form-control" id="meeting_date"
                                            placeholder="Masukkan Harga" name="meeting_date" autocomplete="off"
                                            value="{{ old('meeting_date', $meeting->meeting_date) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="meeting_time">Waktu</label>
                                        <input type="time" class="form-control" id="meeting_time"
                                            placeholder="Masukkan Harga" name="meeting_time" autocomplete="off"
                                            value="{{ old('meeting_time', $meeting->meeting_time) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="body">Isi Pertemuan</label>
                                        <textarea name="body" id="body" class="form-control">{{ old('meeting_body', $meeting->body) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Gambar Pertemuan</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo"
                                                    name="photo">
                                                <label class="custom-file-label" for="photo">Pilih Gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="{{ url()->previous() }}"
                                            class="btn btn-secondary">Kembali</a>
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
