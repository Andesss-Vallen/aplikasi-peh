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
        <h2>Tambah Data Customer Service</h2>
        <form action="{{ route('customerservice.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="nomor_hp">Nomor HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="0">Training</option>
                    <option value="1">Tetap</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('customerservice.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection