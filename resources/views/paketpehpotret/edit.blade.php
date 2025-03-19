@extends('tataletak.app')

@section('content')
    <div class="container">
        <h1>Ubah Paket Pemotretan</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('paketpehpotret.update', $paket->id) }}" method="POST">
            @method('PUT')
            @csrf
            
            <!-- Input Nama Paket -->
            <div class="row mb-3">
                <label for="nama_pkpehpotret" class="col-sm-2 col-form-label">Nama Paket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pkpehpotret" name="nama_pkpehpotret" value="{{ old('nama_pkpehpotret', $paket->nama_pkpehpotret) }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('paketpehpotret.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
