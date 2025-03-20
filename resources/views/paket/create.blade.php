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
        <h2>Tambah Data Paket</h2>
        <form action="{{ route('paket.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('paket.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection