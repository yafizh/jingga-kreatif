@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Tambah Data Jenis Vendor</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary shadow">
                            <form action="/dashboard/vendor-type" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Jenis Vendor</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Masukkan Nama Lengkap" name="name" autocomplete="off"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Keterangan</label>
                                        <input type="text" class="form-control" id="description"
                                            placeholder="Masukkan Keterangan" name="description" autocomplete="off"
                                            value="{{ old('description') }}">
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
