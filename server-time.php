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

    <title>Server Time - KursusKu</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        /* ================= HEADER ================= */

        header {
            background: #0f172a;
            padding: 15px 7%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }

        nav {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 25px;
            font-weight: bold;
        }

        .logo img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            background: white;
            border-radius: 50%;
            padding: 3px;
        }

        .nav-links {
            display: flex;
            gap: 8px;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: #2563eb;
            color: white;
        }

        /* ================= HERO ================= */

        .page-hero {
            background:
                linear-gradient(135deg, #0f172a, #1d4ed8, #7c3aed);
            color: white;
            text-align: center;
            padding: 70px 20px;
        }

        .page-hero .icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .page-hero h1 {
            font-size: 42px;
            margin-bottom: 12px;
        }

        .page-hero p {
            color: #dbeafe;
            font-size: 17px;
        }

        /* ================= CLOCK ================= */

        .container {
            width: 90%;
            max-width: 850px;
            margin: 60px auto;
        }

        .clock-card {
            background: white;
            border-radius: 22px;
            padding: 45px 30px;
            text-align: center;
            box-shadow: 0 12px 35px rgba(15,23,42,0.08);
            border: 1px solid #e2e8f0;
        }

        .clock-icon {
            font-size: 55px;
            margin-bottom: 20px;
        }

        .clock-card h2 {
            color: #64748b;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .time {
            font-size: 64px;
            font-weight: bold;
            color: #2563eb;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .date {
            font-size: 20px;
            color: #475569;
            margin-bottom: 35px;
        }

        .timezone {
            display: inline-block;
            background: #eff6ff;
            color: #1d4ed8;
            padding: 10px 18px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 14px;
        }

        /* ================= INFO ================= */

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 25px;
        }

        .info-card {
            background: white;
            padding: 25px 20px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid #e2e8f0;
            box-shadow: 0 8px 25px rgba(15,23,42,0.05);
        }

        .info-card .icon {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .info-card h3 {
            font-size: 16px;
            margin-bottom: 7px;
            color: #0f172a;
        }

        .info-card p {
            font-size: 14px;
            color: #64748b;
        }

        /* ================= FOOTER ================= */

        footer {
            margin-top: 80px;
            padding: 30px;
            background: #0f172a;
            color: #cbd5e1;
            text-align: center;
        }

        footer strong {
            color: white;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 700px) {

            header {
                padding: 12px 5%;
            }

            nav {
                flex-direction: column;
                gap: 12px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-links a {
                padding: 8px 10px;
                font-size: 13px;
            }

            .page-hero {
                padding: 55px 20px;
            }

            .page-hero h1 {
                font-size: 32px;
            }

            .clock-card {
                padding: 35px 20px;
            }

            .time {
                font-size: 45px;
                letter-spacing: 1px;
            }

            .date {
                font-size: 17px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .logo {
                font-size: 22px;
            }

            .logo img {
                width: 42px;
                height: 42px;
            }
        }

    </style>

</head>

<body>


<!-- ================= HEADER ================= -->

<header>

    <nav>

        <div class="logo">

            <img
                src="assets/images/logo-kursus.png"
                alt="Logo KursusKu"
            >

            <span>KursusKu</span>

        </div>


        <div class="nav-links">

            <a href="index.php">
                Katalog
            </a>

            <a href="fee-calculator.php">
                Kalkulator
            </a>

            <a href="server-time.php" class="active">
                Server Time
            </a>

        </div>

    </nav>

</header>


<!-- ================= PAGE HERO ================= -->

<section class="page-hero">

    <div class="icon">
        ⏰
    </div>

    <h1>
        Server Time
    </h1>

    <p>
        Menampilkan waktu berdasarkan server KursusKu.
    </p>

</section>


<!-- ================= CLOCK ================= -->

<main class="container">

    <div class="clock-card">

        <div class="clock-icon">
            🕐
        </div>

        <h2>
            Waktu Server Saat Ini
        </h2>

        <div class="time" id="clock">
            <?= $serverTime; ?>
        </div>

        <div class="date">
            <?= $serverDate; ?>
        </div>

        <div class="timezone">
            🌏 WIB — Asia/Jakarta
        </div>

    </div>


    <!-- ================= INFORMATION ================= -->

    <div class="info-grid">

        <div class="info-card">

            <div class="icon">
                🇮🇩
            </div>

            <h3>
                Zona Waktu
            </h3>

            <p>
                Waktu Indonesia Barat
            </p>

        </div>


        <div class="info-card">

            <div class="icon">
                🖥️
            </div>

            <h3>
                Sumber Waktu
            </h3>

            <p>
                Server KursusKu
            </p>

        </div>


        <div class="info-card">

            <div class="icon">
                🔄
            </div>

            <h3>
                Status
            </h3>

            <p>
                Waktu diperbarui otomatis
            </p>

        </div>

    </div>

</main>


<!-- ================= FOOTER ================= -->

<footer>

    <p>
        &copy; <?= date('Y'); ?>
        <strong>KursusKu</strong>.
        Belajar Skill Baru, Bangun Masa Depan.
    </p>

</footer>


<!-- ================= JAVASCRIPT ================= -->

<script>

    function updateClock() {

        const now = new Date();

        const hours =
            String(now.getHours()).padStart(2, '0');

        const minutes =
            String(now.getMinutes()).padStart(2, '0');

        const seconds =
            String(now.getSeconds()).padStart(2, '0');

        document.getElementById('clock').textContent =
            hours + ':' + minutes + ':' + seconds;
    }

    setInterval(updateClock, 1000);

</script>

</body>
</html>
```
