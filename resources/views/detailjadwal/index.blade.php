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

    @media (max-width: 768px) {
        .header-container {
            flex-direction: column;
            align-items: center;
        }

        .btn-create {
            position: relative;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            text-align: center;
            transform: none;
            top: auto;
        }
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
</style>
<div class="header-container">
    <div class="judul">Detail Jadwal</div>
    <a href="{{ route('detailjadwal.create') }}" class="btn btn-create shadow-sm">
        <i class="fas fa-plus"></i> Tambah Data
    </a>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Paket</th>
                    <th>Rundown</th>
                    <th>Album</th>
                    <th>Medsos</th>
                    <th>Foto</th>
                    <th>Video</th>
                    <th>Pakaian</th>
                    <th>Jam Ready Lokasi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dj as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jadwal->client }}</td>
                    <td>{{ $item->jadwal->paket->nama }}</td>
                    <td>
                        @if ($item->rundown_pdf)
                        <a href="{{ asset('storage/' . $item->rundown_pdf) }}" target="_blank">Lihat PDF</a>
                        </a>
                        @elseif ($item->rundown_text)
                        <!-- Jika teks tersedia, tampilkan teks -->
                        {{ $item->rundown_text }}
                        @else
                        Tidak ada rundown tersedia
                        @endif
                    </td>
                    <td>{{ $item->album }}</td>
                    <td>{{ $item->medsos }}</td>
                    <td>
                        @if ($item->jadwal->timFoto->count() > 0)
                        {{ implode(', ', $item->jadwal->timFoto->pluck('nama')->toArray()) }}
                        @else
                        <span class="text-muted">-</span>
                        @endif
                    </td>

                    <!-- Menampilkan Tim Video (Many-to-Many) -->
                    <td>
                        @if ($item->jadwal->timVideo->count() > 0)
                        {{ implode(', ', $item->jadwal->timVideo->pluck('nama')->toArray()) }}
                        @else
                        <span class="text-muted">-</span>
                        @endif
                                   
                    </td>
                    <td>{{ $item->jadwal->pakaian }}</td>
                    <td>{{ $item->jam_ready }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td class="action">
                        <a href="{{ route('detailjadwal.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('detailjadwal.destroy', $item->id) }}" method="post" style="display:inline;"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini beserta file PDF-nya?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection