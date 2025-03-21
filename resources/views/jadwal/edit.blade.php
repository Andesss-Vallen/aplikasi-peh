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
        <h2>Edit Data Jadwal</h2>
        <form action="{{ route('jadwal.update', $j->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" class="form-control" id="client" name="client" value="{{ $j->client }}" >
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $j->brand }}"
                    >
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $j->tanggal }}"
                    >
            </div>
            <div class="form-group">
                <label for="bvia_foto">Bvia Foto</label>
                <input type="text" class="form-control" id="bvia_foto" name="bvia_foto" value="{{ $j->bvia_foto }}"
                    >
            </div>
            <div class="form-group">
                <label for="bvia_video">Bvia Video</label>
                <input type="text" class="form-control" id="bvia_video" name="bvia_video" value="{{ $j->bvia_video }}"
                    >
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $j->keterangan }}"
                    >
            </div>
            <div class="form-group">
                <label for="pakaian">Pakaian</label>
                <input type="text" class="form-control" id="pakaian" name="pakaian" value="{{ $j->pakaian }}"
                    >
            </div>
            <div class="form-group">
                <label for="id_cs">CS</label>
                <select class="form-control" id="id_cs" name="id_cs" >
                    @foreach ($cs as $item)
                        <option value="{{ $item->id }}" {{ $j->id_cs == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_tfoto">Tim Foto</label>
                <select class="form-control" id="id_tfoto" name="id_tfoto[]" multiple >
                    @foreach ($tf as $item)
                        <option value="{{ $item->id }}"
                            {{ isset($j->id_tfoto) && is_iterable($j->id_tfoto) && collect($j->id_tfoto)->pluck('id')->contains($item->id) ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_tvideo">Tim Video</label>
                <select class="form-control" id="id_tvideo" name="id_tvideo[]" multiple >
                    @foreach ($tv as $item)
                        <option value="{{ $item->id }}"
                            {{ isset($j->id_tvideo) && is_iterable($j->id_tvideo) && collect($j->id_tvideo)->pluck('id')->contains($item->id) ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_paket">Paket</label>
                <select class="form-control" id="id_paket" name="id_paket" >
                    @foreach ($p as $item)
                        <option value="{{ $item->id }}" {{ $j->id_paket == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
