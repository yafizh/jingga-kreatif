@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-center">
                    <div class="col-sm-6 text-center">
                        <h1>Detail Pembayaran</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary shadow">
                            <form action="/dashboard/payment/verification/{{ $payment->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Pembayaran</label>
                                        <input type="text" class="form-control" value="{{ $payment->name }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Nominal</label>
                                        <input type="text" class="form-control"
                                            value="Rp {{ number_format($payment->nominal, 0, ',', '.') }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Status Pembayaran</label>
                                        @if (!$payment->paymentHistories->count())
                                            <span class="rounded rounded-2 px-3 py-1 bg-warning">Menuggu Pembayaran</span>
                                        @elseif (is_null($payment->paymentHistories->first()->status))
                                            <span class="rounded rounded-2 px-3 py-1 bg-info">Menunggu Verifikasi</span>
                                        @elseif (!$payment->paymentHistories->first()->status)
                                            <span class="rounded rounded-2 px-3 py-1 bg-danger">Ditolak</span>
                                        @elseif ($payment->paymentHistories->first()->status)
                                            <span class="rounded rounded-2 px-3 py-1 bg-success">Diterima</span>
                                        @endif
                                    </div>
                                    @if ($payment->paymentHistories->count())
                                        <div class="form-group">
                                            <label>Tanggal Pembayaran</label>
                                            <input type="text" class="form-control" value="{{ $payment->payment_date }}"
                                                disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Tujuan Pembayaran</label>
                                            <input type="text" class="form-control mb" value="{{ $payment->bank->bank_name }}" disabled>
                                            <input type="text" class="form-control my-2" value="{{ $payment->bank->owner_name }}" disabled>
                                            <input type="text" class="form-control mb" value="{{ $payment->bank->pin }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block">Bukti Pembayaran</label>
                                            <a href="{{ asset('storage/' . $payment->photo) }}" target="_blank">Lihat Foto</a>
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="/dashboard/wedding/{{ $payment->wedding_id }}"
                                            class="btn btn-secondary">Kembali</a>
                                        @if (is_null($payment->wedding->status))
                                            <div class="d-flex">
                                                @if (!$payment->paymentHistories->count() || $payment->paymentHistories->first()->status === 0)
                                                    <a href="/dashboard/payment/{{ $payment->id }}/edit"
                                                        class="btn btn-warning mr-1">Edit</a>
                                                    <form action="/dashboard/payment/{{ $payment->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure?')">Hapus </button>
                                                    </form>
                                                @elseif (!$payment->paymentHistories->count() || is_null($payment->paymentHistories->first()->status))
                                                    <button type="submit" name="verification-btn" value="reject"
                                                        class="btn btn-danger mr-1"
                                                        onclick="return confirm('Yakin menolak pembayaran ini?')">Tolak</button>
                                                    <button type="submit" name="verification-btn" value="approve"
                                                        class="btn btn-success"
                                                        onclick="return confirm('Yakin menerima pembayaran ini?')">Terima</button>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
