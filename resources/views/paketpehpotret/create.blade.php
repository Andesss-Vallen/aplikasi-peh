@extends('tataletak.app')

@section('content')
    <div class="container">
        <h1>Tambah Paket Pemotretan</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('paketpehpotret.store') }}" method="POST">
            @csrf

            <!-- Input Nama Paket -->
            <div class="row mb-3">
                <label for="namapkpehpotret" class="col-sm-2 col-form-label">Nama Paket</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namapkpehpotret" name="namapkpehpotret" value="{{ old('namapkpehpotret') }}" required>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('paketpehpotret.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
