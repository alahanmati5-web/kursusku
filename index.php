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

        header {
            background: #020807;
            border-bottom: 1px solid #174d2d;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 0 20px rgba(57,255,136,.08);
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

        .logo span {
            color: #eafff1;
        }

        nav {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        nav a {
            padding: 9px 14px;
            color: #9db2a5;
            border-radius: 8px;
            transition: .3s;
        }

        nav a:hover,
        nav a.active {
            color: #39ff88;
            background: #0d2116;
            box-shadow: 0 0 12px rgba(57,255,136,.12);
        }

        /* HERO */

        .hero {
            padding: 80px 0;
            background:
                linear-gradient(135deg, rgba(2,8,7,.95), rgba(5,35,19,.9)),
                repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 39px,
                    rgba(57,255,136,.035) 40px
                );
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 50px;
            align-items: center;
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
        }

        .hero h1 {
            font-size: clamp(38px, 6vw, 64px);
            line-height: 1.05;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #39ff88;
            text-shadow: 0 0 20px rgba(57,255,136,.35);
        }

        .hero p {
            color: #9db2a5;
            max-width: 600px;
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
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(57,255,136,.35);
        }

        .btn-secondary {
            color: #39ff88;
            background: #0a1710;
        }

        .btn-secondary:hover {
            background: #102619;
        }

        .hero-image {
            background: #0a1710;
            border: 1px solid #1c5733;
            padding: 10px;
            border-radius: 16px;
            box-shadow: 0 0 35px rgba(57,255,136,.08);
        }

        .hero-image img {
            width: 100%;
            display: block;
            border-radius: 10px;
        }

        /* SECTION */

        section {
            padding: 70px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title small {
            color: #39ff88;
            font-family: monospace;
        }

        .section-title h2 {
            font-size: 34px;
            margin: 8px 0;
        }

        .section-title p {
            color: #91a59a;
        }

        /* BENEFITS */

        .benefits {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .benefit,
        .course-card,
        .video-box {
            background: #0a1710;
            border: 1px solid #173d27;
            border-radius: 14px;
            padding: 24px;
            transition: .3s;
        }

        .benefit:hover,
        .course-card:hover {
            transform: translateY(-5px);
            border-color: #39ff88;
            box-shadow: 0 0 25px rgba(57,255,136,.08);
        }

        .icon {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .benefit h3 {
            margin-bottom: 8px;
        }

        .benefit p {
            color: #91a59a;
        }

        /* COURSES */

        .courses {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .course-card {
            position: relative;
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
        }

        /* VIDEO */

        .video-box {
            max-width: 850px;
            margin: auto;
        }

        video {
            width: 100%;
            border-radius: 10px;
            display: block;
        }

        /* CONTACT */

        .contact {
            background: #07110d;
        }

        .contact-box {
            max-width: 600px;
            margin: auto;
            padding: 35px;
            text-align: center;
            background: #0a1710;
            border: 1px solid #173d27;
            border-radius: 14px;
            box-shadow: 0 0 25px rgba(57,255,136,.08);
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

        /* FOOTER */

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

        /* MOBILE */

        @media (max-width: 800px) {

            .hero-grid {
                grid-template-columns: 1fr;
            }

            .benefits,
            .courses {
                grid-template-columns: 1fr;
            }

            .nav {
                padding: 12px 0;
                flex-direction: column;
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

            <a href="index.php" class="active">
                Katalog
            </a>

            <a href="fee-calculator.php">
                Kalkulator
            </a>

            <a href="server-time.php">
                Server Time
            </a>

        </nav>

    </div>

</header>


<main>

<!-- HERO -->

<section class="hero">

    <div class="container hero-grid">

        <div>

            <div class="badge">
                $ coding --start
            </div>

            <h1>
                Belajar Coding,<br>
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

                <a href="fee-calculator.php" class="btn btn-secondary">
                    🧮 Kalkulator
                </a>

            </div>

        </div>

        <div class="hero-image">

            <img
                src="assets/images/hero-kursus.png"
                alt="KursusKu"
            >

        </div>

    </div>

</section>


<!-- BENEFITS -->

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


<!-- KATALOG -->

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

                        <?= $status; ?>

                    </span>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- VIDEO -->

<section>

    <div class="container">

        <div class="section-title">

            <small>// intro_video</small>

            <h2>
                Kenalan dengan KursusKu
            </h2>

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


<!-- KONTAK WHATSAPP -->

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
                class="btn btn-primary"
            >
                💬 Hubungi via WhatsApp
            </a>

        </div>

    </div>

</section>

</main>


<!-- FOOTER -->

<footer>

    &lt;Kursus<span>Ku/&gt;</span>
    —
    <?= $tagline; ?>
    ©
    <?= $tahun; ?>

</footer>


</body>
</html>
```
