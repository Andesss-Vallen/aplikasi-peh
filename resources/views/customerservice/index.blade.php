@extends('tataletak.app')

@section('title', 'Customer Service')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Customer Service</h2>
                <a href="{{ route('customerservice.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cs as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nomor_hp }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('customerservice.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('customerservice.destroy', $item->id) }}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection