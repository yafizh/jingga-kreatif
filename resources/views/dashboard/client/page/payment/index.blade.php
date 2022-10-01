@extends('dashboard.client.layout.main')

@section('content')
    @include('dashboard.client.partials.navigation')
    <div class="row w-100 justify-content-center">
        <div class="col-12">
            <h3 class="my-4">Pembayaran</h3>
        </div>
        <div class="col-12">
            <div class="mb-3 p-4 bg-white jingga-shadow rounded-2 w-100">
                <div class="row p-4 text-center">
                    <div class="col-12 col-md-6">
                        <h2 class="mb-3">Rp. {{ number_format($need_to_pay, 0, ',', '.') }}</h2>
                        <h5 class="text-muted">Perlu Dibayar</h5>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <h2 class="mb-3">Rp. {{ number_format($already_pay, 0, ',', '.') }}</h2>
                        <h5 class="text-muted">Telah Dibayar</h5>
                    </div>
                </div>
                <hr>
                @if ($payments->count())
                    @foreach ($payments as $payment)
                        <div class="row align-items-center">
                            <div class="col-12 text-center col-lg-3 my-1 align-self-center">
                                {{ $payment->name }}
                            </div>
                            <div class="col-12 text-center col-lg-3 my-1 align-self-center">
                                Rp. {{ number_format($payment->nominal, 0, ',', '.') }}
                            </div>
                            <div class="col-12 text-center col-lg-3 my-1 align-self-center">
                                @if (!$payment->paymentHistory->count())
                                    <span class="rounded-pill text-white px-3 py-1 bg-warning">Menuggu Pembayaran</span>
                                @elseif (is_null($payment->paymentHistory->first()->status))
                                    <span class="rounded-pill text-white px-3 py-1 bg-info">Menunggu Verifikasi</span>
                                @elseif (!$payment->paymentHistory->first()->status)
                                    <span class="rounded-pill text-white px-3 py-1 bg-danger">Ditolak</span>
                                @elseif ($payment->paymentHistory->first()->status)
                                    <span class="rounded-pill text-white px-3 py-1 bg-success">Diterima</span>
                                @endif
                            </div>
                            <div class="col-12 text-center col-lg-3 my-1 align-self-center">
                                @if (!$payment->paymentHistory->count())
                                    <button class="btn btn btn-primary pay-btn" data-id="{{ $payment->id }}">Lakukan
                                        Pembayaran</button>
                                @elseif (!$payment->paymentHistory->first()->status)
                                    <button class="btn btn btn-primary pay-btn" data-id="{{ $payment->id }}">Lakukan
                                        Pembayaran Ulang</button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row align-items-center">
                        <h5 class="text-center text-muted mb-0">Tidak Ada Pembayaran</h5>
                    </div>
                @endif
                <hr>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formPaymentModal" tabindex="-1" aria-labelledby="formPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="bank" class="form-label">Opsi Pembayaran</label>
                            <select class="form-control" name="bank" id="bank">
                                <option value="" disabled selected>Pilih Bank</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="owner_name" class="form-label">Nama Rekening</label>
                            <input type="text" class="form-control" disabled id="owner_name" name="owner_name">
                        </div>
                        <div class="mb-3">
                            <label for="pin" class="form-label">Nomor Rekening</label>
                            <input type="text" class="form-control" disabled id="pin" name="pin">
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Bukti Pembayaran</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
