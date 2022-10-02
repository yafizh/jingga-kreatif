@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Tambah Data Karyawan</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary shadow">
                            <form action="/dashboard/employee" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Masukkan Nama Lengkap" name="name" autocomplete="off"
                                            value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="position">Posisi</label>
                                        <input type="text" class="form-control" id="position"
                                            placeholder="Masukkan Posisi" name="position" autocomplete="off"
                                            value="{{ old('position') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="phone_number"
                                            placeholder="Masukkan No Telepon" name="phone_number" autocomplete="off"
                                            value="{{ old('phone_number') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Masukkan Email" name="email" autocomplete="off"
                                            value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photo"
                                                    name="photo" required>
                                                <label class="custom-file-label" for="photo">Pilih foto</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
