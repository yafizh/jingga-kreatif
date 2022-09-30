@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card mt-3">
                            <div class="card-header d-flex align-items-center">
                                <h4 class="flex-grow-1 m-0 font-weight-bold">Data Pengajuan</h4>
                            </div>
                            <style>
                                .small-td {
                                    width: 1%;
                                    white-space: nowrap;
                                }
                            </style>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped">
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
