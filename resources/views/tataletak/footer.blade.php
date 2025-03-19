<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        .footer {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 2px solid #353434;
        }
        .logo img {
            width: 180px;
        }
        .social-links { 
            display: flex;
            gap: 15px;
        }
        .social-links a {
            text-decoration: none;
            color: #353434;
            font-size: 18px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .social-links a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
        
    <footer class="footer">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="PEHPOTRET Logo">
        </div>

        <div class="social-links">
            <a href="https://www.instagram.com/pehpotret" target="_blank">
                <i class="fa-brands fa-instagram"></i> pehpotret
            </a>
            <a href="https://www.instagram.com/pehsociety" target="_blank">
                <i class="fa-brands fa-instagram"></i> pehsociety
            </a>
        </div>
    </footer>

</body>
</html>
