@extends('tataletak.app')

@section('content')
    <div class="container">
        <h1>Tambah Cs Pehpotret</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/cspehpotret" method="POST">
            @csrf

            <div class="row mb-3">
                <label for="nama_cspehpotret" class="col-sm-2 col-form-label">Nama Cs Pehpotret</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_cspehpotret" name="nama_cspehpotret"
                        value="{{ old('nama_cspehpotret') }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}"
                        required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/cspehpotret" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
