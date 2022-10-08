<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .small-td {
            width: 1%;
            white-space: nowrap;
        }

        @media print {
            .pagebreak {
                clear: both;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
    <div class="p-5">
        <h4 class="text-center">Laporan Data Wedding</h4>
        <div class="client mt-5">
            <h5>Identitas Klien</h5>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="small-td">Nama</td>
                        <td class="small-td">:</td>
                        <td>{{ $client->name }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Nomor Telepon</td>
                        <td class="small-td">:</td>
                        <td>{{ $client->phone_number }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Email</td>
                        <td class="small-td">:</td>
                        <td>{{ $client->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="groom pagebreak mt-5">
            <h5>Identitas Mempelai Pria</h5>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="small-td">NIK</td>
                        <td class="small-td">:</td>
                        <td>{{ $groom->nik }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Name</td>
                        <td class="small-td">:</td>
                        <td>{{ $groom->name }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Tempat Lahir</td>
                        <td class="small-td">:</td>
                        <td>{{ $groom->birthplace }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Tanggal Lahir</td>
                        <td class="small-td">:</td>
                        <td>{{ $groom->birthdate }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Nama Ayah</td>
                        <td class="small-td">:</td>
                        <td>{{ $groom->father_name }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Nama Ibu</td>
                        <td class="small-td">:</td>
                        <td>{{ $groom->mother_name }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Gambar</td>
                        <td class="small-td">:</td>
                        <td><img src="https://images.unsplash.com/photo-1591084728795-1149f32d9866?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80"
                                style="width: 4cm; height: 6cm; object-fit: cover;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bride pagebreak mt-5">
            <h5>Identitas Mempelai Wanita</h5>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="small-td">NIK</td>
                        <td class="small-td">:</td>
                        <td>{{ $bride->nik }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Name</td>
                        <td class="small-td">:</td>
                        <td>{{ $bride->name }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Tempat Lahir</td>
                        <td class="small-td">:</td>
                        <td>{{ $bride->birthplace }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Tanggal Lahir</td>
                        <td class="small-td">:</td>
                        <td>{{ $bride->birthdate }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Nama Ayah</td>
                        <td class="small-td">:</td>
                        <td>{{ $bride->father_name }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Nama Ibu</td>
                        <td class="small-td">:</td>
                        <td>{{ $bride->mother_name }}</td>
                    </tr>
                    <tr>
                        <td class="small-td">Gambar</td>
                        <td class="small-td">:</td>
                        <td><img src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=386&q=80"
                                style="width: 4cm; height: 6cm; object-fit: cover;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="theme-vendor pagebreak mt-5">
            <h5>Konsep dan Vendor</h5>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="small-td">Konsep</td>
                        <td class="small-td">:</td>
                        <td colspan="2">{{ $wedding_theme->theme->name ?? '' }}</td>
                    </tr>
                    @foreach ($vendors['vendor_type_id'] as $vendor_type_id)
                        <tr>
                            <td class="small-td align-middle"
                                rowspan="{{ count($vendors['vendor'][$vendor_type_id]) + 1 }}">
                                {{ $vendors['vendor'][$vendor_type_id][0]->vendorType->name }}</td>
                            <td class="small-td align-middle"
                                rowspan="{{ count($vendors['vendor'][$vendor_type_id]) + 1 }}">:</td>
                        </tr>
                        @foreach ($vendors['vendor'][$vendor_type_id] as $vendor)
                            <tr>
                                <td>Vendor {{ $vendor->name }}</td>
                                <td class="text-end">Rp {{ number_format($vendor->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    <tr>
                        <td class="small-td">Total Biaya Vendor</td>
                        <td class="small-td">:</td>
                        <td class="text-end" colspan="2">
                            <strong>
                                Rp {{ number_format($vendors['total_price'], 0, ',', '.') }}
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="meeting pagebreak mt-5">
            <h5>Riwayat Pertemuan</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Tanggal Pertemuan</th>
                        <th scope="col" class="text-center">Topik Pertemuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meetingHistory as $meeting)
                        <tr>
                            <td class="small-td text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="small-td text-center align-middle">{{ $meeting->meeting_day }},
                                {{ $meeting->meeting_date }}</td>
                            <td class="text-center">{{ $meeting->topic }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="payment pagebreak mt-5">
            <h5>Riwayat Pembayaran</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center small-td">Nama Pembayaran</th>
                        <th scope="col" class="text-center">Nominal Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="small-td">{{ $payment->name }}</td>
                            <td class="text-end">Rp {{ number_format($payment->nominal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="small-td">Total Pembayaran</td>
                        <td class="text-end" colspan="2">
                            <strong>
                                Rp {{ number_format($payments->sum('nominal'), 0, ',', '.') }}
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>
