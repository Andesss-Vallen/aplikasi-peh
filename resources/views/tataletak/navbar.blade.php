<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            border-bottom: 2px solid #353434;
            display: flex;
            margin-top: 15px;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 10px 0;
            position: relative;
            z-index: 1100;
        }

        .navbar .container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 100%;
            max-width: 1200px;
            padding: 0 20px;
            margin-bottom: 15px;
        }

        .navbar .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        .navbar .logo img {
            max-width: 160px;
        }

        .icon {
            position: absolute;
            right: 20px;
            font-size: 30px;
            cursor: pointer;
            color: #353434;
            display: flex;
            align-items: center;
            z-index: 1200;
        }

        .menu {
            display: none;
            position: absolute;
            top: 50px;
            /* Lebih dekat ke tombol */
            right: 20px;
            background: white;
            border: 1px solid #ddd;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 180px;
            flex-direction: column;
            padding: 10px;
            border-radius: 8px;
            z-index: 1200;
        }

        .menu a {
            padding: 8px;
            text-align: center;
            text-decoration: none;
            color: #353434;
            display: block;
        }

        .menu a:hover {
            background-color: #353434;
            color: #ffffff;
            border-radius: 5px;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .icon {
                font-size: 26px;
                right: 10px;
            }

            .navbar .logo img {
                max-width: 140px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <a href="/utama">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo">
                </a>
            </div>
            @if (auth()->user()->hasRole('superuser') || auth()->user()->hasRole('admin'))
            <div class="icon" onclick="toggleMenu(event)">
                <span class="material-symbols-outlined">menu</span>
            </div>
            <div class="menu" id="menu">
                @if (auth()->user()->hasRole('superuser'))
                <a href="/timfoto">Tim Foto</a>
                <a href="/timvideo">Tim Video</a>
                <a href="/customerservice">Tim CS</a>
                <a href="/paket">Paket</a>
                <a href="/detailjadwal">Info Jadwal</a>
                <a href="/jadwal">Jadwal Job</a>
                @endif
            </div>
            @endif
        </div>
    </nav>

    <script>
        function toggleMenu(event) {
            event.stopPropagation(); // Mencegah event dari bubbling ke window
            const menu = document.getElementById('menu');
            menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
        }

        // Tutup menu jika klik di luar menu
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('menu');
            const icon = document.querySelector('.icon');

            if (!menu.contains(event.target) && !icon.contains(event.target)) {
                menu.style.display = 'none';
            }
        });
    </script>
</body>

</html>