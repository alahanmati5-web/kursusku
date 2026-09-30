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

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= $siteName; ?> | Belajar Teknologi</title>


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

            background:
                #030806;

            color: #ecfff4;

            line-height: 1.6;

            overflow-x: hidden;
        }


        body::before {
            content: "";

            position: fixed;

            width: 500px;
            height: 500px;

            top: -200px;
            left: -200px;

            background:
                radial-gradient(
                    circle,
                    rgba(57,255,136,.08),
                    transparent 70%
                );

            pointer-events: none;

            z-index: -1;
        }


        body::after {
            content: "";

            position: fixed;

            width: 450px;
            height: 450px;

            right: -180px;
            bottom: -180px;

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
            color: inherit;
            text-decoration: none;
        }


        .container {
            width: min(92%, 1200px);
            margin: auto;
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
                rgba(3, 10, 7, .82);

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
            min-height: 78px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;
        }


        /* LOGO */

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


        /* NAVIGATION */

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

            transition: .3s;

            transform: translateX(-50%);
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
            min-height: 650px;

            display: flex;

            align-items: center;

            position: relative;

            overflow: hidden;

            padding: 90px 0 100px;

            background:
                radial-gradient(
                    circle at 80% 30%,
                    rgba(57,255,136,.12),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 15% 70%,
                    rgba(0,255,150,.06),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #020604,
                    #06140b 50%,
                    #020604
                );
        }


        .hero::before {
            content: "";

            position: absolute;

            inset: 0;

            background-image:
                linear-gradient(
                    rgba(57,255,136,.025) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(57,255,136,.025) 1px,
                    transparent 1px
                );

            background-size:
                50px 50px;

            mask-image:
                linear-gradient(
                    to bottom,
                    black,
                    transparent
                );

            pointer-events: none;
        }


        .hero::after {
            content: "";

            position: absolute;

            width: 500px;
            height: 500px;

            right: -200px;
            top: 80px;

            border:
                1px solid rgba(57,255,136,.08);

            border-radius: 50%;

            box-shadow:
                0 0 0 50px rgba(57,255,136,.02),
                0 0 0 100px rgba(57,255,136,.015);
        }


        .hero-grid {
            display: grid;

            grid-template-columns:
                1.05fr .95fr;

            gap: 70px;

            align-items: center;

            position: relative;

            z-index: 2;
        }


        .badge {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 8px 14px;

            margin-bottom: 22px;

            border:
                1px solid rgba(57,255,136,.25);

            border-radius: 50px;

            background:
                rgba(57,255,136,.05);

            color: #39ff88;

            font-family: monospace;

            font-size: 13px;

            box-shadow:
                inset 0 0 20px rgba(57,255,136,.025),
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


        .hero h1 {
            font-size:
                clamp(42px, 6vw, 72px);

            line-height: 1.02;

            letter-spacing: -3px;

            margin-bottom: 24px;
        }


        .hero h1 span {
            color: #39ff88;

            text-shadow:
                0 0 25px rgba(57,255,136,.25);
        }


        .hero p {
            max-width: 620px;

            color: #91a59a;

            font-size: 17px;

            line-height: 1.8;

            margin-bottom: 32px;
        }


        /* BUTTONS */

        .buttons {
            display: flex;

            gap: 12px;

            flex-wrap: wrap;
        }


        .btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            min-height: 48px;

            padding: 0 20px;

            border-radius: 10px;

            font-weight: 700;

            font-size: 14px;

            transition:
                .3s ease;

            cursor: pointer;
        }


        .btn-primary {
            color: #021008;

            background:
                linear-gradient(
                    135deg,
                    #39ff88,
                    #20e878
                );

            border:
                1px solid #39ff88;

            box-shadow:
                0 0 20px rgba(57,255,136,.15);
        }


        .btn-primary:hover {
            transform:
                translateY(-3px);

            box-shadow:
                0 0 30px rgba(57,255,136,.35);
        }


        .btn-secondary {
            color: #39ff88;

            background:
                rgba(57,255,136,.04);

            border:
                1px solid rgba(57,255,136,.3);
        }


        .btn-secondary:hover {
            background:
                rgba(57,255,136,.09);

            border-color:
                #39ff88;

            transform:
                translateY(-3px);
        }


        /* HERO IMAGE */

        .hero-image {
            position: relative;

            padding: 10px;

            border-radius: 24px;

            background:
                linear-gradient(
                    145deg,
                    rgba(57,255,136,.22),
                    rgba(57,255,136,.02)
                );

            border:
                1px solid rgba(57,255,136,.22);

            box-shadow:
                0 0 50px rgba(57,255,136,.08),
                inset 0 0 30px rgba(57,255,136,.025);

            transform:
                perspective(1000px)
                rotateY(-2deg);

            transition: .5s;
        }


        .hero-image:hover {
            transform:
                perspective(1000px)
                rotateY(0deg)
                translateY(-6px);

            box-shadow:
                0 0 70px rgba(57,255,136,.15);
        }


        .hero-image img {
            display: block;

            width: 100%;

            border-radius: 17px;

            border:
                1px solid rgba(255,255,255,.05);
        }


        /* =====================================================
           STATS
        ===================================================== */

        .stats {
            position: relative;

            margin-top: -45px;

            z-index: 10;
        }


        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 16px;
        }


        .stat {
            padding: 24px;

            text-align: center;

            background:
                rgba(7, 20, 12, .78);

            border:
                1px solid rgba(57,255,136,.12);

            border-radius: 16px;

            backdrop-filter:
                blur(12px);

            box-shadow:
                0 15px 40px rgba(0,0,0,.2);

            transition: .3s;
        }


        .stat:hover {
            transform:
                translateY(-5px);

            border-color:
                rgba(57,255,136,.3);

            box-shadow:
                0 0 30px rgba(57,255,136,.06);
        }


        .stat h3 {
            color: #39ff88;

            font-size: 30px;

            line-height: 1;

            margin-bottom: 8px;

            text-shadow:
                0 0 15px rgba(57,255,136,.2);
        }


        .stat p {
            color: #82968b;

            font-size: 13px;
        }


        /* =====================================================
           GENERAL SECTION
        ===================================================== */

        section {
            padding: 95px 0;
        }


        .section-title {
            max-width: 720px;

            margin:
                0 auto 50px;

            text-align: center;
        }


        .section-title small {
            color: #39ff88;

            font-family: monospace;

            font-size: 12px;

            letter-spacing: 1px;
        }


        .section-title h2 {
            margin:
                10px 0 12px;

            font-size:
                clamp(28px, 4vw, 40px);

            letter-spacing:
                -1.5px;
        }


        .section-title p {
            color: #81948a;

            font-size: 15px;
        }


        /* =====================================================
           BENEFITS
        ===================================================== */

        .benefits {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;
        }


        .benefit {
            position: relative;

            padding: 30px;

            background:
                linear-gradient(
                    145deg,
                    rgba(10,24,15,.92),
                    rgba(4,12,8,.92)
                );

            border:
                1px solid rgba(57,255,136,.11);

            border-radius: 18px;

            overflow: hidden;

            transition: .35s;
        }


        .benefit::before {
            content: "";

            position: absolute;

            width: 120px;
            height: 120px;

            right: -60px;
            top: -60px;

            border-radius: 50%;

            background:
                rgba(57,255,136,.05);
        }


        .benefit:hover {
            transform:
                translateY(-8px);

            border-color:
                rgba(57,255,136,.35);

            box-shadow:
                0 20px 50px rgba(0,0,0,.25),
                0 0 25px rgba(57,255,136,.05);
        }


        .icon {
            width: 54px;
            height: 54px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-bottom: 20px;

            border-radius: 14px;

            background:
                rgba(57,255,136,.07);

            border:
                1px solid rgba(57,255,136,.15);

            font-size: 26px;
        }


        .benefit h3 {
            font-size: 19px;

            margin-bottom: 9px;
        }


        .benefit p {
            color: #84988d;

            font-size: 14px;

            line-height: 1.7;
        }


        /* =====================================================
           ABOUT
        ===================================================== */

        .about-section {
            background:
                linear-gradient(
                    180deg,
                    transparent,
                    rgba(8,25,15,.45),
                    transparent
                );
        }


        .about-box {
            max-width: 850px;

            margin: auto;

            padding: 45px;

            text-align: center;

            background:
                linear-gradient(
                    145deg,
                    rgba(11,30,18,.88),
                    rgba(4,13,8,.9)
                );

            border:
                1px solid rgba(57,255,136,.14);

            border-radius: 22px;

            box-shadow:
                0 25px 60px rgba(0,0,0,.2);
        }


        .about-icon {
            width: 70px;
            height: 70px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin:
                0 auto 20px;

            border-radius: 20px;

            background:
                rgba(57,255,136,.07);

            border:
                1px solid rgba(57,255,136,.18);

            font-size: 34px;

            box-shadow:
                0 0 25px rgba(57,255,136,.05);
        }


        .about-box h3 {
            color: #39ff88;

            font-size: 25px;

            margin-bottom: 15px;
        }


        .about-box p {
            color: #879a90;

            font-size: 15px;

            line-height: 1.8;
        }


        /* =====================================================
           COURSES
        ===================================================== */

        .courses {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 22px;
        }


        .course-card {
            position: relative;

            padding: 26px;

            background:
                linear-gradient(
                    145deg,
                    rgba(10,25,15,.95),
                    rgba(4,12,8,.95)
                );

            border:
                1px solid rgba(57,255,136,.11);

            border-radius: 18px;

            overflow: hidden;

            transition: .35s;
        }


        .course-card::before {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            right: -90px;
            top: -90px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(57,255,136,.08),
                    transparent 70%
                );

            transition: .4s;
        }


        .course-card:hover {
            transform:
                translateY(-8px);

            border-color:
                rgba(57,255,136,.35);

            box-shadow:
                0 25px 60px rgba(0,0,0,.25),
                0 0 30px rgba(57,255,136,.06);
        }


        .course-card:hover::before {
            transform:
                scale(1.3);
        }


        .category {
            display: inline-block;

            margin-bottom: 14px;

            padding: 5px 9px;

            color: #39ff88;

            background:
                rgba(57,255,136,.06);

            border:
                1px solid rgba(57,255,136,.12);

            border-radius: 6px;

            font-family: monospace;

            font-size: 11px;
        }


        .course-card h3 {
            min-height: 52px;

            font-size: 19px;

            line-height: 1.4;

            margin-bottom: 16px;
        }


        .price {
            color: #39ff88;

            font-size: 22px;

            font-weight: 800;

            margin-bottom: 12px;

            text-shadow:
                0 0 12px rgba(57,255,136,.12);
        }


        .participants {
            color: #81948a;

            font-size: 13px;
        }


        .progress {
            height: 6px;

            margin-top: 13px;

            background:
                #122017;

            border-radius: 20px;

            overflow: hidden;
        }


        .progress-bar {
            height: 100%;

            background:
                linear-gradient(
                    90deg,
                    #1bcf68,
                    #39ff88
                );

            border-radius: 20px;

            box-shadow:
                0 0 10px rgba(57,255,136,.45);
        }


        .status {
            display: inline-block;

            margin-top: 15px;

            padding: 5px 10px;

            border-radius: 30px;

            font-size: 11px;

            font-weight: 700;
        }


        .status-available {
            color: #39ff88;

            background:
                rgba(57,255,136,.07);

            border:
                1px solid rgba(57,255,136,.13);
        }


        .status-full {
            color: #ff7979;

            background:
                rgba(255,70,70,.06);

            border:
                1px solid rgba(255,70,70,.12);
        }


        .btn-daftar {
            display: flex;

            align-items: center;
            justify-content: center;

            width: 100%;

            min-height: 45px;

            margin-top: 20px;

            color: #031108;

            background:
                linear-gradient(
                    135deg,
                    #39ff88,
                    #22e977
                );

            border-radius: 9px;

            font-weight: 800;

            font-size: 13px;

            transition: .3s;
        }


        .btn-daftar:hover {
            transform:
                translateY(-3px);

            box-shadow:
                0 0 25px rgba(57,255,136,.25);
        }


        /* =====================================================
           FAQ
        ===================================================== */

        .faq {
            max-width: 850px;

            margin: auto;
        }


        .faq-item {
            position: relative;

            padding: 23px 25px;

            margin-bottom: 13px;

            background:
                rgba(8,22,13,.82);

            border:
                1px solid rgba(57,255,136,.1);

            border-radius: 14px;

            transition: .3s;
        }


        .faq-item:hover {
            border-color:
                rgba(57,255,136,.28);

            transform:
                translateX(4px);
        }


        .faq-item h3 {
            color: #dffff0;

            font-size: 16px;

            margin-bottom: 7px;
        }


        .faq-item h3::first-letter {
            color: #39ff88;
        }


        .faq-item p {
            color: #81948a;

            font-size: 14px;
        }


        /* =====================================================
           VIDEO
        ===================================================== */

        .video-section {
            background:
                linear-gradient(
                    180deg,
                    transparent,
                    rgba(6,20,11,.5),
                    transparent
                );
        }


        .video-box {
            max-width: 900px;

            margin: auto;

            padding: 9px;

            background:
                linear-gradient(
                    145deg,
                    rgba(57,255,136,.12),
                    rgba(57,255,136,.02)
                );

            border:
                1px solid rgba(57,255,136,.17);

            border-radius: 20px;

            box-shadow:
                0 25px 60px rgba(0,0,0,.25);
        }


        video {
            display: block;

            width: 100%;

            border-radius: 14px;

            background: #000;
        }


        /* =====================================================
           CONTACT
        ===================================================== */

        .contact {
            padding-bottom: 110px;
        }


        .contact-box {
            max-width: 650px;

            margin: auto;

            padding: 45px 30px;

            text-align: center;

            background:
                linear-gradient(
                    145deg,
                    rgba(10,29,17,.9),
                    rgba(4,13,8,.94)
                );

            border:
                1px solid rgba(57,255,136,.16);

            border-radius: 22px;

            box-shadow:
                0 25px 70px rgba(0,0,0,.3),
                0 0 35px rgba(57,255,136,.04);
        }


        .contact-icon {
            width: 72px;
            height: 72px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin:
                0 auto 18px;

            border-radius: 20px;

            background:
                rgba(57,255,136,.07);

            border:
                1px solid rgba(57,255,136,.16);

            font-size: 34px;
        }


        .contact-box h3 {
            color: #39ff88;

            font-size: 25px;

            margin-bottom: 8px;
        }


        .contact-box p {
            color: #82958a;

            margin-bottom: 25px;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            padding: 30px 20px;

            text-align: center;

            color: #62756a;

            font-size: 13px;

            background:
                #020604;

            border-top:
                1px solid rgba(57,255,136,.1);
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

                padding: 15px 0;
            }


            nav {
                justify-content: center;
            }


            .hero-grid {
                gap: 40px;
            }

        }


        @media (max-width: 900px) {

            .hero-grid {
                grid-template-columns: 1fr;

                text-align: center;
            }


            .hero p {
                margin-left: auto;
                margin-right: auto;
            }


            .buttons {
                justify-content: center;
            }


            .hero-image {
                max-width: 650px;

                width: 100%;

                margin: auto;
            }


            .benefits,
            .courses {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .container {
                width: 91%;
            }


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
                padding: 7px 8px;

                font-size: 11px;
            }


            .hero {
                min-height: auto;

                padding:
                    65px 0 90px;
            }


            .hero h1 {
                font-size: 42px;

                letter-spacing: -2px;
            }


            .hero p {
                font-size: 15px;
            }


            .stats {
                margin-top: 20px;
            }


            .stats-grid {
                grid-template-columns: 1fr;

                gap: 12px;
            }


            section {
                padding: 70px 0;
            }


            .benefits,
            .courses {
                grid-template-columns: 1fr;
            }


            .section-title {
                margin-bottom: 35px;
            }


            .section-title h2 {
                font-size: 29px;
            }


            .about-box,
            .contact-box {
                padding:
                    32px 20px;
            }


            .btn {
                width: 100%;
            }


            .buttons {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     HEADER
===================================================== -->

<header>

    <div class="container nav">


        <a
            href="index.php"
            class="logo"
        >

            &lt;Kursus<span>Ku/&gt;</span>

            <span class="logo-dot"></span>

        </a>


        <nav>


            <!-- 1 -->

            <a
                href="index.php"
                class="active"
            >
                Katalog
            </a>


            <!-- 2 -->

            <a href="#kursus">
                Kursus
            </a>


            <!-- 3 -->

            <a href="registration.php">
                Registrasi
            </a>


            <!-- 4 -->

            <a href="fee-calculator.php">
                Kalkulator
            </a>


            <!-- 5 -->

            <a href="server-time.php">
                Server Time
            </a>


            <!-- 6 -->

            <a href="test-functions.php">
                Tes Fungsi
            </a>


            <!-- 7 -->

            <a href="#tentang">
                Tentang Kami
            </a>


            <!-- 8 -->

            <a href="#faq">
                FAQ
            </a>


            <!-- 9 -->

            <a href="history.php">
                Riwayat
            </a>


            <!-- 10 -->

            <a href="#kontak">
                Kontak
            </a>


        </nav>

    </div>

</header>


<!-- =====================================================
     HERO
===================================================== -->

<main>


<section class="hero">


    <div class="container hero-grid">


        <div>


            <div class="badge">
                KursusKu Online Learning
            </div>


            <h1>

                Belajar Teknologi,

                <br>

                <span>
                    Bangun Masa Depan.
                </span>

            </h1>


            <p>

                Tingkatkan kemampuan teknologi melalui
                pembelajaran yang praktis, modern,
                dan sesuai dengan kebutuhan dunia digital.

            </p>


            <div class="buttons">


                <a
                    href="#kursus"
                    class="btn btn-primary"
                >
                    &gt;_ Lihat Kursus
                </a>


                <a
                    href="registration.php"
                    class="btn btn-secondary"
                >
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


<!-- =====================================================
     STATS
===================================================== -->

<section class="stats">


    <div class="container stats-grid">


        <div class="stat">

            <h3>
                6+
            </h3>

            <p>
                Pilihan Kursus
            </p>

        </div>


        <div class="stat">

            <h3>
                100+
            </h3>

            <p>
                Slot Peserta
            </p>

        </div>


        <div class="stat">

            <h3>
                24/7
            </h3>

            <p>
                Akses Informasi
            </p>

        </div>


    </div>


</section>


<!-- =====================================================
     BENEFITS
===================================================== -->

<section>


    <div class="container">


        <div class="section-title">

            <small>
                // kenapa_kursusku
            </small>

            <h2>
                Belajar Bersama KursusKu
            </h2>

            <p>
                Dirancang untuk membantu kamu berkembang
                di dunia teknologi.
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
                    Materi mudah dipahami dan dapat
                    langsung dipraktikkan.
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
                    Pelajari teknologi yang banyak
                    digunakan di dunia digital.
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
                    Susunan kursus membantu proses
                    belajar menjadi lebih terarah.
                </p>

            </div>


        </div>


    </div>


</section>


<!-- =====================================================
     TENTANG KAMI
===================================================== -->

<section
    id="tentang"
    class="about-section"
>


    <div class="container">


        <div class="section-title">

            <small>
                // about_kursusku
            </small>

            <h2>
                Tentang KursusKu
            </h2>

            <p>
                Mengenal lebih dekat platform pembelajaran KursusKu.
            </p>

        </div>


        <div class="about-box">


            <div class="about-icon">
                💻
            </div>


            <h3>
                Belajar Teknologi Lebih Mudah
            </h3>


            <p>

                KursusKu adalah platform pembelajaran teknologi
                yang menyediakan berbagai pilihan kursus untuk
                membantu pengguna meningkatkan keterampilan
                di bidang digital.

            </p>


            <br>


            <p>

                Kursus yang tersedia meliputi Web Development,
                Pemrograman, Database, Jaringan Komputer,
                Desain, dan Artificial Intelligence.

            </p>


        </div>


    </div>


</section>


<!-- =====================================================
     KATALOG KURSUS
===================================================== -->

<section id="kursus">


    <div class="container">


        <div class="section-title">

            <small>
                // available_courses
            </small>

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

                        &lt;<?= htmlspecialchars(
                            $item['kategori']
                        ); ?>/&gt;

                    </span>


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
                            style="
                                width:
                                <?= min(
                                    $persentase,
                                    100
                                ); ?>%;
                            "
                        ></div>

                    </div>


                    <span
                        class="status
                        <?= getStatusClass($status); ?>"
                    >

                        <?= htmlspecialchars(
                            $status
                        ); ?>

                    </span>


                    <a
                        href="registration.php?kursus=<?= urlencode(
                            $item['nama']
                        ); ?>"
                        class="btn-daftar"
                    >

                        📝 Daftar Sekarang

                    </a>


                </div>


            <?php endforeach; ?>


        </div>


    </div>


</section>


<!-- =====================================================
     FAQ
===================================================== -->

<section id="faq">


    <div class="container">


        <div class="section-title">

            <small>
                // frequently_asked_questions
            </small>

            <h2>
                FAQ
            </h2>

            <p>
                Pertanyaan yang sering ditanyakan tentang KursusKu.
            </p>

        </div>


        <div class="faq">


            <div class="faq-item">

                <h3>
                    ❓ Bagaimana cara mendaftar kursus?
                </h3>

                <p>
                    Pilih kursus yang diinginkan kemudian klik
                    tombol "Daftar Sekarang" atau buka menu Registrasi.
                </p>

            </div>


            <div class="faq-item">

                <h3>
                    ❓ Apakah tersedia diskon?
                </h3>

                <p>
                    Ya. Diskon diberikan berdasarkan jenis peserta,
                    seperti Mahasiswa, Guru, dan Umum.
                </p>

            </div>


            <div class="faq-item">

                <h3>
                    ❓ Kursus apa saja yang tersedia?
                </h3>

                <p>
                    KursusKu menyediakan Web Development,
                    Pemrograman, Database, Jaringan Komputer,
                    Desain, dan Artificial Intelligence.
                </p>

            </div>


            <div class="faq-item">

                <h3>
                    ❓ Bagaimana melihat riwayat pendaftaran?
                </h3>

                <p>
                    Buka menu Riwayat pada navigasi untuk
                    melihat data riwayat pendaftaran.
                </p>

            </div>


        </div>


    </div>


</section>


<!-- =====================================================
     VIDEO
===================================================== -->

<section class="video-section">


    <div class="container">


        <div class="section-title">

            <small>
                // intro_video
            </small>

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


<!-- =====================================================
     KONTAK
===================================================== -->

<section
    class="contact"
    id="kontak"
>


    <div class="container">


        <div class="section-title">

            <small>
                // contact
            </small>

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


<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    &lt;Kursus<span>Ku/&gt;</span>

    &nbsp;—&nbsp;

    <?= $tagline; ?>

    &nbsp;•&nbsp;

    © <?= $tahun; ?>

</footer>


</body>

</html>