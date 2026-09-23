```php
<?php
require_once 'helpers.php';

$siteName = "KursusKu";
$tagline = "Belajar Teknologi, Bangun Masa Depan";
$tahun = date("Y");

$kursus = getKursus();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $siteName; ?> | Katalog Kursus</title>

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
            font-family: Arial, sans-serif;
            background: #07110d;
            color: #eafff1;
            line-height: 1.6;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: 90%;
            max-width: 1150px;
            margin: auto;
        }

        /* ================= HEADER ================= */

        header {
            background: rgba(2, 8, 7, 0.96);
            border-bottom: 1px solid #174d2d;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 0 25px rgba(57, 255, 136, .08);
            backdrop-filter: blur(10px);
        }

        .nav {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #39ff88;
            text-shadow: 0 0 12px rgba(57, 255, 136, .5);
        }

        .logo span {
            color: #eafff1;
        }

        nav {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        nav a {
            padding: 9px 13px;
            color: #9db2a5;
            border-radius: 8px;
            transition: .3s;
            font-size: 14px;
        }

        nav a:hover,
        nav a.active {
            color: #39ff88;
            background: #0d2116;
            box-shadow: 0 0 12px rgba(57, 255, 136, .12);
        }

        /* ================= HERO ================= */

        .hero {
            padding: 90px 0;
            background:
                radial-gradient(circle at 80% 20%, rgba(57,255,136,.08), transparent 30%),
                linear-gradient(135deg, rgba(2,8,7,.98), rgba(5,35,19,.94)),
                repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 39px,
                    rgba(57,255,136,.035) 40px
                );
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            border: 1px solid rgba(57,255,136,.08);
            border-radius: 50%;
            right: -100px;
            top: 80px;
            box-shadow:
                0 0 0 30px rgba(57,255,136,.02),
                0 0 0 60px rgba(57,255,136,.015);
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 50px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .badge {
            display: inline-block;
            color: #39ff88;
            border: 1px solid #1d6b3c;
            background: #0a1b11;
            padding: 8px 14px;
            border-radius: 30px;
            font-family: monospace;
            margin-bottom: 20px;
            box-shadow: 0 0 15px rgba(57,255,136,.08);
        }

        .hero h1 {
            font-size: clamp(40px, 6vw, 68px);
            line-height: 1.05;
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: #39ff88;
            text-shadow: 0 0 20px rgba(57,255,136,.35);
        }

        .hero p {
            color: #9db2a5;
            max-width: 620px;
            font-size: 17px;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 13px 20px;
            border-radius: 9px;
            font-weight: bold;
            border: 1px solid #39ff88;
            transition: .3s;
        }

        .btn-primary {
            background: #39ff88;
            color: #031108;
            box-shadow: 0 0 20px rgba(57,255,136,.18);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(57,255,136,.35);
        }

        .btn-secondary {
            color: #39ff88;
            background: #0a1710;
        }

        .btn-secondary:hover {
            background: #102619;
            transform: translateY(-3px);
        }

        .hero-image {
            background: linear-gradient(145deg, #0d2116, #07110d);
            border: 1px solid #1c5733;
            padding: 10px;
            border-radius: 18px;
            box-shadow: 0 0 35px rgba(57,255,136,.10);
            transition: .4s;
        }

        .hero-image:hover {
            transform: translateY(-6px);
            box-shadow: 0 0 45px rgba(57,255,136,.18);
        }

        .hero-image img {
            width: 100%;
            display: block;
            border-radius: 12px;
        }

        /* ================= STATS ================= */

        .stats {
            margin-top: -35px;
            position: relative;
            z-index: 5;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .stat {
            background: #0a1710;
            border: 1px solid #173d27;
            border-radius: 14px;
            padding: 22px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,.25);
        }

        .stat h3 {
            color: #39ff88;
            font-size: 28px;
            margin-bottom: 4px;
        }

        .stat p {
            color: #91a59a;
            font-size: 14px;
        }

        /* ================= SECTION ================= */

        section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 45px;
        }

        .section-title small {
            color: #39ff88;
            font-family: monospace;
        }

        .section-title h2 {
            font-size: 35px;
            margin: 8px 0;
        }

        .section-title p {
            color: #91a59a;
        }

        /* ================= BENEFITS ================= */

        .benefits {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .benefit {
            background: linear-gradient(145deg, #0a1710, #08130d);
            border: 1px solid #173d27;
            border-radius: 14px;
            padding: 28px;
            transition: .3s;
        }

        .benefit:hover {
            transform: translateY(-6px);
            border-color: #39ff88;
            box-shadow: 0 0 25px rgba(57,255,136,.08);
        }

        .icon {
            font-size: 35px;
            margin-bottom: 14px;
        }

        .benefit h3 {
            margin-bottom: 8px;
        }

        .benefit p {
            color: #91a59a;
        }

        /* ================= COURSES ================= */

        .courses {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .course-card {
            position: relative;
            background: linear-gradient(145deg, #0a1710, #08130d);
            border: 1px solid #173d27;
            border-radius: 16px;
            padding: 25px;
            transition: .35s;
            overflow: hidden;
        }

        .course-card::before {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(57,255,136,.06);
            border-radius: 50%;
            right: -45px;
            top: -45px;
        }

        .course-card:hover {
            transform: translateY(-7px);
            border-color: #39ff88;
            box-shadow: 0 0 30px rgba(57,255,136,.10);
        }

        .category {
            display: inline-block;
            color: #39ff88;
            font-size: 13px;
            font-family: monospace;
            margin-bottom: 12px;
        }

        .course-card h3 {
            min-height: 52px;
            margin-bottom: 15px;
            font-size: 20px;
        }

        .price {
            color: #39ff88;
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .participants {
            color: #91a59a;
            font-size: 14px;
        }

        /* STATUS */

        .status {
            display: inline-block;
            margin-top: 15px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .status-available {
            color: #39ff88;
            background: #0c2b18;
        }

        .status-full {
            color: #ff7979;
            background: #321313;
        }

        /* PROGRESS */

        .progress {
            height: 7px;
            background: #17231b;
            border-radius: 10px;
            margin-top: 12px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: #39ff88;
            box-shadow: 0 0 10px rgba(57,255,136,.4);
            border-radius: 10px;
        }

        /* BUTTON DAFTAR */

        .btn-daftar {
            display: block;
            width: 100%;
            margin-top: 18px;
            padding: 12px;
            text-align: center;
            background: #39ff88;
            color: #031108;
            border: 1px solid #39ff88;
            border-radius: 9px;
            font-weight: bold;
            transition: .3s;
        }

        .btn-daftar:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(57,255,136,.3);
        }

        /* ================= VIDEO ================= */

        .video-section {
            background:
                linear-gradient(
                    180deg,
                    #07110d,
                    #09180f
                );
        }

        .video-box {
            max-width: 850px;
            margin: auto;
            background: #0a1710;
            border: 1px solid #173d27;
            border-radius: 16px;
            padding: 12px;
            box-shadow: 0 0 30px rgba(57,255,136,.08);
        }

        video {
            width: 100%;
            border-radius: 10px;
            display: block;
        }

        /* ================= CONTACT ================= */

        .contact {
            background: #07110d;
        }

        .contact-box {
            max-width: 650px;
            margin: auto;
            padding: 40px;
            text-align: center;
            background: linear-gradient(145deg, #0a1710, #08130d);
            border: 1px solid #173d27;
            border-radius: 16px;
            box-shadow: 0 0 30px rgba(57,255,136,.08);
        }

        .contact-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .contact-box h3 {
            color: #39ff88;
            font-size: 24px;
            margin-bottom: 8px;
        }

        .contact-box p {
            color: #91a59a;
            margin-bottom: 22px;
        }

        /* ================= FOOTER ================= */

        footer {
            border-top: 1px solid #173d27;
            background: #020807;
            text-align: center;
            padding: 28px;
            color: #72847a;
        }

        footer span {
            color: #39ff88;
        }

        /* ================= MOBILE ================= */

        @media (max-width: 900px) {

            .hero-grid {
                grid-template-columns: 1fr;
            }

            .benefits,
            .courses {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {

            .container {
                width: 92%;
            }

            .nav {
                padding: 14px 0;
                flex-direction: column;
            }

            nav {
                justify-content: center;
            }

            .hero {
                padding: 65px 0;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero p {
                font-size: 15px;
            }

            .stats-grid,
            .benefits,
            .courses {
                grid-template-columns: 1fr;
            }

            .stats {
                margin-top: 20px;
            }

            section {
                padding: 60px 0;
            }

            .section-title h2 {
                font-size: 29px;
            }

            .contact-box {
                padding: 28px 20px;
            }
        }
    </style>
</head>

<body>

<!-- ================= HEADER ================= -->

<header>

    <div class="container nav">

        <a href="index.php" class="logo">
            &lt;Kursus<span>Ku/&gt;</span>
        </a>

        <nav>

            <a href="index.php" class="active">
                Katalog
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

        </nav>

    </div>

</header>


<!-- ================= HERO ================= -->

<main>

<section class="hero">

    <div class="container hero-grid">

        <div>

            <div class="badge">
                $ coding --start
            </div>

            <h1>
                Belajar Coding,
                <br>
                <span>Bangun Masa Depan.</span>
            </h1>

            <p>
                Tingkatkan kemampuan teknologi dengan berbagai kursus
                praktis di KursusKu. Belajar lebih mudah, terarah,
                dan sesuai kebutuhan dunia digital.
            </p>

            <div class="buttons">

                <a href="#kursus" class="btn btn-primary">
                    &gt;_ Lihat Kursus
                </a>

                <a href="registration.php" class="btn btn-secondary">
                    📝 Registrasi
                </a>

            </div>

        </div>


        <div class="hero-image">

            <img
                src="assets/images/hero-kursus.png"
                alt="KursusKu - Belajar Teknologi"
            >

        </div>

    </div>

</section>


<!-- ================= STATISTIK ================= -->

<section class="stats">

    <div class="container stats-grid">

        <div class="stat">
            <h3>6+</h3>
            <p>Pilihan Kursus</p>
        </div>

        <div class="stat">
            <h3>100+</h3>
            <p>Slot Peserta</p>
        </div>

        <div class="stat">
            <h3>24/7</h3>
            <p>Akses Informasi</p>
        </div>

    </div>

</section>


<!-- ================= BENEFITS ================= -->

<section>

    <div class="container">

        <div class="section-title">

            <small>// kenapa_kursusku</small>

            <h2>
                Belajar Bersama KursusKu
            </h2>

            <p>
                Dirancang untuk membantu kamu berkembang di dunia teknologi.
            </p>

        </div>


        <div class="benefits">

            <div class="benefit">

                <div class="icon">
                    💻
                </div>

                <h3>
                    Materi Praktis
                </h3>

                <p>
                    Materi mudah dipahami dan dapat langsung dipraktikkan.
                </p>

            </div>


            <div class="benefit">

                <div class="icon">
                    🚀
                </div>

                <h3>
                    Skill Masa Kini
                </h3>

                <p>
                    Pelajari teknologi yang banyak digunakan di dunia digital.
                </p>

            </div>


            <div class="benefit">

                <div class="icon">
                    🎯
                </div>

                <h3>
                    Belajar Terarah
                </h3>

                <p>
                    Susunan kursus membantu proses belajar menjadi lebih terarah.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- ================= KATALOG ================= -->

<section id="kursus">

    <div class="container">

        <div class="section-title">

            <small>// available_courses</small>

            <h2>
                Katalog Kursus
            </h2>

            <p>
                Pilih kursus yang ingin kamu pelajari.
            </p>

        </div>


        <div class="courses">

            <?php foreach ($kursus as $item): ?>

                <?php

                $status = getStatusKursus(
                    $item['peserta'],
                    $item['kapasitas']
                );

                $persentase = getPersentaseKapasitas(
                    $item['peserta'],
                    $item['kapasitas']
                );

                ?>

                <div class="course-card">

                    <span class="category">
                        &lt;<?= htmlspecialchars($item['kategori']); ?>/&gt;
                    </span>

                    <h3>
                        <?= htmlspecialchars($item['nama']); ?>
                    </h3>

                    <div class="price">
                        <?= formatRupiah($item['harga']); ?>
                    </div>

                    <div class="participants">

                        👥
                        <?= $item['peserta']; ?>
                        /
                        <?= $item['kapasitas']; ?>
                        peserta

                    </div>


                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="width: <?= min($persentase, 100); ?>%;">
                        </div>

                    </div>


                    <span class="status <?= getStatusClass($status); ?>">
                        <?= htmlspecialchars($status); ?>
                    </span>


                    <!-- TOMBOL REGISTRASI -->

                    <a
                        href="registration.php?kursus=<?= urlencode($item['nama']); ?>"
                        class="btn-daftar"
                    >
                        📝 Daftar Sekarang
                    </a>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- ================= VIDEO ================= -->

<section class="video-section">

    <div class="container">

        <div class="section-title">

            <small>// intro_video</small>

            <h2>
                Kenalan dengan KursusKu
            </h2>

            <p>
                Lihat gambaran singkat tentang KursusKu.
            </p>

        </div>


        <div class="video-box">

            <video controls>

                <source
                    src="assets/video/intro-kursus.mp4"
                    type="video/mp4"
                >

                Browser kamu tidak mendukung video.

            </video>

        </div>

    </div>

</section>


<!-- ================= KONTAK ================= -->

<section class="contact">

    <div class="container">

        <div class="section-title">

            <small>// contact</small>

            <h2>
                Hubungi Kami
            </h2>

            <p>
                Ada pertanyaan tentang kursus?
                Silakan hubungi kami melalui WhatsApp.
            </p>

        </div>


        <div class="contact-box">

            <div class="contact-icon">
                📱
            </div>

            <h3>
                Muhammad Hafiz
            </h3>

            <p>
                WhatsApp: 085213315418
            </p>

            <a
                href="https://wa.me/6285213315418"
                target="_blank"
                rel="noopener noreferrer"
                class="btn btn-primary"
            >
                💬 Hubungi via WhatsApp
            </a>

        </div>

    </div>

</section>

</main>


<!-- ================= FOOTER ================= -->

<footer>

    &lt;Kursus<span>Ku/&gt;</span>
    —
    <?= $tagline; ?>
    © <?= $tahun; ?>

</footer>


</body>
</html>
```
