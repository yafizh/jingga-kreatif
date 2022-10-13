@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row py-3">
                    <div class="col-12">
                        @if (session('updated') || session('deleted') || session('updated_password'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                @if (session('updated'))
                                    Berhasil memperbaharui data <strong>Klien</strong> dengan nama
                                    <strong>{{ session('updated') }}</strong>.
                                @endif
                                @if (session('deleted'))
                                    Berhasil menghapus data <strong>Klien</strong> dengan nama
                                    <strong>{{ session('deleted') }}</strong>.
                                @endif
                                @if (session('updated_password'))
                                    Berhasil memperbaharui password <strong>Klien</strong> dengan nama
                                    <strong>{{ session('updated_password') }}</strong>.
                                @endif
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card mt-3">
                            <div class="card-header d-flex align-items-center">
                                <h4 class="flex-grow-1 m-0 font-weight-bold">Data Klien</h4>
                            </div>
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
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
                                                        <a href="/dashboard/client/{{ $client->id }}/edit-password"
                                                            class="btn btn-sm btn-info">Ganti Password</a>
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
