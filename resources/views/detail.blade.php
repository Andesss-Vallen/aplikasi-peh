<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jadwal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Detail Jadwal</h2>
        <p><strong>Nama:</strong> <span id="nama"></span></p>
        <p><strong>Paket:</strong> <span id="paket"></span></p>
        <a id="back-btn" class="back-btn">Kembali</a>
    </div>

    <script>
        // Ambil parameter dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const nama = urlParams.get('nama');
        const paket = urlParams.get('paket');

        // Tampilkan data di halaman
        document.getElementById("nama").innerText = nama;
        document.getElementById("paket").innerText = paket;

        // Tombol kembali ke halaman sebelumnya
        document.getElementById("back-btn").href = "jadwal";
    </script>

</body>

</html>