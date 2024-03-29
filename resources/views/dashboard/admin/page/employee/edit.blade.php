@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Edit Data Karyawan</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary shadow">
                            <form action="/dashboard/employee/{{ $employee->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Masukkan Nama Lengkap" name="name" autocomplete="off"
                                            value="{{ old('name', $employee->name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Posisi</label>
                                        <input type="text" class="form-control" id="position"
                                            placeholder="Masukkan Posisi" name="position" autocomplete="off"
                                            value="{{ old('position', $employee->position) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="phone_number"
                                            placeholder="Masukkan No Telepon" name="phone_number" autocomplete="off"
                                            value="{{ old('phone_number', $employee->phone_number) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Masukkan Nama Lengkap" name="email" autocomplete="off"
                                            value="{{ old('email', $employee->email) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo"
                                                    name="photo">
                                                <label class="custom-file-label" for="photo">Pilih foto</label>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">Pilih foto untuk memperbaharui foto
                                            lama.
                                            Kosongkan jika tidak ingin memperbaharui foto lama.</small>
                                    </div>
                                    <div class="mt-4 d-flex justify-content-between">
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
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
