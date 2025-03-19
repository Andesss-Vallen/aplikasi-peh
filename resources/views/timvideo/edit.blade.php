<!-- resources/views/timvideo/edit.blade.php -->

@extends('tataletak.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Ubah Tim Video</h1>
    <form action="{{ route('timvideo.update', $timvideo->id) }}" method="POST">
        @method('PUT')
        @csrf

        <!-- Nama Video -->
        <div class="row mb-3">
            <label for="nama_tvideo" class="col-sm-2 col-form-label">Nama Video</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_tvideo" name="nama_tvideo" value="{{ old('nama_tvideo', $timvideo->nama_tvideo) }}" >
            </div>
        </div>

        <!-- Nama Video -->
        <div class="row mb-3">
            <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $timvideo->nama_tvideo) }}" >
            </div>
        </div>

        <!-- Status Video -->
        <div class="row mb-3">
            <label for="status_tvideo" class="col-sm-2 col-form-label">Status Video</label>
            <div class="col-sm-10">
                <select name="status_tvideo" class="form-select" id="status_tvideo" >
                    <option value="1" {{ old('status_tvideo', $timvideo->status_tvideo) == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status_tvideo', $timvideo->status_tvideo) == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('timvideo.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
