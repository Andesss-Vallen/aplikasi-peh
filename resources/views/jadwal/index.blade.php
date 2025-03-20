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

        .sort-btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .sort-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .sort-btn:hover {
            background-color: #45a049;
        }

        .sort-btn:active {
            background-color: #388e3c;
        }

        .sort-btn:focus {
            outline: none;
        }
    </style>

    <div class="header-container">
        <div class="judul">Jadwal</div>
        <a href="{{ route('jadwal.create') }}" class="btn btn-create shadow-sm">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
        <!-- Tombol Pengurutan -->
        <div class="sort-btn-container">
            <button class="sort-btn" id="sortAsc">Urutkan Tanggal Ascending</button>
            <button class="sort-btn" id="sortDesc">Urutkan Tanggal Descending</button>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table id="jadwalTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Client</th>
                        <th>Brand</th>
                        <th>Tanggal</th>
                        <th>Bvia Foto</th>
                        <th>Bvia Video</th>
                        <th>Keterangan</th>
                        <th>Pakaian</th>
                        <th>CS</th>
                        <th>Tim Foto</th>
                        <th>Tim Video</th>
                        <th>Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($j as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->client }}</td>
                            <td>{{ $item->brand }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->bvia_foto }}</td>
                            <td>{{ $item->bvia_video }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->pakaian }}</td>
                            <td>{{ $item->customerService->nama }}</td>
                            <td>{{ $item->timFoto->nama }}</td>
                            <td>{{ $item->timVideo->nama }}</td>
                            <td>{{ $item->paket->nama }}</td>
                            <td class="action">
                                <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('jadwal.destroy', $item->id) }}" method="post"
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('jadwalTable');
            const rows = Array.from(table.rows).slice(1); // Ambil semua baris kecuali header

            // Fungsi untuk mengurutkan tabel berdasarkan kolom tanggal
            function sortTable(order) {
                rows.sort((a, b) => {
                    const dateA = new Date(a.cells[3].innerText); // Kolom tanggal ada di indeks ke-3
                    const dateB = new Date(b.cells[3].innerText);
                    return order === 'asc' ? dateA - dateB : dateB - dateA; // Urutkan berdasarkan urutan yang diberikan
                });

                // Menyusun ulang baris di tabel
                rows.forEach(row => table.appendChild(row));
            }

            // Tombol untuk pengurutan Ascending
            document.getElementById('sortAsc').addEventListener('click', function() {
                sortTable('asc');
            });

            // Tombol untuk pengurutan Descending
            document.getElementById('sortDesc').addEventListener('click', function() {
                sortTable('desc');
            });

            // ya
        });
    </script>
@endsection
