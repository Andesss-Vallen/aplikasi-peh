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
            /* Menyusun ulang menjadi kolom pada mobile */
        }

        .header-container a:hover {
            background-color: #000000;
            color: #f8f9fa;
        }

        .judul {
            font-size: 25px;
            font-weight: bold;
            color: #8B5E3C;
            /* Warna Gold */
            margin-bottom: 10px;
        }

        .btn-create {
            background-color: #D4AF37;
            /* Gold */
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
            /* Tombol di posisikan di kanan */
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .btn-create:hover {
            background-color: #B8860B;
            /* Gold lebih gelap */
        }

        /* Media query untuk tampilan mobile */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                /* Menyusun ulang menjadi kolom pada mobile */
                align-items: center;
                /* Menjaga semuanya tetap terpusat */
            }

            .btn-create {
                position: relative;
                display: block;
                /* Tombol menjadi block-level */
                margin-left: auto;
                margin-right: auto;
                width: 50%;
                /* Tombol tidak terlalu lebar */
                text-align: center;
                /* Menjaga tombol tetap di tengah */
                transform: none;
                /* Menghapus transformasi translate */
                top: auto;
                /* Menghapus posisi top agar tombol tidak ikut berubah */
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
            /* Warna cream elegan */
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
    <div class="header-container">
        <div class="judul">CS Pehpotret</div>
        <a href="cspehpotret/create" class="btn btn-create shadow-sm">
            <i class="fas fa-plus"></i> Tambah CS
        </a>

    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Cs Pehpotret</th>
                        <th>Nomor HP</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cspehpotret as $cs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cs->nama_cspehpotret }}</td>
                            <td>{{ $cs->nomor_hp }}</td>
                            <td class="action">
                                <a href="/cspehpotret/{{ $cs['id'] }}/edit" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="/cspehpotret/{{ $cs['id'] }}" method="POST" style="display:inline;">
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
