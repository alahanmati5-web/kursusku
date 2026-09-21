```php
<?php
date_default_timezone_set('Asia/Jakarta');

$serverTime = date('H:i:s');
$serverDate = date('d F Y');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu | Server Time</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #07110d;
            color: #eafff1;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 90%;
            max-width: 1050px;
            margin: auto;
        }

        header {
            background: #020807;
            border-bottom: 1px solid #174d2d;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #39ff88;
            text-shadow: 0 0 12px rgba(57,255,136,.5);
        }

        .logo span,
        footer span {
            color: #eafff1;
        }

        nav {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        nav a {
            color: #91a59a;
            padding: 9px 14px;
            border-radius: 8px;
        }

        nav a:hover,
        nav a.active {
            color: #39ff88;
            background: #0d2116;
        }

        .hero {
            text-align: center;
            padding: 70px 0 40px;
            background:
                linear-gradient(135deg, #020807, #062315, #07110d);
        }

        .terminal {
            display: inline-block;
            font-family: monospace;
            color: #39ff88;
            border: 1px solid #1d6b3c;
            background: #0a1b11;
            padding: 8px 14px;
            border-radius: 30px;
            margin-bottom: 18px;
        }

        h1 {
            font-size: clamp(34px, 5vw, 52px);
            margin-bottom: 12px;
        }

        h1 span {
            color: #39ff88;
            text-shadow: 0 0 18px rgba(57,255,136,.3);
        }

        .hero p {
            color: #91a59a;
        }

        main {
            padding: 20px 0 80px;
        }

        .clock-card {
            max-width: 700px;
            margin: 20px auto 30px;
            padding: 45px 25px;
            text-align: center;
            background: #0a1710;
            border: 1px solid #1e6b3d;
            border-radius: 18px;
            box-shadow: 0 0 40px rgba(57,255,136,.08);
        }

        .clock-label {
            font-family: monospace;
            color: #39ff88;
            margin-bottom: 15px;
        }

        #clock {
            font-family: monospace;
            font-size: clamp(48px, 10vw, 90px);
            font-weight: bold;
            color: #39ff88;
            text-shadow:
                0 0 10px rgba(57,255,136,.5),
                0 0 30px rgba(57,255,136,.25);
            letter-spacing: 4px;
        }

        #date {
            margin-top: 12px;
            color: #9db2a5;
            font-size: 18px;
        }

        .timezone {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 15px;
            border-radius: 20px;
            color: #39ff88;
            background: #0d2b18;
            border: 1px solid #276d42;
            font-family: monospace;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 900px;
            margin: auto;
        }

        .info-card {
            padding: 24px;
            background: #0a1710;
            border: 1px solid #173d27;
            border-radius: 14px;
            text-align: center;
            transition: .3s;
        }

        .info-card:hover {
            border-color: #39ff88;
            transform: translateY(-4px);
            box-shadow: 0 0 20px rgba(57,255,136,.08);
        }

        .info-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .info-card h3 {
            margin-bottom: 7px;
        }

        .info-card p {
            color: #91a59a;
            font-size: 14px;
        }

        .status {
            color: #39ff88 !important;
        }

        footer {
            border-top: 1px solid #173d27;
            background: #020807;
            text-align: center;
            padding: 25px;
            color: #72847a;
        }

        footer span {
            color: #39ff88;
        }

        @media (max-width: 700px) {
            .nav {
                flex-direction: column;
                padding: 12px 0;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            #clock {
                letter-spacing: 1px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="container nav">

        <a href="index.php" class="logo">
            &lt;Kursus<span>Ku/&gt;</span>
        </a>

        <nav>
            <a href="index.php">Katalog</a>
            <a href="fee-calculator.php">Kalkulator</a>
            <a href="server-time.php" class="active">Server Time</a>
        </nav>

    </div>
</header>

<section class="hero">
    <div class="container">

        <div class="terminal">
            $ php server-time.php
        </div>

        <h1>
            Server <span>Time</span>
        </h1>

        <p>
            Menampilkan waktu server KursusKu secara real-time.
        </p>

    </div>
</section>

<main>

    <div class="clock-card">

        <div class="clock-label">
            &gt;_ server_clock.exe
        </div>

        <div id="clock">
            <?= $serverTime; ?>
        </div>

        <div id="date">
            <?= $serverDate; ?>
        </div>

        <div class="timezone">
            🌏 WIB — Asia/Jakarta
        </div>

    </div>

    <div class="info-grid">

        <div class="info-card">
            <div class="info-icon">🌏</div>
            <h3>Zona Waktu</h3>
            <p>Asia/Jakarta — Waktu Indonesia Barat</p>
        </div>

        <div class="info-card">
            <div class="info-icon">🐘</div>
            <h3>Sumber Waktu</h3>
            <p>PHP Server menggunakan date() function</p>
        </div>

        <div class="info-card">
            <div class="info-icon">●</div>
            <h3>Status</h3>
            <p class="status">● Server aktif</p>
        </div>

    </div>

</main>

<footer>
    &lt;Kursus<span>Ku/&gt;</span> — Belajar Teknologi, Bangun Masa Depan
</footer>

<script>
function updateClock() {
    const now = new Date();

    const time = new Intl.DateTimeFormat('id-ID', {
        timeZone: 'Asia/Jakarta',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false
    }).format(now);

    const date = new Intl.DateTimeFormat('id-ID', {
        timeZone: 'Asia/Jakarta',
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    }).format(now);

    document.getElementById('clock').textContent = time;
    document.getElementById('date').textContent = date;
}

updateClock();
setInterval(updateClock, 1000);
</script>

</body>
</html>
```
