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
            flex-direction: column;
        }

        .header-container a:hover {
            background-color: #000000;
            color: #f8f9fa;
        }

        .judul {
            font-size: 25px;
            font-weight: bold;
            color: #8B5E3C;
            display: inline-block;
            margin-bottom: 10px;
        }

        .btn-create {
            background-color: #D4AF37;
            border: none;
            font-weight: bold;
            padding: 8px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 10px;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .btn-create:hover {
            background-color: #B8860B;
        }

        .action {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #867554;
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

        .table thead th {
            font-weight: bold;
            color: #495057;
        }

        .table tbody td {
            color: #495057;
        }

        .month-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .month-container span {
            font-size: 24px;
            font-weight: bold;
            color: #8B5E3C;
            margin-left: 10px;
        }
    </style>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <h3>Makes your moment <br> looks epic.</h3>
                <img src="{{ asset('img/img2.jpg') }}" alt="Couple Holding Hands" class="img-fluid">
                <p>Every detail, tears, and moment is more precious than any jewelry in the world.</p>
            </div>

            <div class="col-md-4 text-center">
                <img src="{{ asset('img/img1.jpg') }}" alt="Bride and Groom" class="img-fluid">
            </div>

            <div class="col-md-4">
                <h3>Hello, We are pehpotret.</h3>
                <img src="{{ asset('img/img3.jpg') }}" alt="Wedding Rings" class="img-fluid">
                <p>Their moment is more precious than any jewelry in the world.</p>
            </div>
        </div>
    </div>

    <div class="header-container">
        <div class="judul">Info Jadwal</div>
        @if (auth()->user()->hasRole('superuser') || auth()->user()->hasRole('admin'))
        <a href="{{ route('info.create') }}" class="btn btn-create shadow-sm">
            <i class="fas fa-plus"></i> Create New Info
        </a>
        @endif
    </div>

    <div class="card">
        <div class="table-responsive">
            <!-- Mengurutkan data berdasarkan tanggal dengan sortBy -->
            <table class="table table-bordered table-hover">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>No</th>
                        <th>Rundown</th>
                        <th>Nama Album</th>
                        <th>Medsos Pengantin</th>
                        <th>Ready Lokasi</th>
                        <th>Keterangan</th>
                        <th>Nama JPEHPOTRET</th>
                        <th>Tanggal JPEHPOTRET</th>
                        <th>TVIDEO</th>
                        <th>TFOTO</th>
                        <th>PKPEHPOTRET</th>
                        @if (auth()->user()->hasRole('superuser') || auth()->user()->hasRole('admin'))
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="table-light">
                    <!-- Urutkan info berdasarkan tanggal jpehpotret yang paling terdekat -->
                    @foreach ($info->sortBy(function($item) {
                        return $item->jadwalpehpotret->tanggal_jpehpotret;
                    }) as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->rundown }}</td>
                            <td>{{ $item->nama_album }}</td>
                            <td>{{ $item->medsos_pengantin }}</td>
                            <td>{{ $item->ready_lokasi }}</td>
                            <td>{!! nl2br(e($item->keterangan)) !!}</td>
                            <td>{{ $item->jadwalpehpotret->nama_jpehpotret ?? '' }}</td>
                            <td>
                                @if ($item->jadwalPehpotret)
                                    {{ date('d-m-Y', strtotime($item->jadwalPehpotret->tanggal_jpehpotret)) }}
                                @else
                                    Tidak ada tanggal
                                @endif
                            </td>
                            <td>{{ $item->jadwalPehpotret->timvideo->nama_tvideo ?? '' }}</td>
                            <td>{{ $item->jadwalPehpotret->timfoto->nama_tfoto ?? '' }}</td>
                            <td>{{ $item->jadwalPehpotret->paketpehpotret->nama_pkpehpotret ?? '' }}</td>
                            @if (auth()->user()->hasRole('superuser') || auth()->user()->hasRole('admin'))
                            <td class="action">
                                <a href="{{ route('info.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('info.destroy', $item->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
