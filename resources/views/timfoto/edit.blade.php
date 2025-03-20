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
        <h2>Edit Data Tim Foto</h2>
        <form action="{{ route('timfoto.update', $tf->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $tf->nama }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_hp">Nomor HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ $tf->nomor_hp }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="0" {{ $tf->status == 0 ? 'selected' : '' }}>Training</option>
                    <option value="1" {{ $tf->status == 1 ? 'selected' : '' }}>Tetap</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('timfoto.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection