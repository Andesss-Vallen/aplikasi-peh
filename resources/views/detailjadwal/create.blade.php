@extends('tataletak.app')

@section('content')
<style>
    .card {
        background: #867554;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
</style>
<div class="card">
    <h2>Tambah Data Detail Jadwal</h2>
    <form action="{{ route('detailjadwal.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_jadwal">Nama Client</label>
            <select class="form-control" id="id_jadwal" name="id_jadwal">
                @foreach ($jadwal as $item)
                <option value="{{ $item->id }}">{{ $item->client }} - {{ $item->tanggal }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="rundown_text" class="form-label">Rundown (Manual)</label>
            <textarea class="form-control" id="rundown_text" name="rundown_text" rows="3">{{ old('rundown_text') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="rundown_pdf" class="form-label">Upload Rundown (PDF) Max. 2MB</label>
            <input type="file" class="form-control" id="rundown_pdf" name="rundown_pdf" accept=".pdf">
        </div>

        @if (!empty($info->rundown_pdf))
        <p>File saat ini: <a href="{{ asset('rundown/' . $info->rundown_pdf) }}" target="_blank">Lihat PDF</a>
            @endif

        <div class="form-group">
            <label for="album">Album</label>
            <input type="text" class="form-control" id="album" name="album">
        </div>

        <div class="form-group">
            <label for="medsos">Medsos</label>
            <input type="text" class="form-control" id="medsos" name="medsos">
        </div>

        <div class="form-group">
            <label for="jam_ready">Jam Ready</label>
            <input type="time" class="form-control" id="jam_ready" name="jam_ready">
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('detailjadwal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection