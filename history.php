```php
<?php

$history = [

    [
        'nomor' => 'KRS-2026-101',
        'nama' => 'Andi Saputra',
        'kursus' => 'Web Development',
        'jenis' => 'Mahasiswa',
        'diskon' => 20,
        'total' => 600000
    ],

    [
        'nomor' => 'KRS-2026-102',
        'nama' => 'Siti Rahma',
        'kursus' => 'Database',
        'jenis' => 'Guru',
        'diskon' => 15,
        'total' => 510000
    ],

    [
        'nomor' => 'KRS-2026-103',
        'nama' => 'Budi Pratama',
        'kursus' => 'Desain',
        'jenis' => 'Umum',
        'diskon' => 5,
        'total' => 522500
    ],

    [
        'nomor' => 'KRS-2026-104',
        'nama' => 'Rina Amelia',
        'kursus' => 'Artificial Intelligence',
        'jenis' => 'Mahasiswa',
        'diskon' => 20,
        'total' => 680000
    ]

];

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>History Pendaftaran - KursusKu</title>


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

            width: min(94%, 1150px);

            margin: auto;

            padding:
                80px 0 100px;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            text-align: center;

            margin-bottom: 38px;
        }


        .badge-title {

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
        }


        .badge-title::before {

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


        .page-header p {

            color: #81948a;

            font-size: 15px;

            line-height: 1.7;
        }


        /* =====================================================
           HISTORY CARD
        ===================================================== */

        .history-box {

            position: relative;

            padding: 25px;

            background:
                linear-gradient(
                    145deg,
                    rgba(10,25,15,.94),
                    rgba(4,12,8,.97)
                );

            border:
                1px solid rgba(57,255,136,.14);

            border-radius: 22px;

            box-shadow:
                0 25px 70px rgba(0,0,0,.35),
                0 0 35px rgba(57,255,136,.04);

            overflow: hidden;
        }


        .history-box::before {

            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            top: -190px;
            right: -100px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(57,255,136,.08),
                    transparent 70%
                );

            pointer-events: none;
        }


        .table-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 20px;

            padding:
                5px 5px 15px;

            border-bottom:
                1px solid rgba(57,255,136,.08);
        }


        .table-header h2 {

            color: #eafff1;

            font-size: 18px;
        }


        .record-count {

            color: #39ff88;

            background:
                rgba(57,255,136,.06);

            border:
                1px solid rgba(57,255,136,.18);

            padding:
                7px 12px;

            border-radius: 20px;

            font-family: monospace;

            font-size: 11px;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {

            overflow-x: auto;

            border-radius: 14px;
        }


        table {

            width: 100%;

            min-width: 850px;

            border-collapse: collapse;
        }


        thead th {

            padding:
                15px 14px;

            text-align: left;

            color: #39ff88;

            background:
                rgba(57,255,136,.055);

            border-bottom:
                1px solid rgba(57,255,136,.18);

            font-size: 12px;

            font-weight: 700;

            white-space: nowrap;
        }


        thead th:first-child {

            border-radius:
                10px 0 0 0;
        }


        thead th:last-child {

            border-radius:
                0 10px 0 0;
        }


        tbody td {

            padding:
                16px 14px;

            color: #b8cabe;

            font-size: 13px;

            border-bottom:
                1px solid rgba(57,255,136,.07);

            white-space: nowrap;
        }


        tbody tr {

            transition:
                .25s ease;
        }


        tbody tr:hover {

            background:
                rgba(57,255,136,.035);
        }


        tbody tr:hover td {

            color: #eafff1;
        }


        .nomor {

            color: #39ff88;

            font-family: monospace;

            font-size: 12px;

            font-weight: 600;
        }


        .nama {

            color: #eafff1;

            font-weight: 600;
        }


        .kursus {

            color: #b8cabe;
        }


        /* =====================================================
           PARTICIPANT BADGE
        ===================================================== */

        .participant-badge {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding:
                6px 10px;

            border-radius: 20px;

            background:
                rgba(57,255,136,.055);

            color: #39ff88;

            border:
                1px solid rgba(57,255,136,.18);

            font-size: 11px;

            font-weight: 700;
        }


        .participant-badge::before {

            content: "";

            width: 5px;
            height: 5px;

            border-radius: 50%;

            background: #39ff88;

            box-shadow:
                0 0 6px #39ff88;
        }


        /* =====================================================
           DISCOUNT
        ===================================================== */

        .discount {

            color: #39ff88;

            font-weight: 800;

            font-family: monospace;
        }


        /* =====================================================
           TOTAL
        ===================================================== */

        .total {

            color: #eafff1;

            font-weight: 800;

            font-family: monospace;

            text-shadow:
                0 0 8px rgba(57,255,136,.08);
        }


        /* =====================================================
           BOTTOM ACTION
        ===================================================== */

        .bottom-action {

            display: flex;

            justify-content: center;

            margin-top: 28px;
        }


        .back {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding:
                12px 20px;

            color: #39ff88;

            background:
                rgba(57,255,136,.04);

            border:
                1px solid rgba(57,255,136,.30);

            border-radius: 10px;

            font-size: 13px;

            font-weight: 700;

            transition:
                .3s ease;
        }


        .back:hover {

            color: #031108;

            background: #39ff88;

            box-shadow:
                0 0 25px rgba(57,255,136,.20);

            transform:
                translateY(-2px);
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

            main {

                width: 92%;

                padding:
                    65px 0 80px;
            }


            .history-box {

                padding: 17px;

                border-radius: 18px;
            }


            .table-header {

                align-items: flex-start;

                flex-direction: column;

                gap: 10px;
            }


            h1 {

                font-size: 35px;

                letter-spacing: -1.5px;
            }


            nav a {

                padding:
                    7px 8px;

                font-size: 11px;
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


            <a href="test-functions.php">
                Tes Fungsi
            </a>


            <a href="index.php#tentang">
                Tentang Kami
            </a>


            <a href="index.php#faq">
                FAQ
            </a>


            <a
                href="history.php"
                class="active"
            >
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


    <!-- PAGE HEADER -->

    <div class="page-header">


        <div class="badge-title">

            REGISTRATION HISTORY

        </div>


        <h1>

            History
            <span>Pendaftaran</span>

        </h1>


        <p>

            Data riwayat pendaftaran peserta
            KursusKu dalam bentuk tabel.

        </p>


    </div>


    <!-- HISTORY -->

    <div class="history-box">


        <div class="table-header">


            <h2>
                📋 Data Pendaftaran
            </h2>


            <div class="record-count">

                <?= count($history); ?> RECORD

            </div>


        </div>


        <div class="table-wrapper">


            <table>


                <thead>

                    <tr>

                        <th>
                            No. Pendaftaran
                        </th>

                        <th>
                            Nama
                        </th>

                        <th>
                            Kursus
                        </th>

                        <th>
                            Participant Type
                        </th>

                        <th>
                            Diskon
                        </th>

                        <th>
                            Total Bayar
                        </th>

                    </tr>

                </thead>


                <tbody>


                    <?php foreach ($history as $data): ?>


                        <tr>


                            <td class="nomor">

                                <?= htmlspecialchars(
                                    $data['nomor']
                                ); ?>

                            </td>


                            <td class="nama">

                                <?= htmlspecialchars(
                                    $data['nama']
                                ); ?>

                            </td>


                            <td class="kursus">

                                <?= htmlspecialchars(
                                    $data['kursus']
                                ); ?>

                            </td>


                            <td>

                                <span class="participant-badge">

                                    <?= htmlspecialchars(
                                        $data['jenis']
                                    ); ?>

                                </span>

                            </td>


                            <td class="discount">

                                <?= $data['diskon']; ?>%

                            </td>


                            <td class="total">

                                Rp <?= number_format(
                                    $data['total'],
                                    0,
                                    ',',
                                    '.'
                                ); ?>

                            </td>


                        </tr>


                    <?php endforeach; ?>


                </tbody>


            </table>


        </div>


    </div>


    <!-- BUTTON -->

    <div class="bottom-action">


        <a
            href="registration.php"
            class="back"
        >

            ← Kembali ke Registrasi

        </a>


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
```
