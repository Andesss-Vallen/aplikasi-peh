<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Flexbox untuk tata letak penuh halaman */
        html, body {
            height: 100%; /* Pastikan tinggi halaman penuh */
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Area utama untuk konten */
        .content-area {
            flex: 1; /* Isi sisa ruang halaman sebelum footer */
        }

        /* Footer tetap di bawah */
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            width: 100%;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    @include('tataletak.navbar') <!-- Menyertakan navbar -->

    <!-- Full-width content area -->
    <div class="content-area">
        @yield('content') <!-- Bagian konten utama -->
    </div>

    @include('tataletak.footer') <!-- Menyertakan footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
