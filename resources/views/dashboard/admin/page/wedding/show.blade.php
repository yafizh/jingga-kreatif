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
                                        <a class="nav-link {{ $section == 'meeting_history' ? 'active' : '' }}"
                                            href="#meeting_history" data-toggle="tab">
                                            Riwayat Pertemuan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $section == 'payment' ? 'active' : '' }}" href="#payment"
                                            data-toggle="tab">
                                            Pembayaran
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ $section == 'finish' ? 'active' : '' }}" href="#finish"
                                            data-toggle="tab">
                                            Kelengkapan
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
                                                class="form-horizontal" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <label for="nik" class="col-sm-2 col-form-label">
                                                        NIK
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nik"
                                                            name="nik" value="{{ $groom->nik }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $groom->name }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="birthplace" class="col-sm-2 col-form-label">
                                                        Tempat Lahir
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="birthplace"
                                                            name="birthplace" value="{{ $groom->birthplace }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="birthdate" class="col-sm-2 col-form-label">
                                                        Tanggal Lahir
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="birthdate"
                                                            name="birthdate" value="{{ $groom->birthdate }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="father_name" class="col-sm-2 col-form-label">
                                                        Nama Ayah
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="father_name"
                                                            name="father_name" value="{{ $groom->father_name }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mother_name" class="col-sm-2 col-form-label">
                                                        Nama Ibu
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="mother_name"
                                                            name="mother_name" value="{{ $groom->mother_name }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="photo" class="col-sm-2 col-form-label">
                                                        Foto Mempelai
                                                        |
                                                        <a href="{{ asset('storage/' . $groom->photo) }}"
                                                            target="_blank">Lihat</a>
                                                    </label>
                                                    <div class="input-group col-sm-10">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="photo" name="photo"
                                                                {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                            <label class="custom-file-label" for="photo">
                                                                Ganti Foto
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach ($groom->documents as $document)
                                                    <div class="form-group row">
                                                        <label for="document" class="col-sm-2 col-form-label">
                                                            Dokumen {{ $loop->iteration }}
                                                            |
                                                            <a href="{{ asset('storage/' . $document->document) }}"
                                                                target="_blank">Lihat</a>
                                                        </label>
                                                        <div class="input-group col-sm-10">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="document" name="documents[]"
                                                                    {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                                <input type="text" name="id_documents[]"
                                                                    value="{{ $document->id }}">
                                                                <label class="custom-file-label" for="document">
                                                                    Ganti Dokumen
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @if (is_null($wedding->status))
                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit"
                                                                class="btn btn-primary">Perbaharui</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </form>
                                        </div>
                                    @endif
                                    @if ($bride)
                                        <div class="tab-pane {{ $section == 'bride' ? 'active' : '' }}" id="bride">
                                            <form action="/dashboard/newlywed/{{ $bride->id }}" method="POST"
                                                class="form-horizontal" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <label for="nik" class="col-sm-2 col-form-label">
                                                        NIK
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="nik"
                                                            name="nik" value="{{ $bride->nik }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $bride->name }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="birthplace" class="col-sm-2 col-form-label">
                                                        Tempat Lahir
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="birthplace"
                                                            name="birthplace" value="{{ $bride->birthplace }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="birthdate" class="col-sm-2 col-form-label">
                                                        Tanggal Lahir
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" id="birthdate"
                                                            name="birthdate" value="{{ $bride->birthdate }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="father_name" class="col-sm-2 col-form-label">
                                                        Nama Ayah
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="father_name"
                                                            name="father_name" value="{{ $bride->father_name }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mother_name" class="col-sm-2 col-form-label">
                                                        Nama Ibu
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="mother_name"
                                                            name="mother_name" value="{{ $bride->mother_name }}" required
                                                            {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="photo" class="col-sm-2 col-form-label">
                                                        Foto Mempelai
                                                        |
                                                        <a href="{{ asset('storage/' . $bride->photo) }}"
                                                            target="_blank">Lihat</a>
                                                    </label>
                                                    <div class="input-group col-sm-10">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="photo" name="photo"
                                                                {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                            <label class="custom-file-label" for="photo">Ganti
                                                                Foto</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach ($bride->documents as $document)
                                                    <div class="form-group row">
                                                        <label for="document" class="col-sm-2 col-form-label">
                                                            Dokumen {{ $loop->iteration }}
                                                            |
                                                            <a href="{{ asset('storage/' . $document->document) }}"
                                                                target="_blank">Lihat</a>
                                                        </label>
                                                        <div class="input-group col-sm-10">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="document" name="documents[]"
                                                                    {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                                <input type="text" name="id_documents[]"
                                                                    value="{{ $document->id }}">
                                                                <label class="custom-file-label" for="document">
                                                                    Ganti Dokumen
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @if (is_null($wedding->status))
                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit"
                                                                class="btn btn-primary">Perbaharui</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </form>
                                        </div>
                                    @endif
                                    <div class="tab-pane {{ $section == 'vendor' ? 'active' : '' }}" id="vendor">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Total Harga: Rp
                                                    {{ number_format($vendors['total_price'], 0, ',', '.') }}
                                                </h3>
                                            </div>
                                        </div>
                                        @if ($wedding_theme)
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3>Konsep</h3>
                                                </div>
                                                <div class="col-6 col-sm-3 col-xl-2 mb-3">
                                                    <div class="card h-100 card-theme">
                                                        <div class="card-image">
                                                            <img
                                                                src="{{ asset('storage/' . $wedding_theme->theme->thumbnail) }}">
                                                        </div>
                                                        <div class="card-body d-flex justify-content-center">
                                                            <div class="card-title text-center">
                                                                <h5>{{ $wedding_theme->theme->name }}</h5>
                                                            </div>
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

                                                            <div class="card h-100 card-theme">
                                                                <div class="card-image">
                                                                    <img src="{{ asset('storage/' . $vendor->logo) }}">
                                                                </div>
                                                                <div
                                                                    class="card-body d-flex justify-content-between flex-column">
                                                                    <div class="card-title text-center">
                                                                        <h5>{{ $vendor->name }}</h5>
                                                                        <h6 class="text-muted">Rp.
                                                                            {{ number_format($vendor->price, 0, ',', '.') }}
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane {{ $section == 'meeting_history' ? 'active' : '' }}"
                                        id="meeting_history">
                                        <div class="row">
                                            @if ($meetingHistory->count())
                                                @foreach ($meetingHistory as $meeting)
                                                    <div class="col-12 col-md-4">
                                                        <div class="border rounded mb-3 p-3">
                                                            <div class="row">
                                                                <div class="col-12 mb-3">
                                                                    <h5 class="mb-0">{{ $meeting->topic }}</h5>
                                                                    <h6 class="text-muted">{{ $meeting->meeting_day }},
                                                                        {{ $meeting->meeting_date }}</h6>
                                                                </div>
                                                                <div class="col-12">
                                                                    <a href="/dashboard/meeting-history/{{ $meeting->id }}"
                                                                        class="btn btn-outline-info">Lihat</a>
                                                                    @if (is_null($wedding->status))
                                                                        <a href="/dashboard/meeting-history/{{ $meeting->id }}/edit"
                                                                            class="btn btn-outline-warning">Edit</a>
                                                                        <form
                                                                            action="/dashboard/meeting-history/{{ $meeting->id }}"
                                                                            method="POST" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-outline-danger">Hapus</button>
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="col-12 col-md-4 mb-3">
                                                <a href="/dashboard/meeting-history/create/{{ $wedding->id }}">
                                                    <div class="border rounded mb-3 p-3 h-100 bg-dark"
                                                        style="max-width: 10rem;">
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
                                                                    @if (!$payment->paymentHistories->count())
                                                                        <span
                                                                            class="rounded rounded-2 px-3 py-1 bg-warning">Menuggu
                                                                            Pembayaran</span>
                                                                    @elseif (is_null($payment->paymentHistories->first()->status))
                                                                        <span
                                                                            class="rounded rounded-2 px-3 py-1 bg-info">Menunggu
                                                                            Verifikasi</span>
                                                                    @elseif (!$payment->paymentHistories->first()->status)
                                                                        <span
                                                                            class="rounded rounded-2 px-3 py-1 bg-danger">Ditolak</span>
                                                                    @elseif ($payment->paymentHistories->first()->status)
                                                                        <span
                                                                            class="rounded rounded-2 px-3 py-1 bg-success">Diterima</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-12">
                                                                    <a href="/dashboard/payment/{{ $payment->id }}"
                                                                        class="btn btn-outline-info">Lihat</a>
                                                                    @if (is_null($payment->wedding->status))
                                                                        @if (!$payment->paymentHistories->count() || $payment->paymentHistories->first()->status === 0)
                                                                            <a href="/dashboard/payment/{{ $payment->id }}/edit"
                                                                                class="btn btn-outline-warning">Edit</a>
                                                                            <form
                                                                                action="/dashboard/payment/{{ $payment->id }}"
                                                                                method="POST" class="d-inline">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-outline-danger">Hapus</button>
                                                                            </form>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="col-12 col-md-4 mb-3">
                                                <a href="/dashboard/payment/create/{{ $wedding->id }}">
                                                    <div class="border rounded mb-3 p-3 h-100 bg-dark"
                                                        style="max-width: 12rem;">
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
                                    <div class="tab-pane {{ $section == 'finish' ? 'active' : '' }}" id="finish">
                                        <form action="/dashboard/wedding/{{ $wedding->id }}" method="POST"
                                            class="form-horizontal">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="wedding_date" class="col-sm-2 col-form-label">
                                                    Tanggal Wedding
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="wedding_date"
                                                        name="wedding_date" value="{{ $wedding->wedding_date }}"
                                                        autocomplete="off"
                                                        {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="place" class="col-sm-2 col-form-label">Tempat
                                                    Wedding</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="place"
                                                        name="place" value="{{ $wedding->place }}" autocomplete="off"
                                                        {{ is_null($wedding->status) ? '' : 'disabled' }}>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-2 col-form-label">
                                                    Alamat
                                                </label>
                                                <div class="col-sm-10">
                                                    <textarea name="address" id="address" autocomplete="off" class="form-control"
                                                        {{ is_null($wedding->status) ? '' : 'disabled' }}>{{ $wedding->address }}</textarea>
                                                </div>
                                            </div>
                                            @if (is_null($wedding->status))
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary">Perbaharui</button>
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                        <hr>
                                        @if (is_null($wedding->status))
                                            <form action="/dashboard/wedding/{{ $wedding->id }}/finish" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h6 class="mb-1"><strong>Kegiatan Wedding Telah Selesai</strong>
                                                        </h6>
                                                        <h6>Ketika kegiatan wedding telah selesai, semua data tidak dapat
                                                            diubah
                                                            lagi.
                                                        </h6>
                                                    </div>
                                                    <div class="col-4 d-flex align-items-center justify-content-end">
                                                        <button type="submit" class="btn btn-outline-success"
                                                            onclick="return confirm('Are you sure?')">Wedding
                                                            Selesai</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form action="/dashboard/wedding/{{ $wedding->id }}/cancel" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h6 class="mb-1"><strong>Batalkan Kegiatan Wedding</strong></h6>
                                                        <h6>Ketika kegiatan wedding telah dibatalkan, semua data tidak dapat
                                                            diubah
                                                            lagi.
                                                        </h6>
                                                    </div>
                                                    <div class="col-4 d-flex align-items-center justify-content-end">
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('Are you sure?')">Batalkan
                                                            Wedding</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form action="/dashboard/wedding/{{ $wedding->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h6 class="mb-1 text-danger"><strong>Hapus Kegiatan
                                                                Wedding</strong></h6>
                                                        <h6 class="text-danger">Menghapus kegiatan wedding membuat anda tidak dapat melihat lagi data wedding tersebut.</h6>
                                                    </div>
                                                    <div class="col-4 d-flex align-items-center justify-content-end">
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('Are you sure?')">Hapus
                                                            Wedding</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                        @endif
                                        <div class="row">
                                            <div class="col-8">
                                                <h6 class="mb-1"><strong>Laporan Data Wedding</strong></h6>
                                                <h6>Rekap data wedding (identitas klien, identitas mempelai pria dan wanita,
                                                    konsep dan vendor, riwayat meeting, dan riwayat pembayaran) dalam bentuk
                                                    pdf.
                                                </h6>
                                            </div>
                                            <div class="col-4 d-flex align-items-center justify-content-end">
                                                <a href="/dashboard/wedding/print/{{ $wedding->id }}" target="_blank"
                                                    class="btn btn-outline-primary">Laporan Wedding</a>
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
