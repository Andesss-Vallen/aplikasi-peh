<!-- resources/views/jadwalpehpotret/edit.blade.php -->

@extends('tataletak.app')

@section('content')
<div class="container">
    <h1>Edit Jadwal Pehpotret</h1>
    <form action="{{ route('jadwalpehpotret.update', $jadwalpehpotret->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_jpehpotret">Nama</label>
            <input type="text" name="nama_jpehpotret" id="nama_jpehpotret" class="form-control" value="{{ $jadwalpehpotret->nama_jpehpotret }}" required>
        </div>
        <div class="form-group">
            <label for="brand_jpehpotret">Brand</label>
            <input type="text" name="brand_jpehpotret" id="brand_jpehpotret" class="form-control" value="{{ $jadwalpehpotret->brand_jpehpotret }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_jpehpotret">Tanggal</label>
            <input type="date" name="tanggal_jpehpotret" id="tanggal_jpehpotret" class="form-control" value="{{ $jadwalpehpotret->tanggal_jpehpotret }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan_jpehpotret">Keterangan</label>
            <textarea name="keterangan_jpehpotret" id="keterangan_jpehpotret" class="form-control">{{ $jadwalpehpotret->keterangan_jpehpotret }}</textarea>
        </div>
        <div class="form-group">
            <label for="id_tfoto">Foto Team</label>
            <select name="id_tfoto" id="id_tfoto" class="form-control" required>
                @foreach($timfoto as $foto)
                    <option value="{{ $foto->id }}" {{ $jadwalpehpotret->id == $foto->id ? 'selected' : '' }}>{{ $foto->nama_tfoto }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_tvideo">Video Team</label>
            <select name="id_tvideo" id="id_tvideo" class="form-control" required>
                @foreach($timvideo as $video)
                    <option value="{{ $video->id }}" {{ $jadwalpehpotret->id == $video->id ? 'selected' : '' }}>{{ $video->nama_tvideo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_cspehpotret">Customer Service</label>
            <select name="id_cspehpotret" id="id_cspehpotret" class="form-control" required>
                @foreach($cspehpotret as $cs)
                    <option value="{{ $cs->id }}" {{ $jadwalpehpotret->id == $cs->id ? 'selected' : '' }}>{{ $cs->nama_cspehpotret }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_pkpehpotret">Paket</label>
            <select name="id_pkpehpotret" id="id_pkpehpotret" class="form-control" required>
                @foreach($paketpehpotret as $paket)
                    <option value="{{ $paket->id }}" {{ $jadwalpehpotret->id == $paket->id ? 'selected' : '' }}>{{ $paket->nama_pkpehpotret }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
