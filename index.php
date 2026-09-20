```php
<?php
require_once 'helpers.php';

$kursus = getKursus();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KursusKu - Belajar Skill Baru</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        /* ================= HEADER ================= */

        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(15, 23, 42, 0.97);
            padding: 15px 7%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
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
            align-items: center;
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
            color: white;
            background: #2563eb;
        }

        /* ================= HERO ================= */

        .hero {
            min-height: 570px;
            padding: 80px 7%;
            display: flex;
            align-items: center;
            background:
                linear-gradient(135deg, #0f172a, #1d4ed8, #7c3aed);
            color: white;
        }

        .hero-content {
            max-width: 1200px;
            width: 100%;
            margin: auto;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 50px;
            align-items: center;
        }

        .badge {
            display: inline-block;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.25);
            padding: 9px 16px;
            border-radius: 30px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .hero h1 {
            font-size: 52px;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: #93c5fd;
        }

        .hero p {
            color: #dbeafe;
            font-size: 18px;
            line-height: 1.7;
            max-width: 600px;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 14px 22px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary {
            background: white;
            color: #1d4ed8;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .btn-secondary {
            border: 1px solid rgba(255,255,255,0.4);
            color: white;
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.12);
        }

        .hero-image img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 25px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.35);
            border: 5px solid rgba(255,255,255,0.15);
        }

        /* ================= BELAJAR BERSAMA ================= */

        .belajar-section {
            max-width: 1200px;
            width: 86%;
            margin: 80px auto;
            padding: 45px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;

            background: white;
            border-radius: 25px;
            box-shadow: 0 12px 35px rgba(15,23,42,0.08);
        }

        .belajar-image {
            position: relative;
        }

        .belajar-image img {
            width: 100%;
            height: 350px;
            display: block;
            object-fit: cover;
            border-radius: 20px;
        }

        .image-badge {
            position: absolute;
            left: 20px;
            bottom: 20px;

            background: rgba(15, 23, 42, 0.92);
            color: white;

            padding: 12px 18px;
            border-radius: 12px;

            font-size: 14px;
            font-weight: bold;

            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
        }

        .belajar-content .small-title {
            display: inline-block;
            color: #2563eb;
            background: #eff6ff;

            padding: 7px 13px;
            border-radius: 20px;

            font-size: 13px;
            font-weight: bold;

            margin-bottom: 15px;
        }

        .belajar-content h2 {
            font-size: 38px;
            color: #0f172a;
            line-height: 1.2;
            margin-bottom: 18px;
        }

        .belajar-content h2 span {
            color: #2563eb;
        }

        .belajar-content p {
            color: #64748b;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        /* ================= BENEFITS ================= */

        .benefits {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .benefit {
            display: flex;
            align-items: center;
            gap: 10px;

            padding: 12px;

            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;

            color: #334155;
            font-size: 14px;
            font-weight: bold;

            transition: 0.3s;
        }

        .benefit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(15,23,42,0.08);
        }

        .benefit-icon {
            width: 35px;
            height: 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #dbeafe;
            border-radius: 9px;

            flex-shrink: 0;
        }

        /* ================= KATALOG ================= */

        .container {
            width: 86%;
            max-width: 1200px;
            margin: 70px auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 36px;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #64748b;
            font-size: 16px;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .course-card {
            background: white;
            padding: 25px;

            border-radius: 18px;
            border: 1px solid #e2e8f0;

            box-shadow: 0 8px 25px rgba(15,23,42,0.06);

            transition: 0.3s;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(15,23,42,0.12);
        }

        .course-icon {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #eff6ff;
            border-radius: 14px;

            font-size: 27px;
            margin-bottom: 18px;
        }

        .category {
            display: inline-block;

            color: #2563eb;
            background: #eff6ff;

            padding: 6px 10px;
            border-radius: 20px;

            font-size: 12px;
            font-weight: bold;

            margin-bottom: 12px;
        }

        .course-card h3 {
            font-size: 20px;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .price {
            font-size: 21px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 15px;
        }

        .info {
            color: #64748b;
            margin-bottom: 14px;
            font-size: 14px;
        }

        .status {
            display: inline-block;

            padding: 7px 13px;
            border-radius: 20px;

            font-size: 12px;
            font-weight: bold;
        }

        .status-full {
            background: #fee2e2;
            color: #dc2626;
        }

        .status-available {
            background: #dcfce7;
            color: #16a34a;
        }

        .capacity {
            height: 8px;
            background: #e2e8f0;

            border-radius: 20px;
            overflow: hidden;

            margin-top: 17px;
        }

        .capacity-bar {
            height: 100%;

            background:
                linear-gradient(90deg, #2563eb, #7c3aed);

            border-radius: 20px;
        }

        /* ================= VIDEO ================= */

        .media {
            margin-top: 70px;

            background: white;
            padding: 40px;

            border-radius: 20px;

            text-align: center;

            box-shadow: 0 8px 25px rgba(15,23,42,0.06);
        }

        .media h2 {
            font-size: 30px;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .media p {
            color: #64748b;
            margin-bottom: 25px;
        }

        video {
            width: 100%;
            max-width: 800px;
            border-radius: 15px;
        }

        /* ================= FOOTER ================= */

        footer {
            background: #0f172a;
            color: #cbd5e1;

            text-align: center;

            padding: 30px;

            margin-top: 80px;
        }

        footer strong {
            color: white;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .belajar-section {
                grid-template-columns: 1fr;
            }

            .course-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-image img {
                height: 280px;
            }
        }

        @media (max-width: 600px) {

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

            .hero {
                padding: 60px 5%;
            }

            .hero h1 {
                font-size: 38px;
            }

            .hero p {
                font-size: 16px;
            }

            .hero-image img {
                height: 220px;
            }

            .belajar-section {
                width: 90%;
                padding: 25px;
                margin: 50px auto;
            }

            .belajar-image img {
                height: 230px;
            }

            .belajar-content h2 {
                font-size: 30px;
            }

            .benefits {
                grid-template-columns: 1fr;
            }

            .container {
                width: 90%;
                margin: 50px auto;
            }

            .course-grid {
                grid-template-columns: 1fr;
            }

            .media {
                padding: 25px 15px;
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

            <a href="index.php" class="active">
                Katalog
            </a>

            <a href="fee-calculator.php">
                Kalkulator
            </a>

            <a href="server-time.php">
                Server Time
            </a>

        </div>

    </nav>

</header>


<!-- ================= HERO ================= -->

<section class="hero">

    <div class="hero-content">

        <div>

            <div class="badge">
                🚀 Platform Belajar Online
            </div>

            <h1>
                Tingkatkan Skill,
                <span>Bangun Masa Depan.</span>
            </h1>

            <p>
                Temukan berbagai kursus pilihan di KursusKu.
                Belajar teknologi, desain, data, dan digital marketing
                dengan cara yang lebih mudah dan menyenangkan.
            </p>

            <div class="hero-buttons">

                <a
                    href="#kursus"
                    class="btn btn-primary"
                >
                    📚 Lihat Kursus
                </a>

                <a
                    href="fee-calculator.php"
                    class="btn btn-secondary"
                >
                    🧮 Hitung Biaya
                </a>

            </div>

        </div>


        <div class="hero-image">

            <img
                src="assets/images/hero-kursus.png"
                alt="Belajar bersama KursusKu"
            >

        </div>

    </div>

</section>


<!-- ================= BELAJAR BERSAMA ================= -->

<section class="belajar-section">

    <div class="belajar-image">

        <img
            src="assets/images/hero-kursus.png"
            alt="Belajar Bersama KursusKu"
        >

        <div class="image-badge">
            🎓 Belajar Bersama KursusKu
        </div>

    </div>


    <div class="belajar-content">

        <div class="small-title">
            ✨ Pengalaman Belajar
        </div>

        <h2>
            Belajar Bersama
            <span>KursusKu</span>
        </h2>

        <p>
            KursusKu hadir untuk membantu kamu mengembangkan
            kemampuan dan mempelajari skill baru. Pilih kursus
            yang sesuai dengan minatmu dan mulai perjalanan
            belajar untuk membangun masa depan yang lebih baik.
        </p>


        <div class="benefits">

            <div class="benefit">

                <div class="benefit-icon">
                    📚
                </div>

                Materi Beragam

            </div>


            <div class="benefit">

                <div class="benefit-icon">
                    💻
                </div>

                Belajar Teknologi

            </div>


            <div class="benefit">

                <div class="benefit-icon">
                    🎯
                </div>

                Sesuai Tujuan

            </div>


            <div class="benefit">

                <div class="benefit-icon">
                    🚀
                </div>

                Tingkatkan Skill

            </div>

        </div>

    </div>

</section>


<!-- ================= KATALOG ================= -->

<main
    class="container"
    id="kursus"
>

    <div class="section-title">

        <h2>
            Katalog Kursus
        </h2>

        <p>
            Pilih kursus yang sesuai dengan kebutuhan dan tujuanmu.
        </p>

    </div>


    <div class="course-grid">

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

                $statusClass = getStatusClass($status);

            ?>


            <div class="course-card">

                <div class="course-icon">
                    🎓
                </div>


                <div class="category">

                    <?= htmlspecialchars(
                        $item['kategori']
                    ); ?>

                </div>


                <h3>

                    <?= htmlspecialchars(
                        $item['nama']
                    ); ?>

                </h3>


                <div class="price">

                    <?= formatRupiah(
                        $item['harga']
                    ); ?>

                </div>


                <div class="info">

                    👥
                    <?= $item['peserta']; ?>

                    peserta dari

                    <?= $item['kapasitas']; ?>

                    kapasitas

                </div>


                <span
                    class="status <?= $statusClass; ?>"
                >

                    <?= $status; ?>

                </span>


                <div class="capacity">

                    <div
                        class="capacity-bar"
                        style="width: <?= min(
                            $persentase,
                            100
                        ); ?>%;"
                    ></div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>


    <!-- ================= VIDEO ================= -->

    <section class="media">

        <h2>
            🎬 Kenali KursusKu
        </h2>

        <p>
            Lihat video perkenalan dan kenali pengalaman belajar
            yang tersedia di KursusKu.
        </p>


        <video controls>

            <source
                src="assets/video/intro-kursus.mp4"
                type="video/mp4"
            >

            Browser Anda tidak mendukung video.

        </video>

    </section>

</main>


<!-- ================= FOOTER ================= -->

<footer>

    <p>

        &copy;
        <?= date('Y'); ?>

        <strong>KursusKu</strong>.

        Belajar Skill Baru,
        Bangun Masa Depan.

    </p>

</footer>

</body>
</html>
```
