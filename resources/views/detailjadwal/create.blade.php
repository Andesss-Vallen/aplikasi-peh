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
        <form action="{{ route('detailjadwal.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id_jadwal">Nama Client</label>
                <select class="form-control" id="id_jadwal" name="id_jadwal">
                    @foreach ($jadwal as $item)
                        <option value="{{ $item->id }}">{{ $item->client }} - {{ $item->tanggal }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="rundown">Rundown</label>
                <input type="text" class="form-control" id="rundown" name="rundown">
            </div>
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
