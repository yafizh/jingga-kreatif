@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card mt-3">
                            <div class="card-header d-flex align-items-center">
                                <h4 class="flex-grow-1 m-0 font-weight-bold">Data Klien</h4>
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
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Nomor Telepon</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center small-td">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($clients->count())
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                                    <td class="text-center align-middle">{{ $client->name }}</td>
                                                    <td class="text-center align-middle">{{ $client->phone_number }}</td>
                                                    <td class="text-center align-middle">{{ $client->email }}</td>
                                                    <td class="text-center align-middle small-td">
                                                        <a href="/dashboard/client/{{ $client->id }}/edit"
                                                            class="btn btn-sm btn-warning">Edit</a>
                                                        <form action="/dashboard/client/{{ $client->id }}" method="POST"
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
                                                <td colspan="5" class="text-center align-middle">Data Tidak Ada</td>
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
