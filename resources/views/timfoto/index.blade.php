@extends('tataletak.app')

@section('content')
    <style>
        .table-responsive {
            overflow-x: auto;
            white-space: nowrap;
        }

        .header-container {
            position: relative;
            text-align: center;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .header-container a:hover {
            background-color: #000000;
            color: #f8f9fa;
        }

        .judul {
            font-size: 25px;
            font-weight: bold;
            color: #8B5E3C;
            margin-bottom: 10px;
        }

        .btn-create {
            background-color: #D4AF37;
            border: none;
            font-weight: bold;
            padding: 8px 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 10px;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .btn-create:hover {
            background-color: #B8860B;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                align-items: center;
            }

            .btn-create {
                position: relative;
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
                text-align: center;
                transform: none;
                top: auto;
            }
        }

        .action {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #867554;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
    <div class="header-container">
        <div class="judul">Tim Foto</div>
        <a href="{{ route('timfoto.create') }}" class="btn btn-create shadow-sm">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-bordered">
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
                    @foreach ($tf as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nomor_hp }}</td>
                            <td>
                                @if ($item->status == 0)
                                    Training
                                @else
                                    Tetap
                                @endif
                            </td>
                            <td class="action">
                                <a href="{{ route('timfoto.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('timfoto.destroy', $item->id) }}" method="post"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection