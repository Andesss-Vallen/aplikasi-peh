@extends('tataletak.app')

@section('content')
<div class="container">
    <h1>Create New Info</h1>
    <form action="{{ route('info.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="rundown">Rundown</label>
            <input type="text" name="rundown" id="rundown" class="form-control" value="{{ old('rundown') }}">
        </div>

        <div class="form-group">
            <label for="nama_album">Nama Album</label>
            <input type="text" name="nama_album" id="nama_album" class="form-control" value="{{ old('nama_album') }}">
        </div>

        <div class="form-group">
            <label for="medsos_pengantin">Medsos Pengantin</label>
            <input type="text" name="medsos_pengantin" id="medsos_pengantin" class="form-control" value="{{ old('medsos_pengantin') }}">
        </div>

        <div class="form-group">
            <label for="ready_lokasi">Ready Lokasi</label>
            <input type="text" name="ready_lokasi" id="ready_lokasi" class="form-control" value="{{ old('ready_lokasi') }}">
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_jpehpotret">Jadwal Pehpotret</label>
            <select name="id_jpehpotret" class="form-select" id="id_jpehpotret">
                <option value="">Pilih Jadwal Pehpotret</option>
                @foreach($jadwalpehpotret as $jpeh)
                    <option value="{{ $jpeh->id }}" {{ old('id_jpehpotret') == $jpeh->id ? 'selected' : '' }}>
                        {{ $jpeh->nama_jpehpotret }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
@endsection