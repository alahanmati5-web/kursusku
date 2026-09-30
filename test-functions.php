<?php

require_once 'helpers.php';

$tests = [];

function addTest($nama, $hasil)
{
    global $tests;

    $tests[] = [
        'nama' => $nama,
        'hasil' => $hasil
    ];
}


/* =====================================================
   TEST 1
===================================================== */

addTest(
    'formatRupiah()',
    formatRupiah(500000) === 'Rp 500.000'
);


/* =====================================================
   TEST 2
===================================================== */

addTest(
    'getStatusKursus() - Penuh',
    getStatusKursus(20, 20) === 'Penuh'
);


/* =====================================================
   TEST 3
===================================================== */

addTest(
    'getStatusKursus() - Tersedia',
    getStatusKursus(10, 20) === 'Tersedia'
);


/* =====================================================
   TEST 4
===================================================== */

addTest(
    'getPersentaseKapasitas()',
    getPersentaseKapasitas(10, 20) === 50
);


/* =====================================================
   TEST 5
===================================================== */

addTest(
    'hitungDiskon()',
    hitungDiskon(500000, 20) === 400000
);


/* =====================================================
   TEST 6
===================================================== */

$kursus = getKursus();

addTest(
    'getKursus() - minimal 6 kursus',
    count($kursus) >= 6
);


/* =====================================================
   HASIL TEST
===================================================== */

$totalTest = count($tests);

$totalPass = 0;

foreach ($tests as $test) {

    if ($test['hasil']) {
        $totalPass++;
    }

}

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Test Functions - KursusKu
    </title>


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
           MAIN
        ===================================================== */

        main {

            width: min(92%, 950px);

            margin: auto;

            padding:
                90px 0 100px;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            text-align: center;

            margin-bottom: 38px;
        }


        .badge {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding:
                8px 14px;

            margin-bottom: 18px;

            color: #39ff88;

            background:
                rgba(57,255,136,.05);

            border:
                1px solid rgba(57,255,136,.22);

            border-radius: 50px;

            font-family: monospace;

            font-size: 12px;

            box-shadow:
                0 0 20px rgba(57,255,136,.04);
        }


        .badge::before {

            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #39ff88;

            box-shadow:
                0 0 10px #39ff88;
        }


        h1 {

            color: #eafff1;

            font-size:
                clamp(32px, 5vw, 48px);

            line-height: 1.1;

            letter-spacing: -2px;

            margin-bottom: 12px;
        }


        h1 span {

            color: #39ff88;

            text-shadow:
                0 0 20px rgba(57,255,136,.2);
        }


        .subtitle {

            max-width: 620px;

            margin: auto;

            color: #81948a;

            font-size: 15px;

            line-height: 1.7;
        }


        /* =====================================================
           TEST CARD
        ===================================================== */

        .test-card {

            position: relative;

            padding: 32px;

            background:
                linear-gradient(
                    145deg,
                    rgba(10,25,15,.94),
                    rgba(4,12,8,.96)
                );

            border:
                1px solid rgba(57,255,136,.14);

            border-radius: 22px;

            box-shadow:
                0 25px 70px rgba(0,0,0,.3),
                0 0 35px rgba(57,255,136,.04);

            overflow: hidden;
        }


        .test-card::before {

            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            top: -150px;
            right: -120px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(57,255,136,.08),
                    transparent 70%
                );

            pointer-events: none;
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary-box {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 15px;

            margin-bottom: 28px;
        }


        .summary-item {

            padding: 18px;

            text-align: center;

            background:
                rgba(57,255,136,.035);

            border:
                1px solid rgba(57,255,136,.10);

            border-radius: 14px;
        }


        .summary-item strong {

            display: block;

            color: #39ff88;

            font-size: 25px;

            margin-bottom: 3px;
        }


        .summary-item span {

            color: #81948a;

            font-size: 12px;
        }


        /* =====================================================
           TEST ITEM
        ===================================================== */

        .test {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            padding:
                18px 20px;

            margin-bottom: 12px;

            background:
                rgba(12,27,17,.85);

            border:
                1px solid rgba(57,255,136,.09);

            border-radius: 13px;

            transition: .3s ease;
        }


        .test:hover {

            transform:
                translateX(5px);

            border-color:
                rgba(57,255,136,.35);

            box-shadow:
                0 0 20px rgba(57,255,136,.06);
        }


        .test-name {

            display: flex;

            align-items: center;

            gap: 12px;

            color: #dff9e9;

            font-size: 14px;

            font-weight: 600;
        }


        .test-number {

            display: flex;

            align-items: center;

            justify-content: center;

            width: 31px;
            height: 31px;

            flex-shrink: 0;

            border-radius: 9px;

            color: #39ff88;

            background:
                rgba(57,255,136,.07);

            border:
                1px solid rgba(57,255,136,.15);

            font-family: monospace;

            font-size: 12px;
        }


        /* =====================================================
           PASS
        ===================================================== */

        .pass {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            color: #39ff88;

            font-weight: 800;

            font-size: 12px;

            padding:
                7px 12px;

            border-radius: 30px;

            background:
                rgba(57,255,136,.07);

            border:
                1px solid rgba(57,255,136,.35);

            box-shadow:
                0 0 12px rgba(57,255,136,.08);

            white-space: nowrap;
        }


        /* =====================================================
           FAIL
        ===================================================== */

        .fail {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            color: #ff6666;

            font-weight: 800;

            font-size: 12px;

            padding:
                7px 12px;

            border-radius: 30px;

            background:
                rgba(255,70,70,.07);

            border:
                1px solid rgba(255,70,70,.35);

            white-space: nowrap;
        }


        /* =====================================================
           FINAL RESULT
        ===================================================== */

        .final {

            margin-top: 25px;

            padding: 24px;

            text-align: center;

            border-radius: 15px;

            color: #39ff88;

            background:
                linear-gradient(
                    135deg,
                    rgba(57,255,136,.08),
                    rgba(57,255,136,.025)
                );

            border:
                1px solid rgba(57,255,136,.45);

            box-shadow:
                0 0 25px rgba(57,255,136,.10),
                inset 0 0 20px rgba(57,255,136,.025);

            font-size: 19px;

            font-weight: 800;

            text-shadow:
                0 0 10px rgba(57,255,136,.45);
        }


        .final.fail-result {

            color: #ff6666;

            background:
                rgba(255,70,70,.06);

            border-color:
                rgba(255,70,70,.45);

            box-shadow:
                0 0 25px rgba(255,70,70,.08);

            text-shadow: none;
        }


        /* =====================================================
           INFO
        ===================================================== */

        .info {

            margin-top: 22px;

            padding: 17px 20px;

            color: #81948a;

            background:
                rgba(255,255,255,.015);

            border:
                1px solid rgba(255,255,255,.05);

            border-radius: 12px;

            font-size: 13px;

            line-height: 1.7;
        }


        .info strong {
            color: #39ff88;
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


        @media (max-width: 650px) {

            .nav {
                gap: 12px;
            }


            .logo {
                font-size: 22px;
            }


            nav {
                gap: 3px;
            }


            nav a {

                padding:
                    7px 8px;

                font-size: 11px;
            }


            main {

                width: 92%;

                padding:
                    65px 0 80px;
            }


            h1 {

                font-size: 35px;

                letter-spacing: -1.5px;
            }


            .test-card {

                padding: 20px;

                border-radius: 18px;
            }


            .summary-box {

                grid-template-columns: 1fr;
            }


            .test {

                flex-direction: column;

                align-items: flex-start;

                gap: 13px;
            }


            .test-name {

                align-items: flex-start;
            }


            .pass,
            .fail {

                margin-left: 43px;
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


            <a href="server-time.php">
                Server Time
            </a>


            <a
                href="test-functions.php"
                class="active"
            >
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
     MAIN
===================================================== -->

<main>


    <div class="page-header">


        <div class="badge">

            SYSTEM TEST

        </div>


        <h1>

            Test Functions
            <span>KursusKu</span>

        </h1>


        <p class="subtitle">

            Pengujian fungsi utama sistem untuk memastikan
            fitur KursusKu berjalan sesuai dengan hasil
            yang diharapkan.

        </p>


    </div>


    <div class="test-card">


        <!-- SUMMARY -->

        <div class="summary-box">


            <div class="summary-item">

                <strong>
                    <?= $totalPass; ?>
                </strong>

                <span>
                    Test Berhasil
                </span>

            </div>


            <div class="summary-item">

                <strong>
                    <?= $totalTest; ?>
                </strong>

                <span>
                    Total Test
                </span>

            </div>


        </div>


        <!-- TEST LIST -->

        <?php foreach ($tests as $index => $test): ?>


            <div class="test">


                <div class="test-name">


                    <span class="test-number">

                        <?= $index + 1; ?>

                    </span>


                    <span>

                        <?= htmlspecialchars(
                            $test['nama']
                        ); ?>

                    </span>


                </div>


                <?php if ($test['hasil']): ?>


                    <span class="pass">

                        ✓ PASS

                    </span>


                <?php else: ?>


                    <span class="fail">

                        ✕ FAIL

                    </span>


                <?php endif; ?>


            </div>


        <?php endforeach; ?>


        <!-- FINAL -->

        <?php if ($totalPass === $totalTest): ?>


            <div class="final">

                ✓ SEMUA TEST PASS

            </div>


        <?php else: ?>


            <div class="final fail-result">

                ⚠ Ada test yang gagal.

            </div>


        <?php endif; ?>


        <!-- INFO -->

        <div class="info">

            <strong>Info:</strong>

            Halaman ini digunakan untuk menguji
            fungsi utama KursusKu seperti format rupiah,
            status kursus, kapasitas kursus, perhitungan
            diskon, dan data katalog kursus.

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


</body>

</html>