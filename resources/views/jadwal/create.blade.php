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
        <h2>Tambah Data Jadwal</h2>
        <form action="{{ route('jadwal.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" class="form-control" id="client" name="client" >
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" >
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" >
            </div>
            <div class="form-group">
                <label for="bvia_foto">Bvia Foto</label>
                <input type="text" class="form-control" id="bvia_foto" name="bvia_foto" >
            </div>
            <div class="form-group">
                <label for="bvia_video">Bvia Video</label>
                <input type="text" class="form-control" id="bvia_video" name="bvia_video" >
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" >
            </div>
            <div class="form-group">
                <label for="pakaian">Pakaian</label>
                <input type="text" class="form-control" id="pakaian" name="pakaian" >
            </div>
            <div class="form-group">
                <label for="id_cs">CS</label>
                <select class="form-control" id="id_cs" name="id_cs" >
                    @foreach ($cs as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_tfoto">Tim Foto</label>
                <select class="form-control" multiple id="id_tfoto" name="id_tfoto" >
                    @foreach ($tf as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_tvideo">Tim Video</label>
                <select class="form-control" multiple id="id_tvideo" name="id_tvideo" >
                    @foreach ($tv as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_paket">Paket</label>
                <select class="form-control" id="id_paket" name="id_paket" >
                    @foreach ($p as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection