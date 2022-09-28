@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Tambah Data Konsep</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary shadow">
                            <form action="/dashboard/theme" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Konsep</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Masukkan Nama Konsep" name="name" autocomplete="off"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="images">Detail Gambar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="images"
                                                    name="images[]" multiple>
                                                <label class="custom-file-label" for="images">Pilih beberapa gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Keterangan</label>
                                        <input id="description" type="hidden" name="description">
                                        <trix-editor input="description"></trix-editor>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
