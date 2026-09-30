<?php

date_default_timezone_set('Asia/Jakarta');

$serverTime = date('H:i:s');
$serverDate = date('d F Y');

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>KursusKu | Server Time</title>


    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {

            font-family:
                Inter,
                "Segoe UI",
                Arial,
                sans-serif;

            background: #030806;

            color: #ecfff4;

            min-height: 100vh;

            overflow-x: hidden;
        }


        body::before {

            content: "";

            position: fixed;

            width: 500px;
            height: 500px;

            top: -220px;
            left: -200px;

            background:
                radial-gradient(
                    circle,
                    rgba(57,255,136,.09),
                    transparent 70%
                );

            pointer-events: none;

            z-index: -1;
        }


        body::after {

            content: "";

            position: fixed;

            width: 500px;
            height: 500px;

            right: -220px;
            bottom: -220px;

            background:
                radial-gradient(
                    circle,
                    rgba(0,255,150,.07),
                    transparent 70%
                );

            pointer-events: none;

            z-index: -1;
        }


        a {
            text-decoration: none;
            color: inherit;
        }


        /* =====================================================
           SCROLLBAR
        ===================================================== */

        ::-webkit-scrollbar {
            width: 8px;
        }


        ::-webkit-scrollbar-track {
            background: #020604;
        }


        ::-webkit-scrollbar-thumb {

            background: #1d8b4c;

            border-radius: 20px;
        }


        ::-webkit-scrollbar-thumb:hover {
            background: #39ff88;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        header {

            position: sticky;

            top: 0;

            z-index: 9999;

            background:
                rgba(3,10,7,.82);

            backdrop-filter:
                blur(18px);

            -webkit-backdrop-filter:
                blur(18px);

            border-bottom:
                1px solid rgba(57,255,136,.12);

            box-shadow:
                0 10px 40px rgba(0,0,0,.25);
        }


        .nav {

            width: min(92%, 1200px);

            min-height: 78px;

            margin: auto;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .logo {

            font-size: 24px;

            font-weight: 800;

            letter-spacing: -1px;

            color: #39ff88;

            text-shadow:
                0 0 10px rgba(57,255,136,.35);

            white-space: nowrap;
        }


        .logo span {
            color: #eafff1;
        }


        .logo-dot {

            display: inline-block;

            width: 7px;
            height: 7px;

            margin-left: 5px;

            border-radius: 50%;

            background: #39ff88;

            box-shadow:
                0 0 10px #39ff88;

            animation:
                pulse 1.8s infinite;
        }


        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .35;
                transform: scale(.7);
            }

        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        nav {

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 4px;

            flex-wrap: wrap;
        }


        nav a {

            position: relative;

            padding: 9px 11px;

            color: #8da397;

            font-size: 12px;

            font-weight: 600;

            border-radius: 8px;

            transition: .3s ease;
        }


        nav a::after {

            content: "";

            position: absolute;

            left: 50%;

            bottom: 3px;

            width: 0;

            height: 2px;

            background: #39ff88;

            box-shadow:
                0 0 8px #39ff88;

            transform:
                translateX(-50%);

            transition: .3s;
        }


        nav a:hover,
        nav a.active {

            color: #39ff88;

            background:
                rgba(57,255,136,.06);
        }


        nav a:hover::after,
        nav a.active::after {

            width: 45%;
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {

            position: relative;

            padding:
                85px 0 55px;

            text-align: center;

            background:
                radial-gradient(
                    circle at 50% 0%,
                    rgba(57,255,136,.08),
                    transparent 50%
                );
        }


        .terminal {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding:
                8px 15px;

            margin-bottom: 20px;

            color: #39ff88;

            background:
                rgba(57,255,136,.045);

            border:
                1px solid rgba(57,255,136,.25);

            border-radius: 50px;

            font-family: monospace;

            font-size: 12px;

            box-shadow:
                0 0 20px rgba(57,255,136,.04);
        }


        .terminal::before {

            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #39ff88;

            box-shadow:
                0 0 10px #39ff88;
        }


        h1 {

            font-size:
                clamp(38px, 6vw, 58px);

            line-height: 1.1;

            letter-spacing: -2px;

            margin-bottom: 14px;
        }


        h1 span {

            color: #39ff88;

            text-shadow:
                0 0 20px rgba(57,255,136,.25);
        }


        .hero p {

            max-width: 650px;

            margin: auto;

            color: #81948a;

            font-size: 15px;

            line-height: 1.7;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        main {

            width: min(92%, 1000px);

            margin: auto;

            padding:
                20px 0 100px;
        }


        /* =====================================================
           CLOCK CARD
        ===================================================== */

        .clock-card {

            position: relative;

            max-width: 780px;

            margin:
                20px auto 30px;

            padding:
                55px 30px;

            text-align: center;

            background:
                linear-gradient(
                    145deg,
                    rgba(10,25,15,.94),
                    rgba(4,12,8,.97)
                );

            border:
                1px solid rgba(57,255,136,.16);

            border-radius: 24px;

            box-shadow:
                0 25px 70px rgba(0,0,0,.35),
                0 0 40px rgba(57,255,136,.05);

            overflow: hidden;
        }


        .clock-card::before {

            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            top: -190px;
            left: 50%;

            transform:
                translateX(-50%);

            background:
                radial-gradient(
                    circle,
                    rgba(57,255,136,.10),
                    transparent 70%
                );

            pointer-events: none;
        }


        .clock-label {

            position: relative;

            display: inline-block;

            margin-bottom: 20px;

            color: #39ff88;

            font-family: monospace;

            font-size: 13px;

            padding:
                7px 13px;

            border-radius: 8px;

            background:
                rgba(57,255,136,.045);

            border:
                1px solid rgba(57,255,136,.14);
        }


        #clock {

            position: relative;

            font-family: monospace;

            font-size:
                clamp(48px, 10vw, 92px);

            font-weight: 800;

            letter-spacing: 5px;

            color: #39ff88;

            text-shadow:
                0 0 10px rgba(57,255,136,.55),
                0 0 30px rgba(57,255,136,.25),
                0 0 70px rgba(57,255,136,.08);
        }


        #date {

            margin-top: 14px;

            color: #9db2a5;

            font-size: 17px;
        }


        .timezone {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-top: 22px;

            padding:
                9px 16px;

            border-radius: 30px;

            color: #39ff88;

            background:
                rgba(57,255,136,.055);

            border:
                1px solid rgba(57,255,136,.22);

            font-family: monospace;

            font-size: 12px;
        }


        /* =====================================================
           INFO GRID
        ===================================================== */

        .info-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 18px;

            max-width: 900px;

            margin: auto;
        }


        .info-card {

            position: relative;

            padding: 26px 20px;

            text-align: center;

            background:
                rgba(10,23,16,.85);

            border:
                1px solid rgba(57,255,136,.10);

            border-radius: 16px;

            transition:
                .3s ease;

            overflow: hidden;
        }


        .info-card::before {

            content: "";

            position: absolute;

            left: 50%;

            bottom: -60px;

            width: 130px;
            height: 130px;

            transform:
                translateX(-50%);

            background:
                radial-gradient(
                    circle,
                    rgba(57,255,136,.08),
                    transparent 70%
                );

            pointer-events: none;
        }


        .info-card:hover {

            transform:
                translateY(-6px);

            border-color:
                rgba(57,255,136,.35);

            box-shadow:
                0 15px 35px rgba(0,0,0,.25),
                0 0 25px rgba(57,255,136,.06);
        }


        .info-icon {

            display: flex;

            align-items: center;

            justify-content: center;

            width: 52px;
            height: 52px;

            margin:
                0 auto 15px;

            border-radius: 14px;

            background:
                rgba(57,255,136,.055);

            border:
                1px solid rgba(57,255,136,.12);

            font-size: 24px;
        }


        .info-card h3 {

            margin-bottom: 8px;

            color: #eafff1;

            font-size: 16px;
        }


        .info-card p {

            color: #81948a;

            font-size: 13px;

            line-height: 1.6;
        }


        .status {

            color: #39ff88 !important;

            font-weight: 600;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {

            padding:
                30px 20px;

            text-align: center;

            color: #62756a;

            font-size: 13px;

            background:
                #020604;

            border-top:
                1px solid rgba(57,255,136,.10);
        }


        footer span {
            color: #39ff88;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 1050px) {

            .nav {

                flex-direction: column;

                padding:
                    15px 0;

            }


            nav {
                justify-content: center;
            }

        }


        @media (max-width: 700px) {

            .hero {

                padding:
                    65px 0 40px;
            }


            .info-grid {

                grid-template-columns: 1fr;

            }


            #clock {

                letter-spacing: 1px;

            }


            .clock-card {

                padding:
                    40px 18px;

                border-radius: 19px;
            }

        }


        @media (max-width: 500px) {

            nav {

                gap: 2px;

            }


            nav a {

                padding:
                    7px 7px;

                font-size: 10px;

            }


            h1 {

                font-size: 38px;

            }


            .hero p {

                font-size: 14px;

            }


            #clock {

                font-size: 43px;

            }


            #date {

                font-size: 14px;

            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     HEADER
===================================================== -->

<header>

    <div class="nav">


        <a
            href="index.php"
            class="logo"
        >

            &lt;Kursus<span>Ku/&gt;</span>

            <span class="logo-dot"></span>

        </a>


        <nav>


            <a href="index.php">
                Katalog
            </a>


            <a href="index.php#kursus">
                Kursus
            </a>


            <a href="registration.php">
                Registrasi
            </a>


            <a href="fee-calculator.php">
                Kalkulator
            </a>


            <a
                href="server-time.php"
                class="active"
            >
                Server Time
            </a>


            <a href="test-functions.php">
                Tes Fungsi
            </a>


            <a href="index.php#tentang">
                Tentang Kami
            </a>


            <a href="index.php#faq">
                FAQ
            </a>


            <a href="history.php">
                Riwayat
            </a>


            <a href="index.php#kontak">
                Kontak
            </a>


        </nav>


    </div>

</header>


<!-- =====================================================
     HERO
===================================================== -->

<section class="hero">

    <div class="container">


        <div class="terminal">

            $ php server-time.php

        </div>


        <h1>

            Server
            <span>Time</span>

        </h1>


        <p>

            Menampilkan waktu server KursusKu
            secara real-time menggunakan zona waktu
            Asia/Jakarta.

        </p>


    </div>

</section>


<!-- =====================================================
     MAIN
===================================================== -->

<main>


    <!-- CLOCK -->

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


    <!-- INFORMATION -->

    <div class="info-grid">


        <div class="info-card">


            <div class="info-icon">
                🌏
            </div>


            <h3>
                Zona Waktu
            </h3>


            <p>

                Asia/Jakarta —
                Waktu Indonesia Barat

            </p>


        </div>


        <div class="info-card">


            <div class="info-icon">
                🐘
            </div>


            <h3>
                Sumber Waktu
            </h3>


            <p>

                PHP Server menggunakan
                fungsi date()

            </p>


        </div>


        <div class="info-card">


            <div class="info-icon">
                ●
            </div>


            <h3>
                Status
            </h3>


            <p class="status">

                ● Server aktif

            </p>


        </div>


    </div>


</main>


<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    &lt;Kursus<span>Ku/&gt;</span>

    &nbsp;—&nbsp;

    Belajar Teknologi, Bangun Masa Depan

    &nbsp;•&nbsp;

    &copy; <?= date('Y'); ?>

</footer>


<!-- =====================================================
     REAL-TIME CLOCK
===================================================== -->

<script>

function updateClock() {

    const now = new Date();


    const time =
        new Intl.DateTimeFormat(
            'id-ID',
            {
                timeZone: 'Asia/Jakarta',

                hour: '2-digit',

                minute: '2-digit',

                second: '2-digit',

                hour12: false
            }
        ).format(now);


    const date =
        new Intl.DateTimeFormat(
            'id-ID',
            {
                timeZone: 'Asia/Jakarta',

                day: '2-digit',

                month: 'long',

                year: 'numeric'
            }
        ).format(now);


    document.getElementById('clock')
        .textContent = time;


    document.getElementById('date')
        .textContent = date;

}


updateClock();

setInterval(updateClock, 1000);

</script>


</body>

</html>