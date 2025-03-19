<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Jadwal</title>
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
        }

        /* Styling untuk kartu individual */
        .card {
            background: #e0e0e0;
            /* Warna abu-abu */
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            cursor: pointer;
            text-align: left;
        }

        .card h5 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .card p {
            margin: 5px 0 0;
            color: #555;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Jadwal Job Pehpotret</h2>
        <p id="tanggal"></p>
        <div id="card-container">
            <!-- Cards will be dynamically inserted here -->
        </div>
        <a id="back-btn" class="back-btn">Kembali ke Kalender</a>
    </div>

    <script>
        // Ambil parameter dari URL
        const urlParams = new URLSearchParams(window.location.search);
        const date = urlParams.get('date');
        const month = urlParams.get('month');
        const year = urlParams.get('year');

        // Nama bulan dalam array
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        // Tampilkan tanggal yang dipilih
        document.getElementById("tanggal").innerText = Tanggal : ${date} ${months[month]} ${year};

        // Data Dummy - Bisa Diganti dengan Data dari Database
        const data = [{
                nama: "Anggi Gedung Wanita Nganjuk",
                paket: "Extra Day - Resepsi",
                link: "detail.html?id=1"
            },
            {
                nama: "Anggi Gedung Wanita Nganjuk",
                paket: "Extra Day - Resepsi",
                link: "detail.html?id=2"
            },
            {
                nama: "Anggi Gedung Wanita Nganjuk",
                paket: "Extra Day - Resepsi",
                link: "detail.html?id=3"
            },
            {
                nama: "Anggi Gedung Wanita Nganjuk",
                paket: "Extra Day - Resepsi",
                link: "detail.html?id=4"
            },
            {
                nama: "Anggi Gedung Wanita Nganjuk",
                paket: "Extra Day - Resepsi",
                link: "detail.html?id=5"
            },
            {
                nama: "Anggi Gedung Wanita Nganjuk",
                paket: "Extra Day - Resepsi",
                link: "detail.html?id=6"
            }
        ];

        const container = document.getElementById('card-container');

        data.forEach(item => {
            const card = document.createElement('div');
            card.classList.add('card');

            // Saat diklik, arahkan ke halaman detail dengan parameter
            card.onclick = () => {
                const url = detail?nama=${encodeURIComponent(item.nama)}&paket=${encodeURIComponent(item.paket)};
                window.location.href = url;
            };

            card.innerHTML = `
            <h5>NAMA : ${item.nama}</h5>
            <p>PAKET : ${item.paket}</p>
            `;

            container.appendChild(card);
        });


        // Simulasi role pengguna (bisa diganti dengan data dari backend)
        const userRole = "admin"; // Ubah ke "freelance" untuk freelancer

        // Ambil elemen tombol kembali
        const backBtn = document.getElementById("back-btn");

        // Ubah href berdasarkan peran pengguna
        if (userRole === "admin") {
            backBtn.href = "/admin";
        } else if (userRole === "freelance") {
            backBtn.href = "/freelance";
        } else if (userRole === "superuser") {
            backBtn.href = "/superuser";
        }
    </script>

</body>

</html>