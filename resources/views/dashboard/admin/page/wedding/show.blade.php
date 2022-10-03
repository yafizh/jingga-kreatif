@extends('dashboard.admin.layout.main')

@section('content')
    <style>
        .bg-dark:hover i,
        .bg-dark:hover h5 {
            color: var(--primary-color);
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Detail Wedding {{ $client->name }}</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link {{ $section == 'profile' ? 'active' : '' }}" href="#profile"
                                            data-toggle="tab">
                                            Profil
                                        </a>
                                    </li>
                                    @if ($groom)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $section == 'groom' ? 'active' : '' }}" href="#groom"
                                                data-toggle="tab">
                                                Identitas Mempelai Pria
                                            </a>
                                        </li>
                                    @endif
                                    @if ($bride)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $section == 'bride' ? 'active' : '' }}" href="#bride"
                                                data-toggle="tab">
                                                Identitas Mempelai Wanita
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link {{ $section == 'vendor' ? 'active' : '' }}" href="#vendor"
                                            data-toggle="tab">
                                            Vendor & Konsep
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $section == 'meeting' ? 'active' : '' }}" href="#meeting"
                                            data-toggle="tab">
                                            Riwayat Pertemuan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $section == 'payment' ? 'active' : '' }}" href="#payment"
                                            data-toggle="tab">
                                            Pembayaran
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane {{ $section == 'profile' ? 'active' : '' }}" id="profile">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="{{ $client->name }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nomor
                                                Telepon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                    value="{{ $client->phone_number }}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" value="{{ $client->email }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($groom)
                                        <div class="tab-pane {{ $section == 'groom' ? 'active' : '' }}" id="groom">
                                            <form action="/dashboard/newlywed/{{ $groom->id }}" method="POST"
                                                class="form-horizontal">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <label for="nik" class="col-sm-2 col-form-label">
                                                        NIK
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nik"
                                                            name="nik" value="{{ $groom->nik }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $groom->name }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="birthplace" class="col-sm-2 col-form-label">
                                                        Tempat Lahir
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="birthplace"
                                                            name="birthplace" value="{{ $groom->birthplace }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="birthdate" class="col-sm-2 col-form-label">
                                                        Tanggal Lahir
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="birthdate"
                                                            name="birthdate" value="{{ $groom->birthdate }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="father_name" class="col-sm-2 col-form-label">
                                                        Nama Ayah
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="father_name"
                                                            name="father_name" value="{{ $groom->father_name }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mother_name" class="col-sm-2 col-form-label">
                                                        Nama Ibu
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="mother_name"
                                                            name="mother_name" value="{{ $groom->mother_name }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mother_name" class="col-sm-2 col-form-label">
                                                        Foto Mempelai
                                                        |
                                                        <a href="{{ asset('storage/' . $groom->photo) }}">Lihat</a>
                                                    </label>
                                                    <div class="input-group col-sm-10">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="photo" name="photo">
                                                            <label class="custom-file-label" for="photo">Pilih
                                                                Foto</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Perbaharui</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    @if ($bride)
                                        <div class="tab-pane {{ $section == 'bride' ? 'active' : '' }}" id="bride">
                                            <form action="/dashboard/newlywed/{{ $bride->id }}" method="POST"
                                                class="form-horizontal">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="nik" class="col-sm-2 col-form-label">
                                                        NIK
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nik"
                                                            name="nik" value="{{ $bride->nik }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $bride->name }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="birthplace" class="col-sm-2 col-form-label">
                                                        Tempat Lahir
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="birthplace"
                                                            name="birthplace" value="{{ $bride->birthplace }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="birthdate" class="col-sm-2 col-form-label">
                                                        Tanggal Lahir
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="birthdate"
                                                            name="birthdate" value="{{ $bride->birthdate }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="father_name" class="col-sm-2 col-form-label">
                                                        Nama Ayah
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="father_name"
                                                            name="father_name" value="{{ $bride->father_name }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mother_name" class="col-sm-2 col-form-label">
                                                        Nama Ibu
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="mother_name"
                                                            name="mother_name" value="{{ $bride->mother_name }}"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mother_name" class="col-sm-2 col-form-label">
                                                        Foto Mempelai
                                                        |
                                                        <a href="{{ asset('storage/' . $bride->photo) }}">Lihat</a>
                                                    </label>
                                                    <div class="input-group col-sm-10">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="photo" name="photo">
                                                            <label class="custom-file-label" for="photo">Pilih
                                                                Foto</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Perbaharui</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    <style>
                                        #vendor .card {
                                            width: 12rem;
                                            /* height: 360px; */
                                        }

                                        #vendor .card-image {
                                            position: relative;
                                            height: 176px;
                                        }

                                        #vendor .card-image img {
                                            object-fit: cover;
                                            height: 100%;
                                            width: 100%;
                                        }

                                        #vendor .overplay {
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            right: 0;
                                            bottom: 0;
                                            width: 100%;
                                            opacity: 0;
                                            visibility: none;
                                            transition: 0.5s ease;
                                            background-color: #393839;

                                            text-align: center;
                                            color: #fff;

                                            /* Flex Box */
                                            display: flex;
                                            flex-direction: column;
                                            justify-content: center;
                                            align-items: center;
                                        }

                                        #vendor .card:hover .overplay {
                                            opacity: 1;
                                        }
                                    </style>
                                    <div class="tab-pane {{ $section == 'vendor' ? 'active' : '' }}" id="vendor">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Total Harga: Rp {{ number_format($vendors['total_price'],0,",",".") }}</h3>
                                            </div>
                                        </div>
                                        @if ($theme)
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3>Konsep</h3>
                                                </div>
                                                <div class="col-6 col-sm-3 col-xl-2 mb-3">
                                                    <div class="card border-1 w-100">
                                                        <div class="card-image">
                                                            <img src="{{ asset('storage/' . $theme->thumbnail) }}">
                                                            <div class="overplay">
                                                                <h5 class="text-center text-white">{{ $theme->name }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="card-body pt-3">
                                                            <button
                                                                class="btn btn-outline-danger btn-sm w-100">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (count($vendors['vendor_type_id']))
                                            @foreach ($vendors['vendor_type_id'] as $vendor_type_id)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h3>{{ $vendors['vendor'][$vendor_type_id][0]->vendorType->name }}
                                                        </h3>
                                                    </div>
                                                    @foreach ($vendors['vendor'][$vendor_type_id] as $vendor)
                                                        <div class="col-6 col-sm-3 col-xl-2 mb-3">
                                                            <div class="card border-1 w-100">
                                                                <div class="card-image">
                                                                    <img src="{{ asset('storage/' . $vendor->logo) }}">
                                                                    <div class="overplay">
                                                                        <h5 class="text-center text-white">
                                                                            {{ $vendor->name }}
                                                                        </h5>
                                                                        <h6 class="text-white">Rp.
                                                                            {{ number_format($vendor->price, 0, ',', '.') }}
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body pt-3">
                                                                    <button
                                                                        class="btn btn-outline-danger btn-sm w-100">Hapus</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane {{ $section == 'meeting' ? 'active' : '' }}" id="meeting">
                                        <div class="row">
                                            @if ($meetings->count())
                                                @foreach ($meetings as $meeting)
                                                    <div class="col-12 col-md-4">
                                                        <div class="border rounded mb-3 p-3">
                                                            <div class="row">
                                                                <div class="col-12 mb-3">
                                                                    <h5 class="mb-0">{{ $meeting->topic }}</h5>
                                                                    <h6 class="text-muted">{{ $meeting->meeting_day }},
                                                                        {{ $meeting->meeting_date }}</h6>
                                                                </div>
                                                                <div class="col-12">
                                                                    <button class="btn btn-outline-info">Lihat</button>
                                                                    <a href="/dashboard/meeting/{{ $meeting->id }}/edit"
                                                                        class="btn btn-outline-warning">Edit</a>
                                                                    <form action="/dashboard/meeting/{{ $meeting->id }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-outline-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="col-12 col-md-4 mb-3">
                                                <a href="/dashboard/meeting/create/{{ $wedding->id }}">
                                                    <div class="border rounded mb-3 p-3 h-100 bg-dark">
                                                        <div
                                                            class="row h-100 justify-content-center align-items-center text-center">
                                                            <div class="col-12">
                                                                <i class="fas fa-plus" style="font-size: 32px;"></i>
                                                                <br>
                                                                <h5>Tambah</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane {{ $section == 'payment' ? 'active' : '' }}" id="payment">
                                        <div class="row">
                                            @if ($payments->count())
                                                @foreach ($payments as $payment)
                                                    <div class="col-12 col-md-4">
                                                        <div class="border rounded mb-3 p-3">
                                                            <div class="row">
                                                                <div class="col-12 mb-3">
                                                                    <h5 class="mb-0">{{ $payment->name }}</h5>
                                                                    <h6 class="text-muted">Rp.
                                                                        {{ number_format($payment->nominal, 0, ',', '.') }}
                                                                    </h6>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a href="/dashboard/payment/{{ $payment->id }}/edit"
                                                                        class="btn btn-outline-warning">Edit</a>
                                                                    <form action="/dashboard/payment/{{ $payment->id }}"
                                                                        method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-outline-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="col-12 col-md-4 mb-3">
                                                <a href="/dashboard/payment/create/{{ $wedding->id }}">
                                                    <div class="border rounded mb-3 p-3 h-100 bg-dark">
                                                        <div
                                                            class="row h-100 justify-content-center align-items-center text-center">
                                                            <div class="col-12">
                                                                <i class="fas fa-plus" style="font-size: 32px;"></i>
                                                                <br>
                                                                <h5>Tambah</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
