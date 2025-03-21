@extends('tataletak.app')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    h2 {
        color: #333;
    }

    .back-btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: #333;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .card {
        background: #867554;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        cursor: pointer;
        text-align: left;
        color: white;
        position: relative;
    }

    .card h5,
    .card p {
        margin: 5px 0;
    }

    .btn-detail {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        padding: 5px 10px;
        background: #FFD700;
        color: black;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        cursor: pointer;
        border: none;
    }

    .modal-content {
        text-align: left;
        padding: 20px;
    }
</style>

<div class="container">
    <h2>Jadwal Job Pehpotret</h2>
    <p id="tanggal"></p>
    <div id="card-container">
        @php
        // Ambil parameter dari URL
        $date = request()->query('date');
        $month = request()->query('month');
        $year = request()->query('year');

        // Pastikan semua parameter tersedia
        if ($date && $month !== null && $year) {
        // Format tanggal sesuai database (YYYY-MM-DD)
        $tanggalDipilih = sprintf('%04d-%02d-%02d', $year, $month + 1, $date);

        // Filter data berdasarkan tanggal jpehpotret
        $filteredInfo = $j->filter(function ($item) use ($tanggalDipilih) {
        return date('Y-m-d', strtotime($item->jadwal->tanggal ?? '')) === $tanggalDipilih;
        });
        } else {
        $filteredInfo = collect(); // Kosongkan jika tidak ada tanggal yang dipilih
        }
        @endphp

        @if ($filteredInfo->count() > 0)
        @foreach ($filteredInfo as $index => $item)
        <div class="card">
            <h5>Nama Client: {{ $item->jadwal->nama ?? '-' }}</h5>
            <p>Paket: {{ $item->jadwal->paket->nama ?? '-' }}</p>
            <a href="{{ route('utama.detail', $item->id) }}" class="btn-detail">Detail</a>
        </div>

        @endforeach
        @else
        <p style="color: red; font-weight: bold;">Tidak ada jadwal di tanggal tersebut.</p>
        @endif
    </div>
    <a id="back-btn" class="back-btn">Kembali ke Kalender</a>
</div>

<script>
    // Ambil parameter dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const date = urlParams.get('date');
    const month = urlParams.get('month');
    const year = urlParams.get('year');

    // Nama bulan dalam array
    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    // Tampilkan tanggal yang dipilih
    if (date && month && year) {
        document.getElementById("tanggal").innerText = `Tanggal : ${date} ${months[month]} ${year}`;
    } else {
        document.getElementById("tanggal").innerText = "Tanggal tidak valid.";
    }

    // Ambil elemen tombol kembali
    const backBtn = document.getElementById("back-btn");
    backBtn.href = "/utama";
</script>
@endsection