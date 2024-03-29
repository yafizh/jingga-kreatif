@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Tambah Data Vendor</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary shadow">
                            <form action="/dashboard/vendor" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Vendor</label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Masukkan Nama Vendor" name="name" autocomplete="off"
                                            value="{{ old('name') }}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_type_id">Jenis Vendor</label>
                                        <select name="vendor_type_id" id="vendor_type_id" class="form-control" required>
                                            <option value="" selected disabled>Pilih Jenis Vendor</option>
                                            @foreach ($vendor_types as $vendor_type)
                                                @if ($vendor_type->id == old('vendor_type_id'))
                                                    <option value="{{ $vendor_type->id }}" selected>{{ $vendor_type->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $vendor_type->id }}">{{ $vendor_type->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Harga</label>
                                        <input type="text" class="form-control" id="price"
                                            placeholder="Masukkan Harga" name="price" autocomplete="off"
                                            value="{{ old('price') }}" oninput="inputNumberToBeRupiah(this)" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="logo"
                                                    name="logo" required onchange="displayInputNameFile(this)">
                                                <label class="custom-file-label" for="logo">Pilih Logo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="images">Detail Gambar</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="images"
                                                    name="images[]" multiple required onchange="displayInputNameFile(this)">
                                                <label class="custom-file-label" for="images">Pilih beberapa
                                                    gambar</label>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">Dapat memilih lebih dari satu gambar.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Keterangan</label>
                                        <input id="description" type="hidden" name="description" required>
                                        <trix-editor input="description"></trix-editor>
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
    </div>
@endsection
