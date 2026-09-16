<?php
date_default_timezone_set('Asia/Jakarta');

$serverTime = date('d-m-Y H:i:s');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Server Time - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        header {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            padding: 25px 8%;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            min-height: 75vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .card {
            background: white;
            padding: 45px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
        }

        .card h1 {
            color: #1d4ed8;
            margin-bottom: 20px;
        }

        .time {
            font-size: 38px;
            font-weight: bold;
            color: #111827;
            margin: 25px 0;
        }

        .description {
            color: #64748b;
        }

        footer {
            background: #111827;
            color: white;
            text-align: center;
            padding: 25px;
        }

        @media (max-width: 600px) {
            .time {
                font-size: 28px;
            }

            nav {
                flex-direction: column;
                gap: 15px;
            }

            nav a {
                margin: 0 8px;
            }
        }
    </style>
</head>

<body>

<header>
    <nav>
        <div class="logo">KursusKu</div>

        <div>
            <a href="index.php">Katalog</a>
            <a href="fee-calculator.php">Kalkulator</a>
            <a href="server-time.php">Server Time</a>
        </div>
    </nav>
</header>

<div class="container">

    <div class="card">

        <h1>Waktu Server</h1>

        <p class="description">
            Waktu berikut diambil langsung dari server PHP.
        </p>

        <div class="time">
            <?= $serverTime; ?>
        </div>

        <p class="description">
            Zona waktu: Asia/Jakarta (WIB)
        </p>

    </div>

</div>

<footer>
    <p>&copy; <?= date('Y'); ?> KursusKu</p>
</footer>

</body>
</html>
