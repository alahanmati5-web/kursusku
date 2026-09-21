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

    <title>KursusKu — Belajar Coding & Teknologi</title>

    <style>
        /* =========================
           RESET
        ========================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #07110d;
            color: #e5f9ec;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
        }

        /* =========================
           HEADER
        ========================== */
        header {
            position: sticky;
            top: 0;
            z-index: 1000;

            background: rgba(2, 10, 6, 0.95);
            border-bottom: 1px solid #123d26;
            backdrop-filter: blur(12px);
        }

        .navbar {
            width: 90%;
            max-width: 1200px;
            margin: auto;

            min-height: 75px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;

            font-size: 22px;
            font-weight: bold;
            color: #39ff88;
        }

        .logo::before {
            content: ">_";

            display: flex;
            align-items: center;
            justify-content: center;

            width: 42px;
            height: 42px;

            border: 1px solid #39ff88;
            border-radius: 10px;

            color: #39ff88;
            background: #061b10;

            box-shadow: 0 0 15px rgba(57, 255, 136, 0.25);

            font-family: monospace;
        }

        .logo img {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        nav a {
            padding: 9px 14px;

            color: #a7b9ae;
            font-size: 14px;

            border-radius: 8px;

            transition: 0.3s;
        }

        nav a:hover {
            color: #39ff88;
            background: #0b2517;

            box-shadow: 0 0 12px rgba(57, 255, 136, 0.12);
        }

        /* =========================
           HERO
        ========================== */
        .hero {
            position: relative;
            overflow: hidden;

            min-height: 570px;

            display: flex;
            align-items: center;

            background:
                linear-gradient(
                    135deg,
                    #020807 0%,
                    #062315 50%,
                    #07110d 100%
                );
        }

        /* Efek grid coding */
        .hero::before {
            content: "";

            position: absolute;
            inset: 0;

            background-image:
                linear-gradient(rgba(57,255,136,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(57,255,136,0.05) 1px, transparent 1px);

            background-size: 40px 40px;

            pointer-events: none;
        }

        .hero::after {
            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            right: -120px;
            top: -100px;

            background: #39ff88;
            opacity: 0.08;

            border-radius: 50%;
            filter: blur(80px);
        }

        .hero-container {
            position: relative;
            z-index: 2;

            width: 90%;
            max-width: 1200px;
            margin: auto;

            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 60px;

            padding: 70px 0;
        }

        .hero-content {
            max-width: 650px;
        }

        .code-badge {
            display: inline-block;

            margin-bottom: 20px;
            padding: 8px 14px;

            color: #39ff88;
            background: #061b10;

            border: 1px solid #1e6b3d;
            border-radius: 8px;

            font-family: monospace;
            font-size: 14px;

            box-shadow: 0 0 18px rgba(57, 255, 136, 0.12);
        }

        .hero h1 {
            font-size: clamp(40px, 6vw, 68px);
            line-height: 1.1;

            margin-bottom: 22px;

            color: #f0fff5;
        }

        .hero h1 span {
            color: #39ff88;

            text-shadow:
                0 0 10px rgba(57,255,136,0.6),
                0 0 30px rgba(57,255,136,0.25);
        }

        .hero p {
            max-width: 600px;

            margin-bottom: 30px;

            color: #9db1a4;
            font-size: 17px;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 13px 20px;

            border-radius: 8px;

            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary {
            color: #021008;
            background: #39ff88;

            box-shadow:
                0 0 15px rgba(57,255,136,0.35);
        }

        .btn-primary:hover {
            transform: translateY(-3px);

            box-shadow:
                0 0 25px rgba(57,255,136,0.55);
        }

        .btn-secondary {
            color: #39ff88;

            border: 1px solid #1e6b3d;
            background: #06140c;
        }

        .btn-secondary:hover {
            background: #0b2918;
            border-color: #39ff88;
        }

        .hero-image {
            position: relative;
        }

        .hero-image::before {
            content: "</>";

            position: absolute;

            right: -15px;
            top: -18px;

            z-index: 2;

            padding: 10px 13px;

            color: #39ff88;
            background: #020807;

            border: 1px solid #1e6b3d;
            border-radius: 8px;

            font-family: monospace;

            box-shadow: 0 0 20px rgba(57,255,136,0.2);
        }

        .hero-image img {
            width: 100%;
            height: 390px;

            object-fit: cover;

            border-radius: 18px;

            border: 1px solid #1e6b3d;

            box-shadow:
                0 0 35px rgba(57,255,136,0.15);
        }

        /* =========================
           SECTION
        ========================== */
        .section {
            width: 90%;
            max-width: 1200px;

            margin: auto;
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title .terminal {
            display: inline-block;

            margin-bottom: 12px;

            color: #39ff88;

            font-family: monospace;
            font-size: 14px;
        }

        .section-title h2 {
            font-size: 36px;
            color: #f0fff5;
        }

        .section-title p {
            margin-top: 10px;
            color: #91a59a;
        }

        /* =========================
           BELAJAR BERSAMA
        ========================== */
        .belajar {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;

            align-items: center;
            gap: 60px;
        }

        .belajar-image img {
            width: 100%;
            height: 330px;

            object-fit: cover;

            border-radius: 16px;

            border: 1px solid #1e6b3d;

            box-shadow:
                0 0 30px rgba(57,255,136,0.12);
        }

        .belajar-content .tag {
            display: inline-block;

            margin-bottom: 15px;
            padding: 6px 12px;

            color: #39ff88;
            background: #061b10;

            border: 1px solid #1e6b3d;
            border-radius: 6px;

            font-family: monospace;
            font-size: 13px;
        }

        .belajar-content h2 {
            margin-bottom: 18px;

            font-size: 36px;
            color: #f0fff5;
        }

        .belajar-content h2 span {
            color: #39ff88;
        }

        .belajar-content p {
            color: #9caf9f;
            margin-bottom: 25px;
        }

        .benefits {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .benefit {
            padding: 14px;

            background: #0a1710;
            border: 1px solid #163d26;

            border-radius: 10px;

            color: #c7d8cc;
        }

        .benefit span {
            color: #39ff88;
            margin-right: 7px;
        }

        /* =========================
           KATALOG KURSUS
        ========================== */
        .catalog {
            background: #050d08;

            border-top: 1px solid #10291b;
            border-bottom: 1px solid #10291b;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .course-card {
            position: relative;

            padding: 25px;

            background: #0a1710;

            border: 1px solid #173d27;
            border-radius: 14px;

            transition: 0.3s;

            overflow: hidden;
        }

        .course-card::before {
            content: "";

            position: absolute;

            left: 0;
            top: 0;

            width: 100%;
            height: 2px;

            background: #39ff88;

            transform: scaleX(0);
            transform-origin: left;

            transition: 0.3s;
        }

        .course-card:hover {
            transform: translateY(-6px);

            border-color: #287a49;

            box-shadow:
                0 10px 35px rgba(0,0,0,0.4),
                0 0 20px rgba(57,255,136,0.08);
        }

        .course-card:hover::before {
            transform: scaleX(1);
        }

        .course-category {
            display: inline-block;

            margin-bottom: 14px;
            padding: 5px 10px;

            color: #39ff88;
            background: #061b10;

            border: 1px solid #174c2c;
            border-radius: 6px;

            font-size: 12px;
            font-family: monospace;
        }

        .course-card h3 {
            min-height: 55px;

            margin-bottom: 15px;

            color: #edfdf3;
            font-size: 20px;
        }

        .price {
            margin-bottom: 15px;

            color: #39ff88;

            font-size: 22px;
            font-weight: bold;
        }

        .course-info {
            display: flex;
            justify-content: space-between;

            margin-bottom: 10px;

            color: #879b8e;
            font-size: 13px;
        }

        .progress {
            height: 7px;

            margin-bottom: 14px;

            background: #16251c;

            border-radius: 20px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;

            background: #39ff88;

            border-radius: 20px;

            box-shadow:
                0 0 10px rgba(57,255,136,0.5);
        }

        .status {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 6px;

            font-size: 12px;
            font-weight: bold;
        }

        .status-available {
            color: #39ff88;
            background: #092617;
            border: 1px solid #185d35;
        }

        .status-full {
            color: #ff7373;
            background: #2a0e0e;
            border: 1px solid #6d2929;
        }

        /* =========================
           VIDEO
        ========================== */
        .media {
            text-align: center;
        }

        .media video {
            width: 100%;
            max-width: 850px;

            display: block;
            margin: auto;

            border-radius: 15px;

            border: 1px solid #1e6b3d;

            box-shadow:
                0 0 35px rgba(57,255,136,0.12);
        }

        /* =========================
           FOOTER
        ========================== */
        footer {
            padding: 35px 20px;

            text-align: center;

            background: #020807;

            border-top: 1px solid #123d26;

            color: #718277;
        }

        footer strong {
            color: #39ff88;
        }

        .footer-code {
            margin-bottom: 10px;

            color: #39ff88;

            font-family: monospace;
        }

        /* =========================
           RESPONSIVE
        ========================== */
        @media (max-width: 900px) {

            .navbar {
                width: 94%;
            }

            nav {
                gap: 0;
            }

            nav a {
                padding: 8px 9px;
                font-size: 13px;
            }

            .hero-container,
            .belajar {
                grid-template-columns: 1fr;
            }

            .hero-container {
                text-align: center;
            }

            .hero-content {
                margin: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-image {
                max-width: 700px;
                margin: auto;
            }

            .hero-image img,
            .belajar-image img {
                height: 280px;
            }

            .course-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {

            .navbar {
                flex-direction: column;
                padding: 15px 0;
                gap: 10px;
            }

            nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                min-height: auto;
            }

            .hero-container {
                padding: 55px 0;
            }

            .hero h1 {
                font-size: 40px;
            }

            .hero p {
                font-size: 15px;
            }

            .hero-image img,
            .belajar-image img {
                height: 220px;
            }

            .section {
                padding: 60px 0;
            }

            .section-title h2,
            .belajar-content h2 {
                font-size: 29px;
            }

            .course-grid {
                grid-template-columns: 1fr;
            }

            .benefits {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<!-- =========================
     HEADER
========================== -->
<header>
    <div class="navbar">

        <a href="index.php" class="logo">
            KursusKu
        </a>

        <nav>
            <a href="index.php">Katalog</a>
            <a href="fee-calculator.php">Kalkulator</a>
            <a href="server-time.php">Server Time</a>
        </nav>

    </div>
</header>


<!-- =========================
     HERO
========================== -->
<section class="hero">

    <div class="hero-container">

        <div class="hero-content">

            <div class="code-badge">
                &lt; coding /&gt; #BelajarTeknologi
            </div>

            <h1>
                Belajar Coding,
                <span>Bangun Masa Depan.</span>
            </h1>

            <p>
                Tingkatkan kemampuan programming, teknologi,
                desain, dan digital bersama KursusKu.
                Belajar dari dasar hingga siap membuat proyek sendiri.
            </p>

            <div class="hero-buttons">

                <a href="#katalog" class="btn btn-primary">
                    &lt;/&gt; Lihat Kursus
                </a>

                <a href="fee-calculator.php" class="btn btn-secondary">
                    🧮 Kalkulator
                </a>

            </div>

        </div>


        <div class="hero-image">

            <img
                src="assets/images/hero-kursus.png"
                alt="Belajar Programming"
            >

        </div>

    </div>

</section>


<!-- =========================
     BELAJAR BERSAMA
========================== -->
<section class="section">

    <div class="belajar">

        <div class="belajar-image">

            <img
                src="assets/images/kursus-tambahan.png"
                alt="Belajar Coding"
            >

        </div>


        <div class="belajar-content">

            <span class="tag">
                // learn_to_code
            </span>

            <h2>
                Belajar Bersama
                <span>KursusKu</span>
            </h2>

            <p>
                KursusKu dirancang untuk membantu kamu memahami
                teknologi dengan cara yang sederhana, praktis,
                dan mudah dipahami.
            </p>

            <div class="benefits">

                <div class="benefit">
                    <span>✓</span>
                    Materi mudah dipahami
                </div>

                <div class="benefit">
                    <span>✓</span>
                    Praktik langsung
                </div>

                <div class="benefit">
                    <span>✓</span>
                    Materi teknologi terbaru
                </div>

                <div class="benefit">
                    <span>✓</span>
                    Cocok untuk pemula
                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     KATALOG
========================== -->
<section class="catalog" id="katalog">

    <div class="section">

        <div class="section-title">

            <div class="terminal">
                $ kursusku --list-courses
            </div>

            <h2>
                Katalog Kursus
            </h2>

            <p>
                Pilih skill yang ingin kamu pelajari dan mulai coding.
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
                ?>

                <div class="course-card">

                    <span class="course-category">
                        <?= htmlspecialchars($item['kategori']); ?>
                    </span>

                    <h3>
                        <?= htmlspecialchars($item['nama']); ?>
                    </h3>

                    <div class="price">
                        <?= formatRupiah($item['harga']); ?>
                    </div>

                    <div class="course-info">

                        <span>
                            👨‍💻
                            <?= $item['peserta']; ?>
                            peserta
                        </span>

                        <span>
                            <?= $item['kapasitas']; ?>
                            kapasitas
                        </span>

                    </div>

                    <div class="progress">

                        <div
                            class="progress-bar"
                            style="width: <?= min($persentase, 100); ?>%;"
                        ></div>

                    </div>

                    <span class="status <?= getStatusClass($status); ?>">
                        <?= $status; ?>
                    </span>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- =========================
     VIDEO
========================== -->
<section class="section">

    <div class="section-title">

        <div class="terminal">
            $ kursusku --watch-intro
        </div>

        <h2>
            Kenalan dengan KursusKu
        </h2>

        <p>
            Lihat video pengenalan KursusKu.
        </p>

    </div>


    <div class="media">

        <video controls>

            <source
                src="assets/video/intro-kursus.mp4"
                type="video/mp4"
            >

            Browser kamu tidak mendukung video HTML5.

        </video>

    </div>

</section>


<!-- =========================
     FOOTER
========================== -->
<footer>

    <div class="footer-code">
        &lt;KursusKu /&gt;
    </div>

    <p>
        © <?= date('Y'); ?>
        <strong>KursusKu</strong>.
        Belajar Teknologi, Bangun Masa Depan.
    </p>

</footer>

</body>
</html>
```
