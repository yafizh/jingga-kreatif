@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row py-3">
                    <div class="col-12">
                        @if (session('created') || session('updated') || session('deleted'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                @if (session('created'))
                                    Berhasil menambah data <strong>Konsep</strong>. <strong><a
                                            href="/dashboard/theme/{{ session('created') }}">Lihat</a></strong>.
                                @endif
                                @if (session('updated'))
                                    Berhasil memperbaharui data <strong>Konsep</strong>. <strong><a
                                            href="/dashboard/theme/{{ session('updated') }}">Lihat</a></strong>.
                                @endif
                                @if (session('deleted'))
                                    Berhasil menghapus data <strong>Konsep</strong> dengan nama
                                    <strong>{{ session('deleted') }}</strong>.
                                @endif
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card mt-3">
                            <div class="card-header d-flex align-items-center">
                                <h4 class="flex-grow-1 m-0 font-weight-bold">Data Konsep</h4>
                                <a href="/dashboard/theme/create" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center small-td">No</th>
                                            <th class="text-center">Thumbnail</th>
                                            <th class="text-center">Nama Konsep</th>
                                            <th class="text-center small-td">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($themes->count())
                                            @foreach ($themes as $theme)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="text-center align-middle"
                                                        style="width: 100px; height: 100px;">
                                                        <img src="{{ asset('storage/' . $theme->thumbnail) }}"
                                                            style="width: 100px;  height: 100px; object-fit: contain;">
                                                    </td>
                                                    <td class="text-center align-middle">{{ $theme->name }}</td>
                                                    <td class="text-center align-middle small-td">
                                                        <a href="/dashboard/theme/{{ $theme->id }}"
                                                            class="btn btn-sm btn-info">Lihat</a>
                                                        <a href="/dashboard/theme/{{ $theme->id }}/edit"
                                                            class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="/dashboard/theme/{{ $theme->id }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure?')">Hapus </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4" class="text-center align-middle">Data Tidak Ada</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
