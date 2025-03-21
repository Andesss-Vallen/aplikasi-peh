@extends('tataletak.app')

@section('content')
<div class="container">
    <h2>Detail Jadwal</h2>

    <p><strong>Nama Client:</strong> {{ $info->jadwalpehpotret->nama_jpehpotret ?? '-' }}</p>
    <p><strong>Kategori Paket:</strong> {{ $info->jadwalpehpotret->paketpehpotret->nama_pkpehpotret ?? '-' }}</p>

    <p><strong>Rundown:</strong>
        @if ($info->rundown_pdf)
        <!-- Jika PDF tersedia, tampilkan sebagai link -->
        <a href="{{ asset('storage/' . $info->rundown_pdf) }}" target="_blank">Lihat PDF</a>
        </a>

        @elseif ($info->rundown_text)
        <!-- Jika teks tersedia, tampilkan teks -->
        {{ $info->rundown_text }}
        @else
        Tidak ada rundown tersedia
        @endif
    </p>

    <p><strong>Nama Album:</strong> {{ $info->nama_album }}</p>
    <p><strong>Medsos Pengantin:</strong> {{ $info->medsos_pengantin }}</p>
    <p><strong>Lokasi:</strong> {{ $info->ready_lokasi }}</p>
    <p><strong>Keterangan:</strong> {!! nl2br(e($info->keterangan)) !!}</p>
    <p><strong>Tim Video:</strong> {{ $info->jadwalpehpotret->timvideo->nama_tvideo ?? '-' }}</p>
    <p><strong>Tim Foto:</strong> {{ $info->jadwalpehpotret->timfoto->nama_tfoto ?? '-' }}</p>

    <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
</div>

@endsection