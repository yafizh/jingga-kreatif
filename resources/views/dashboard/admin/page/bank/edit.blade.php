@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Edit Data Bank</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary shadow">
                            <form action="/dashboard/bank/{{ $bank->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="bank_name">Nama Bank</label>
                                        <input type="text" class="form-control" id="bank_name"
                                            placeholder="Masukkan Nama Bank" name="bank_name" autocomplete="off"
                                            value="{{ old('bank_name', $bank->bank_name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="owner_name">Nama Pemilik Rekening</label>
                                        <input type="text" class="form-control" id="owner_name"
                                            placeholder="Masukkan Nama Pemilik Rekening" name="owner_name"
                                            autocomplete="off" value="{{ old('owner_name', $bank->owner_name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pin">Nomor Rekening</label>
                                        <input type="text" class="form-control" id="pin"
                                            placeholder="Masukkan Nomor Rekening" name="pin" autocomplete="off"
                                            value="{{ old('pin', $bank->pin) }}" required>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4">
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