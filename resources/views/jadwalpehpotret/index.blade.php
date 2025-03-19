@extends('tataletak.app')

@section('content')
    <style>
        .table-responsive {
            overflow-x: auto;
            white-space: nowrap;
        }

        .header-container {
            position: relative;
            text-align: center;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; /* Menjaga header dan tombol berada di kolom */
        }

        .header-container a:hover {
            background-color: #000000;
            color: #f8f9fa;
        }

        .judul {
            font-size: 25px;
            font-weight: bold;
            color: #8B5E3C; /* Warna Gold */
            margin-bottom: 10px;
        }

        .btn-create {
            background-color: #D4AF37; /* Gold */
            border: none;
            font-weight: bold;
            padding: 8px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 10px;
            position: absolute; /* Tombol di posisikan di kanan */
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .btn-create:hover {
            background-color: #B8860B; /* Gold lebih gelap */
        }

        .sub-judul {
            text-align: left; /* Rata kiri */
            font-size: 18px;
            font-weight: bold;
            color: #B8860B; /* Warna Gold lebih gelap */
            margin-bottom: 10px;
            padding-left: 10px; /* Beri jarak dari tepi */
        }

        .action {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #867554; /* Warna cream elegan */
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table th.bg-secondary {
            background-color: #6c757d !important;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }

        /* Penataan kolom */
        .table thead th {
            font-weight: bold;
            color: #495057;
        }

        .table tbody td {
            color: #495057;
        }

        /* Media query untuk tampilan mobile */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column; /* Menyusun ulang menjadi kolom pada mobile */
                align-items: center; /* Menjaga semuanya tetap terpusat */
            }

            .btn-create {
                position: relative;
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%; /* Tombol tidak terlalu lebar */
                text-align: center; /* Menjaga tombol tetap di tengah */
                transform: none; /* Menghapus transformasi translate */
                top: auto; /* Menghapus posisi top agar tombol tidak ikut berubah */
            }
        }
    </style>

    <div class="header-container">
        <div class="judul">Jadwal Pehpotret</div>
        <a href="/jadwalpehpotret/create" class="btn btn-create shadow-sm">
            <i class="fas fa-plus"></i> Create New Jadwal
        </a>
    </div>

    <div class="card">
        <div class="table-responsive">
            @php
                $jadwalpehpotret = $jadwalpehpotret->sortBy('tanggal_jpehpotret')->groupBy(function ($item) {
                    return \Carbon\Carbon::parse($item->tanggal_jpehpotret)->translatedFormat('F Y');
                });
            @endphp

            @foreach ($jadwalpehpotret as $bulan => $items)
                <div class="month-container">
                    <span>{{ $bulan }}</span> <!-- Menampilkan nama bulan di kiri -->
                </div>
                <table class="table table-bordered table-hover">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th rowspan="2">Nama</th>
                            <th rowspan="2">Brand</th>
                            <th rowspan="2">Tanggal</th>
                            <th rowspan="2">Keterangan</th>
                            <th colspan="4" class="text-center">TIM</th>
                            <th rowspan="2">Customer Service</th>
                            <th rowspan="2">Paket</th>
                            <th rowspan="2">Actions</th>
                        </tr>
                        <tr>
                            <th>Foto Team</th>
                            <th>Booking Via</th>
                            <th>Video Team</th>
                            <th>Booking Via</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        @foreach ($items as $item)
                        @php
                            // Ambil tanggal event
                            $tanggalEvent = \Carbon\Carbon::parse($item->tanggal_jpehpotret);
                            $hariIni = \Carbon\Carbon::now();
                        @endphp

                        @if ($tanggalEvent >= $hariIni) <!-- Tampilkan hanya jika tanggal event setelah hari ini -->
                            <tr>
                                <td>{{ $item->nama_jpehpotret }}</td>
                                <td>{{ $item->brand_jpehpotret }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_jpehpotret)->format('d M Y') }}</td>
                                <td>{!! nl2br(e($item->keterangan_jpehpotret)) !!}</td>
                                <td>{{ $item->timfoto->nama_tfoto ?? '' }}</td>
                                <td>{{ $item->bvia_tfoto }}</td>
                                <td>{{ $item->timvideo->nama_tvideo ?? '' }}</td>
                                <td>{{ $item->bvia_tvideo }}</td>
                                <td>{{ $item->cspehpotret->nama_cspehpotret ?? '' }}</td>
                                <td>{{ $item->paketpehpotret->nama_pkpehpotret ?? '' }}</td>
                                <td class="action">
                                    <a href="/jadwalpehpotret/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('jadwalpehpotret.destroy', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection
