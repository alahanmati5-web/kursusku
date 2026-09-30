<?php
require_once 'helpers.php';

$siteName = "KursusKu";
$tahun = date("Y");

$kursus = getKursus();

// Mengambil kursus dari URL jika ada
$kursusDipilih = $_GET['kursus'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi - <?= $siteName ?></title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at 20% 10%, rgba(57,255,136,.08), transparent 30%),
                radial-gradient(circle at 80% 30%, rgba(57,255,136,.05), transparent 30%),
                #030806;
            color: #ffffff;
            min-height: 100vh;
        }

        /* =========================
           NAVBAR
        ========================= */

        header {
            position: sticky;
            top: 0;
            z-index: 1000;

            background: rgba(3, 10, 7, .82);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            border-bottom: 1px solid rgba(57,255,136,.18);
            box-shadow: 0 8px 30px rgba(0,0,0,.35);
        }

        .navbar {
            max-width: 1450px;
            margin: auto;

            min-height: 72px;
            padding: 0 4%;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 9px;

            color: #39ff88;
            font-size: 23px;
            font-weight: bold;
            text-decoration: none;

            white-space: nowrap;

            text-shadow: 0 0 15px rgba(57,255,136,.45);
        }

        .logo-dot {
            width: 8px;
            height: 8px;

            background: #39ff88;
            border-radius: 50%;

            box-shadow: 0 0 12px #39ff88;

            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .45;
                transform: scale(.7);
            }
        }

        .nav-menu {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 5px;
            flex-wrap: wrap;
        }

        .nav-menu a {
            color: #a9bbb2;
            text-decoration: none;

            padding: 9px 10px;
            border-radius: 8px;

            font-size: 13px;

            transition: .25s ease;
        }

        .nav-menu a:hover {
            color: #39ff88;
            background: rgba(57,255,136,.08);
        }

        .nav-menu a.active {
            color: #39ff88;
            background: rgba(57,255,136,.10);

            box-shadow:
                inset 0 0 0 1px rgba(57,255,136,.18),
                0 0 15px rgba(57,255,136,.05);
        }

        /* =========================
           MAIN
        ========================= */

        .container {
            width: 92%;
            max-width: 900px;

            margin: 55px auto 70px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .badge {
            display: inline-block;

            padding: 7px 14px;
            margin-bottom: 16px;

            border: 1px solid rgba(57,255,136,.25);
            border-radius: 999px;

            color: #39ff88;
            background: rgba(57,255,136,.06);

            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1.5px;

            box-shadow: 0 0 20px rgba(57,255,136,.05);
        }

        .page-header h1 {
            font-size: clamp(30px, 5vw, 46px);
            margin-bottom: 12px;

            color: #ffffff;

            text-shadow:
                0 0 25px rgba(57,255,136,.08);
        }

        .page-header h1 span {
            color: #39ff88;
        }

        .page-header p {
            color: #9caf a6;
            color: #9cafA6;
            line-height: 1.7;
        }

        /* =========================
           FORM CARD
        ========================= */

        .form-box {
            background:
                linear-gradient(
                    145deg,
                    rgba(15, 30, 23, .88),
                    rgba(6, 17, 12, .92)
                );

            border: 1px solid rgba(57,255,136,.18);
            border-radius: 22px;

            padding: 38px;

            box-shadow:
                0 25px 70px rgba(0,0,0,.45),
                inset 0 1px 0 rgba(255,255,255,.025);

            position: relative;
            overflow: hidden;
        }

        .form-box::before {
            content: "";

            position: absolute;
            top: -100px;
            right: -100px;

            width: 220px;
            height: 220px;

            background: rgba(57,255,136,.08);
            filter: blur(70px);
            border-radius: 50%;

            pointer-events: none;
        }

        .section-title {
            color: #39ff88;

            font-size: 16px;
            font-weight: bold;

            margin-bottom: 25px;

            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::before {
            content: "";

            width: 4px;
            height: 18px;

            background: #39ff88;
            border-radius: 10px;

            box-shadow: 0 0 10px rgba(57,255,136,.5);
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;

            margin-bottom: 9px;

            color: #e8f3ed;
            font-size: 14px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;

            padding: 14px 15px;

            background: rgba(3, 12, 8, .85);
            color: #ffffff;

            border: 1px solid #234b39;
            border-radius: 11px;

            font-size: 14px;

            outline: none;

            transition: .25s ease;
        }

        input::placeholder,
        textarea::placeholder {
            color: #60766c;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #39ff88;

            box-shadow:
                0 0 0 3px rgba(57,255,136,.08),
                0 0 20px rgba(57,255,136,.05);
        }

        select {
            cursor: pointer;
        }

        select option {
            background: #07140e;
            color: #ffffff;
        }

        textarea {
            min-height: 125px;
            resize: vertical;
            line-height: 1.6;
        }

        /* =========================
           CHECKBOX MINAT
        ========================= */

        .minat {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .minat label {
            display: flex;
            align-items: center;

            background: rgba(3,12,8,.75);

            border: 1px solid #234b39;
            border-radius: 11px;

            padding: 14px;

            cursor: pointer;

            font-weight: normal;
            color: #b9cbc2;

            transition: .25s ease;
        }

        .minat label:hover {
            border-color: rgba(57,255,136,.55);
            background: rgba(57,255,136,.05);
            color: #ffffff;

            transform: translateY(-2px);
        }

        .minat input {
            width: 17px;
            height: 17px;

            margin-right: 10px;

            accent-color: #39ff88;

            cursor: pointer;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn {
            width: 100%;

            padding: 15px;

            border: none;
            border-radius: 11px;

            background: #39ff88;
            color: #031008;

            font-size: 15px;
            font-weight: bold;

            cursor: pointer;

            margin-top: 8px;

            box-shadow:
                0 0 25px rgba(57,255,136,.14);

            transition: .25s ease;
        }

        .btn:hover {
            background: #62ffa1;

            transform: translateY(-2px);

            box-shadow:
                0 8px 30px rgba(57,255,136,.20);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* =========================
           INFO BOX
        ========================= */

        .info-box {
            margin-top: 22px;

            padding: 18px 20px;

            border-radius: 13px;

            background: rgba(57,255,136,.045);
            border: 1px solid rgba(57,255,136,.14);

            color: #8fa79b;

            font-size: 13px;
            line-height: 1.7;
        }

        .info-box strong {
            color: #39ff88;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            border-top: 1px solid rgba(57,255,136,.12);

            text-align: center;

            padding: 28px 20px;

            color: #667b71;

            font-size: 13px;
        }

        footer span {
            color: #39ff88;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1050px) {

            .navbar {
                flex-direction: column;
                padding: 18px 4%;
            }

            .nav-menu {
                justify-content: center;
            }

        }

        @media (max-width: 650px) {

            .container {
                width: 94%;
                margin-top: 35px;
            }

            .form-box {
                padding: 24px 20px;
                border-radius: 17px;
            }

            .minat {
                grid-template-columns: 1fr;
            }

            .nav-menu a {
                font-size: 12px;
                padding: 8px;
            }

            .page-header h1 {
                font-size: 30px;
            }

        }

        @media (max-width: 430px) {

            .logo {
                font-size: 20px;
            }

            .nav-menu {
                gap: 2px;
            }

            .nav-menu a {
                font-size: 11px;
                padding: 7px 6px;
            }

            .form-box {
                padding: 20px 16px;
            }

        }
    </style>
</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<header>
    <div class="navbar">

        <a href="index.php" class="logo">
            &lt;KursusKu/&gt;
            <span class="logo-dot"></span>
        </a>

        <nav class="nav-menu">

            <a href="index.php">Katalog</a>

            <a href="index.php#kursus">Kursus</a>

            <a href="registration.php" class="active">
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

            <a href="history.php">
                Riwayat
            </a>

            <a href="index.php#kontak">
                Kontak
            </a>

        </nav>

    </div>
</header>


<!-- =========================
     MAIN CONTENT
========================= -->

<main class="container">

    <div class="page-header">

        <div class="badge">
            REGISTRATION SYSTEM
        </div>

        <h1>
            Form <span>Registrasi Kursus</span>
        </h1>

        <p>
            Lengkapi data berikut untuk mendaftar
            dan mulai belajar bersama KursusKu.
        </p>

    </div>


    <div class="form-box">

        <div class="section-title">
            Data Pendaftaran
        </div>


        <form action="#" method="POST">

            <!-- Nama Lengkap -->
            <div class="form-group">

                <label for="nama">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            <!-- Email -->
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="contoh@email.com"
                    required
                >

            </div>


            <!-- No HP -->
            <div class="form-group">

                <label for="hp">
                    No. HP / WhatsApp
                </label>

                <input
                    type="tel"
                    id="hp"
                    name="hp"
                    placeholder="08xxxxxxxxxx"
                    required
                >

            </div>


            <!-- Program Studi -->
            <div class="form-group">

                <label for="prodi">
                    Program Studi
                </label>

                <input
                    type="text"
                    id="prodi"
                    name="prodi"
                    placeholder="Contoh: Pendidikan Teknik Informatika dan Komputer"
                    required
                >

            </div>


            <!-- Kursus -->
            <div class="form-group">

                <label for="kursus">
                    Kursus yang Dipilih
                </label>

                <select
                    id="kursus"
                    name="kursus"
                    required
                >

                    <option value="">
                        -- Pilih Kursus --
                    </option>

                    <?php foreach ($kursus as $item): ?>

                        <option
                            value="<?= htmlspecialchars($item['nama']) ?>"
                            <?= ($kursusDipilih == $item['nama']) ? 'selected' : '' ?>
                        >

                            <?= htmlspecialchars($item['nama']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- Jenis Peserta -->
            <div class="form-group">

                <label for="jenis_peserta">
                    Jenis Peserta
                </label>

                <select
                    id="jenis_peserta"
                    name="jenis_peserta"
                    required
                >

                    <option value="">
                        -- Pilih Jenis Peserta --
                    </option>

                    <option value="Pelajar">
                        Pelajar
                    </option>

                    <option value="Mahasiswa">
                        Mahasiswa
                    </option>

                    <option value="Umum">
                        Umum
                    </option>

                </select>

            </div>


            <!-- Minat Tambahan -->
            <div class="form-group">

                <label>
                    Minat Tambahan
                </label>

                <div class="minat">

                    <label>
                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Pemrograman"
                        >
                        Pemrograman
                    </label>


                    <label>
                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Web Development"
                        >
                        Web Development
                    </label>


                    <label>
                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Database"
                        >
                        Database
                    </label>


                    <label>
                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Jaringan"
                        >
                        Jaringan Komputer
                    </label>


                    <label>
                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Desain"
                        >
                        Desain
                    </label>


                    <label>
                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Data"
                        >
                        Data & Analisis
                    </label>

                </div>

            </div>


            <!-- Catatan -->
            <div class="form-group">

                <label for="catatan">
                    Catatan
                </label>

                <textarea
                    id="catatan"
                    name="catatan"
                    placeholder="Tuliskan pertanyaan atau kebutuhan khusus..."
                ></textarea>

            </div>


            <!-- Tombol -->
            <button
                type="submit"
                class="btn"
            >
                &gt; Daftar Sekarang
            </button>

        </form>


        <div class="info-box">

            <strong>Info:</strong>
            Pastikan data yang kamu masukkan sudah benar
            sebelum menekan tombol
            <strong>Daftar Sekarang</strong>.

        </div>

    </div>

</main>


<!-- =========================
     FOOTER
========================= -->

<footer>

    <span>&lt;KursusKu/&gt;</span>
    — Belajar Teknologi, Bangun Masa Depan
    • © <?= $tahun ?>

</footer>

</body>
</html>