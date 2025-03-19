@extends('tataletak.app')

@section('content')
    <div class="container">
        <h1>Ubah Tim Foto</h1>
        <h4>Form untuk mengubah informasi Tim Foto</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('timfoto.update', $timfoto->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="row mb-3">
                <label for="nama_tfoto" class="col-sm-2 col-form-label">Nama Tim Foto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_tfoto" name="nama_tfoto"
                        value="{{ old('nama_tfoto', $timfoto->nama_tfoto) }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp"
                        value="{{ old('nomor_hp', $timfoto->nama_tfoto) }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="status_tfoto" class="col-sm-2 col-form-label">Status Tim Foto</label>
                <div class="col-sm-10">
                    <select name="status_tfoto" class="form-select" id="status_tfoto" required>
                        <option value="1" {{ old('status_tfoto', $timfoto->status_tfoto) == '1' ? 'selected' : '' }}>
                            Active</option>
                        <option value="0" {{ old('status_tfoto', $timfoto->status_tfoto) == '0' ? 'selected' : '' }}>
                            Inactive</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('timfoto.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
