@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row py-3">
                    <div class="col-12">
                        @if (session('deleted'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Berhasil menghapus data <strong>Wedding</strong> klien dengan nama
                                <strong>{{ session('deleted') }}</strong>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card mt-3">
                            <div class="card-header d-flex align-items-center">
                                <h4 class="flex-grow-1 m-0 font-weight-bold">Data Pengajuan</h4>
                            </div>
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center small-td">No</th>
                                            <th class="text-center">Nama Klien</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Nomor Telepon</th>
                                            <th class="text-center small-td">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($weddings->count())
                                            @foreach ($weddings as $wedding)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="text-center align-middle">{{ $wedding->client->name }}</td>
                                                    <td class="text-center align-middle">{{ $wedding->client->email }}</td>
                                                    <td class="text-center align-middle">
                                                        {{ $wedding->client->phone_number }}</td>
                                                    <td class="text-center align-middle small-td">
                                                        <a href="/dashboard/wedding/{{ $wedding->id }}"
                                                            class="btn btn-sm btn-info">Lihat</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center align-middle">Data Tidak Ada</td>
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
