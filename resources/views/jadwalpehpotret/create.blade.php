@extends('tataletak.app')

@section('content')
<div class="container">
    <h1>Create New Jadwal Pehpotret</h1>
    <form action="{{ route('jadwalpehpotret.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_jpehpotret">Nama</label>
            <input type="text" name="nama_jpehpotret" id="nama_jpehpotret" class="form-control" value="{{ old('nama_jpehpotret') }}">
        </div>

        <div class="form-group">
            <label for="brand_jpehpotret">Brand</label>
            <input type="text" name="brand_jpehpotret" id="brand_jpehpotret" class="form-control" value="{{ old('brand_jpehpotret') }}">
        </div>

        <div class="form-group">
            <label for="tanggal_jpehpotret">Tanggal</label>
            <input type="date" name="tanggal_jpehpotret" id="tanggal_jpehpotret" class="form-control" value="{{ old('tanggal_jpehpotret') }}">
        </div>

        <div class="form-group">
            <label for="keterangan_jpehpotret">Keterangan</label>
            <textarea name="keterangan_jpehpotret" id="keterangan_jpehpotret" class="form-control">{{ old('keterangan_jpehpotret') }}</textarea>
        </div>

        <!-- Foto Team Dropdown -->
        <div class="form-group">
            <label for="id_tfoto">Foto Team</label>
            <select name="id_tfoto" class="form-select" id="id_tfoto">
                <option value="">Pilih Foto Team</option>
                @foreach($timfotos as $foto)
                    <option value="{{ $foto->id }}" {{ old('id_tfoto') == $foto->id ? 'selected' : '' }}>
                        {{ $foto->nama_tfoto }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Video Team Dropdown -->
        <div class="form-group">
            <label for="id_tvideo">Video Team</label>
            <select name="id_tvideo" class="form-select" id="id_tvideo">
                <option value="">Pilih Video Team</option>
                @foreach($timvideos as $video)
                    <option value="{{ $video->id }}" {{ old('id_tvideo') == $video->id ? 'selected' : '' }}>
                        {{ $video->nama_tvideo }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Customer Service Dropdown -->
        <div class="form-group">
            <label for="id_cspehpotret">Customer Service</label>
            <select name="id_cspehpotret" class="form-select" id="id_cspehpotret">
                <option value="">Pilih Customer Service</option>
                @foreach($cspehpotrets as $cs)
                    <option value="{{ $cs->id }}" {{ old('id_cspehpotret') == $cs->id ? 'selected' : '' }}>
                        {{ $cs->nama_cspehpotret }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Paket Dropdown -->
        <div class="form-group">
            <label for="id_pkpehpotret">Paket</label>
            <select name="id_pkpehpotret" class="form-select" id="id_pkpehpotret">
                <option value="">Pilih Paket</option>
                @foreach($paketpehpotrets as $paket)
                    <option value="{{ $paket->id }}" {{ old('id_pkpehpotret') == $paket->id ? 'selected' : '' }}>
                        {{ $paket->nama_pkpehpotret }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
    <br>
</div>
@endsection
