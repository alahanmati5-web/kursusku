
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
    <meta name="theme-color" content="#030806">
    <title><?= htmlspecialchars($siteName); ?> | Belajar Teknologi</title>

    <style>
        /* ==================================================
           RESET DAN DASAR
        ================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --neon: #39ff88;
            --neon-dark: #20e878;
            --bg: #030806;
            --panel: rgba(7, 20, 12, .88);
            --text: #ecfff4;
            --muted: #8da397;
            --border: rgba(57, 255, 136, .14);
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        body::before,
        body::after {
            content: "";
            position: fixed;
            width: 480px;
            height: 480px;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(10px);
        }

        body::before {
            top: -180px;
            left: -180px;
            background: radial-gradient(
                circle,
                rgba(57, 255, 136, .13),
                transparent 70%
            );
            animation: glowLeft 12s ease-in-out infinite alternate;
        }

        body::after {
            right: -180px;
            bottom: -180px;
            background: radial-gradient(
                circle,
                rgba(0, 255, 150, .11),
                transparent 70%
            );
            animation: glowRight 15s ease-in-out infinite alternate;
        }

        @keyframes glowLeft {
            from {
                transform: translate(0, 0) scale(1);
            }
            to {
                transform: translate(110px, 100px) scale(1.25);
            }
        }

        @keyframes glowRight {
            from {
                transform: translate(0, 0) scale(1);
            }
            to {
                transform: translate(-100px, -90px) scale(1.2);
            }
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img, video {
            max-width: 100%;
        }

        .container {
            width: min(92%, 1200px);
            margin: auto;
            position: relative;
            z-index: 1;
        }

        /* ==================================================
           SCROLLBAR
        ================================================== */
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
            background: var(--neon);
        }

        /* ==================================================
           HEADER DAN NAVIGASI
        ================================================== */
        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(3, 10, 7, .86);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid var(--border);
            box-shadow: 0 10px 40px rgba(0, 0, 0, .25);
        }

        .nav {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .logo {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -1px;
            color: var(--neon);
            white-space: nowrap;
            animation: logoGlow 3s ease-in-out infinite alternate;
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
            background: var(--neon);
            box-shadow: 0 0 12px var(--neon);
            animation: pulse 1.8s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: .35;
                transform: scale(.7);
            }
        }

        @keyframes logoGlow {
            from {
                text-shadow: 0 0 7px rgba(57, 255, 136, .2);
            }
            to {
                text-shadow:
                    0 0 12px rgba(57, 255, 136, .6),
                    0 0 26px rgba(57, 255, 136, .2);
            }
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 4px;
            flex-wrap: wrap;
        }

        nav a {
            position: relative;
            padding: 9px 10px;
            color: var(--muted);
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
            background: var(--neon);
            box-shadow: 0 0 8px var(--neon);
            transition: .3s;
            transform: translateX(-50%);
        }

        nav a:hover,
        nav a.active {
            color: var(--neon);
            background: rgba(57, 255, 136, .06);
        }

        nav a:hover::after,
        nav a.active::after {
            width: 45%;
        }

        /* ==================================================
           HERO
        ================================================== */
        .hero {
            min-height: 650px;
            display: flex;
            align-items: center;
            position: relative;
            isolation: isolate;
            overflow: hidden;
            padding: 90px 0 100px;
            background:
                radial-gradient(
                    circle at 80% 30%,
                    rgba(57, 255, 136, .13),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 15% 70%,
                    rgba(0, 255, 150, .07),
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
            z-index: -1;
            background-image:
                linear-gradient(
                    rgba(57, 255, 136, .035) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(57, 255, 136, .035) 1px,
                    transparent 1px
                );
            background-size: 50px 50px;
            mask-image: linear-gradient(to bottom, black, transparent);
            animation: gridMove 18s linear infinite;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 440px;
            height: 440px;
            right: -200px;
            top: 80px;
            z-index: -1;
            border: 1px solid rgba(57, 255, 136, .12);
            border-radius: 50%;
            box-shadow:
                0 0 0 50px rgba(57, 255, 136, .025),
                0 0 0 100px rgba(57, 255, 136, .018);
            animation: ringFloat 12s ease-in-out infinite alternate;
        }

        @keyframes gridMove {
            from { background-position: 0 0; }
            to { background-position: 50px 50px; }
        }

        @keyframes ringFloat {
            from { transform: translateY(0) rotate(0); }
            to { transform: translateY(35px) rotate(8deg); }
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 70px;
            align-items: center;
        }

        .hero-copy {
            animation: heroEnter .9s ease-out both;
        }

        @keyframes heroEnter {
            from {
                opacity: 0;
                transform: translateY(28px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            margin-bottom: 22px;
            border: 1px solid rgba(57, 255, 136, .25);
            border-radius: 50px;
            background: rgba(57, 255, 136, .05);
            color: var(--neon);
            font-family: monospace;
            font-size: 13px;
            box-shadow: 0 0 20px rgba(57, 255, 136, .05);
        }

        .badge::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--neon);
            box-shadow: 0 0 10px var(--neon);
            animation: pulse 1.8s infinite;
        }

        .hero h1 {
            font-size: clamp(42px, 6vw, 72px);
            line-height: 1.02;
            letter-spacing: -3px;
            margin-bottom: 24px;
        }

        .hero h1 span {
            color: var(--neon);
            text-shadow: 0 0 25px rgba(57, 255, 136, .25);
        }

        .hero p {
            max-width: 620px;
            color: #91a59a;
            font-size: 17px;
            line-height: 1.8;
            margin-bottom: 32px;
        }

        /* ==================================================
           TOMBOL
        ================================================== */
        .buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 48px;
            padding: 0 20px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            transition: .3s ease;
            cursor: pointer;
            overflow: hidden;
        }

        .btn-primary,
        .btn-daftar {
            color: #021008;
            background: linear-gradient(135deg, var(--neon), #20e878);
            border: 1px solid var(--neon);
            box-shadow: 0 0 20px rgba(57, 255, 136, .15);
        }

        .btn-primary:hover,
        .btn-daftar:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 30px rgba(57, 255, 136, .35);
        }

        .btn-secondary {
            color: var(--neon);
            background: rgba(57, 255, 136, .04);
            border: 1px solid rgba(57, 255, 136, .3);
        }

        .btn-secondary:hover {
            background: rgba(57, 255, 136, .09);
            border-color: var(--neon);
            transform: translateY(-3px);
        }

        .btn-primary::after,
        .btn-daftar::after {
            content: "";
            position: absolute;
            top: 0;
            left: -130%;
            width: 55%;
            height: 100%;
            pointer-events: none;
            transform: skewX(-25deg);
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, .45),
                transparent
            );
        }

        .btn-primary:hover::after,
        .btn-daftar:hover::after {
            animation: buttonShine .7s ease;
        }

        @keyframes buttonShine {
            to { left: 150%; }
        }

        /* ==================================================
           GAMBAR HERO
        ================================================== */
        .hero-image {
            position: relative;
            padding: 10px;
            border-radius: 24px;
            background: linear-gradient(
                145deg,
                rgba(57, 255, 136, .22),
                rgba(57, 255, 136, .02)
            );
            border: 1px solid rgba(57, 255, 136, .22);
            box-shadow:
                0 0 50px rgba(57, 255, 136, .08),
                inset 0 0 30px rgba(57, 255, 136, .025);
            animation: imageFloat 5s ease-in-out infinite;
            transition: box-shadow .5s, border-color .5s;
        }

        .hero-image:hover {
            border-color: rgba(57, 255, 136, .6);
            box-shadow: 0 0 70px rgba(57, 255, 136, .18);
        }

        .hero-image img {
            display: block;
            width: 100%;
            border-radius: 17px;
            border: 1px solid rgba(255, 255, 255, .05);
        }

        @keyframes imageFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* ==================================================
           STATISTIK
        ================================================== */
        .stats {
            position: relative;
            margin-top: -45px;
            z-index: 2;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .stat {
            padding: 24px;
            text-align: center;
            background: rgba(7, 20, 12, .82);
            border: 1px solid var(--border);
            border-radius: 16px;
            backdrop-filter: blur(12px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, .2);
            transition: .35s;
        }

        .stat:hover {
            transform: translateY(-6px);
            border-color: rgba(57, 255, 136, .4);
            box-shadow: 0 0 30px rgba(57, 255, 136, .08);
        }

        .stat h3 {
            color: var(--neon);
            font-size: 30px;
            line-height: 1;
            margin-bottom: 8px;
            text-shadow: 0 0 15px rgba(57, 255, 136, .2);
        }

        .stat p {
            color: #82968b;
            font-size: 13px;
        }

        /* ==================================================
           JUDUL DAN SECTION
        ================================================== */
        section {
            position: relative;
            padding: 95px 0;
        }

        .section-title {
            max-width: 720px;
            margin: 0 auto 50px;
            text-align: center;
        }

        .section-title small {
            color: var(--neon);
            font-family: monospace;
            font-size: 12px;
            letter-spacing: 1px;
        }

        .section-title h2 {
            margin: 10px 0 12px;
            font-size: clamp(28px, 4vw, 40px);
            letter-spacing: -1.5px;
        }

        .section-title p {
            color: #81948a;
            font-size: 15px;
        }

        /* ==================================================
           KARTU KEUNGGULAN
        ================================================== */
        .benefits {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .benefit {
            position: relative;
            padding: 30px;
            background: linear-gradient(
                145deg,
                rgba(10, 24, 15, .92),
                rgba(4, 12, 8, .92)
            );
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            transition: transform .35s, border-color .35s, box-shadow .35s;
        }

        .benefit::before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            right: -60px;
            top: -60px;
            border-radius: 50%;
            background: rgba(57, 255, 136, .06);
            transition: .4s;
        }

        .benefit:hover {
            transform: translateY(-8px);
            border-color: rgba(57, 255, 136, .4);
            box-shadow: 0 20px 50px rgba(0, 0, 0, .25),
                        0 0 25px rgba(57, 255, 136, .06);
        }

        .benefit:hover::before {
            transform: scale(1.5);
        }

        .icon {
            width: 54px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            border-radius: 14px;
            background: rgba(57, 255, 136, .07);
            border: 1px solid rgba(57, 255, 136, .15);
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

        /* ==================================================
           TENTANG KAMI
        ================================================== */
        .about-section {
            background: linear-gradient(
                180deg,
                transparent,
                rgba(8, 25, 15, .45),
                transparent
            );
        }

        .about-box {
            max-width: 850px;
            margin: auto;
            padding: 45px;
            text-align: center;
            background: linear-gradient(
                145deg,
                rgba(11, 30, 18, .88),
                rgba(4, 13, 8, .9)
            );
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .2);
        }

        .about-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border-radius: 20px;
            background: rgba(57, 255, 136, .07);
            border: 1px solid rgba(57, 255, 136, .18);
            font-size: 34px;
            box-shadow: 0 0 25px rgba(57, 255, 136, .05);
        }

        .about-box h3 {
            color: var(--neon);
            font-size: 25px;
            margin-bottom: 15px;
        }

        .about-box p {
            color: #879a90;
            font-size: 15px;
            line-height: 1.8;
        }

        /* ==================================================
           KATALOG KURSUS
        ================================================== */
        .courses {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .course-card {
            position: relative;
            padding: 26px;
            background: linear-gradient(
                145deg,
                rgba(10, 25, 15, .95),
                rgba(4, 12, 8, .95)
            );
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            transition: transform .35s, border-color .35s, box-shadow .35s;
        }

        .course-card::before {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            right: -90px;
            top: -90px;
            border-radius: 50%;
            background: radial-gradient(
                circle,
                rgba(57, 255, 136, .1),
                transparent 70%
            );
            transition: .4s;
            pointer-events: none;
        }

        .course-card:hover {
            transform: translateY(-8px);
            border-color: rgba(57, 255, 136, .4);
            box-shadow: 0 25px 60px rgba(0, 0, 0, .25),
                        0 0 30px rgba(57, 255, 136, .07);
        }

        .course-card:hover::before {
            transform: scale(1.4);
        }

        .category {
            position: relative;
            display: inline-block;
            margin-bottom: 14px;
            padding: 5px 9px;
            color: var(--neon);
            background: rgba(57, 255, 136, .06);
            border: 1px solid rgba(57, 255, 136, .12);
            border-radius: 6px;
            font-family: monospace;
            font-size: 11px;
        }

        .course-card h3 {
            position: relative;
            min-height: 52px;
            font-size: 19px;
            line-height: 1.4;
            margin-bottom: 16px;
        }

        .price {
            position: relative;
            color: var(--neon);
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 12px;
            text-shadow: 0 0 12px rgba(57, 255, 136, .12);
        }

        .participants {
            position: relative;
            color: #81948a;
            font-size: 13px;
        }

        .progress {
            position: relative;
            height: 6px;
            margin-top: 13px;
            background: #122017;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #1bcf68, var(--neon));
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(57, 255, 136, .45);
            animation: progressEnter 1.2s ease-out both;
        }

        @keyframes progressEnter {
            from { width: 0; }
        }

        .status {
            position: relative;
            display: inline-block;
            margin-top: 15px;
            padding: 5px 10px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
        }

        .status-available {
            color: var(--neon);
            background: rgba(57, 255, 136, .07);
            border: 1px solid rgba(57, 255, 136, .13);
        }

        .status-full {
            color: #ff7979;
            background: rgba(255, 70, 70, .06);
            border: 1px solid rgba(255, 70, 70, .12);
        }

        .btn-daftar {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 45px;
            margin-top: 20px;
            border-radius: 9px;
            font-weight: 800;
            font-size: 13px;
            transition: .3s;
        }

        /* ==================================================
           FAQ
        ================================================== */
        .faq {
            max-width: 850px;
            margin: auto;
        }

        .faq-item {
            position: relative;
            padding: 23px 25px;
            margin-bottom: 13px;
            background: rgba(8, 22, 13, .82);
            border: 1px solid rgba(57, 255, 136, .1);
            border-radius: 14px;
            transition: .3s;
        }

        .faq-item:hover {
            border-color: rgba(57, 255, 136, .28);
            transform: translateX(4px);
        }

        .faq-item h3 {
            color: #dffff0;
            font-size: 16px;
            margin-bottom: 7px;
        }

        .faq-item h3::first-letter {
            color: var(--neon);
        }

        .faq-item p {
            color: #81948a;
            font-size: 14px;
        }

        /* ==================================================
           VIDEO
        ================================================== */
        .video-section {
            background: linear-gradient(
                180deg,
                transparent,
                rgba(6, 20, 11, .5),
                transparent
            );
        }

        .video-box {
            max-width: 900px;
            margin: auto;
            padding: 9px;
            background: linear-gradient(
                145deg,
                rgba(57, 255, 136, .12),
                rgba(57, 255, 136, .02)
            );
            border: 1px solid rgba(57, 255, 136, .17);
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .25);
            transition: box-shadow .4s;
        }

        .video-box:hover {
            box-shadow: 0 0 35px rgba(57, 255, 136, .09);
        }

        video {
            display: block;
            width: 100%;
            border-radius: 14px;
            background: #000;
        }

        /* ==================================================
           KONTAK
        ================================================== */
        .contact {
            padding-bottom: 110px;
        }

        .contact-box {
            max-width: 650px;
            margin: auto;
            padding: 45px 30px;
            text-align: center;
            background: linear-gradient(
                145deg,
                rgba(10, 29, 17, .9),
                rgba(4, 13, 8, .94)
            );
            border: 1px solid rgba(57, 255, 136, .16);
            border-radius: 22px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, .3),
                        0 0 35px rgba(57, 255, 136, .04);
        }

        .contact-icon {
            width: 72px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            border-radius: 20px;
            background: rgba(57, 255, 136, .07);
            border: 1px solid rgba(57, 255, 136, .16);
            font-size: 34px;
        }

        .contact-box h3 {
            color: var(--neon);
            font-size: 25px;
            margin-bottom: 8px;
        }

        .contact-box p {
            color: #82958a;
            margin-bottom: 25px;
        }

        /* ==================================================
           FOOTER
        ================================================== */
        footer {
            position: relative;
            z-index: 1;
            padding: 30px 20px;
            text-align: center;
            color: #62756a;
            font-size: 13px;
            background: #020604;
            border-top: 1px solid rgba(57, 255, 136, .1);
        }

        footer span {
            color: var(--neon);
        }

        /* ==================================================
           ANIMASI MUNCUL SAAT SCROLL
        ================================================== */
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition:
                opacity .7s ease,
                transform .7s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* ==================================================
           RESPONSIVE
        ================================================== */
        @media (max-width: 1050px) {
            .nav {
                flex-direction: column;
                padding: 15px 0;
                gap: 12px;
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
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {
            .container {
                width: 91%;
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
                padding: 65px 0 90px;
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
                padding: 32px 20px;
            }

            .btn {
                width: 100%;
            }

            .buttons {
                width: 100%;
            }
        }

        /* Kurangi gerakan jika pengaturan perangkat memintanya */
        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }

            .reveal {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <div class="container nav">
            <a href="index.php" class="logo">
                &lt;Kursus<span>Ku/&gt;</span>
                <span class="logo-dot"></span>
            </a>

            <nav>
                <a href="index.php" class="active">Katalog</a>
                <a href="#kursus">Kursus</a>
                <a href="registration.php">Registrasi</a>
                <a href="fee-calculator.php">Kalkulator</a>
                <a href="server-time.php">Server Time</a>
                <a href="test-functions.php">Tes Fungsi</a>
                <a href="#tentang">Tentang Kami</a>
                <a href="#faq">FAQ</a>
                <a href="history.php">Riwayat</a>
                <a href="#kontak">Kontak</a>
            </nav>
        </div>
    </header>

    <main>
        <!-- HERO -->
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <div class="badge">KursusKu Online Learning</div>

                    <h1>
                        Belajar Teknologi,
                        <br>
                        <span>Bangun Masa Depan.</span>
                    </h1>

                    <p>
                        Tingkatkan kemampuan teknologi melalui
                        pembelajaran yang praktis, modern,
                        dan sesuai dengan kebutuhan dunia digital.
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

        <!-- STATISTIK -->
        <section class="stats">
            <div class="container stats-grid">
                <div class="stat reveal">
                    <h3>6+</h3>
                    <p>Pilihan Kursus</p>
                </div>

                <div class="stat reveal">
                    <h3>100+</h3>
                    <p>Slot Peserta</p>
                </div>

                <div class="stat reveal">
                    <h3>24/7</h3>
                    <p>Akses Informasi</p>
                </div>
            </div>
        </section>

        <!-- KEUNGGULAN -->
        <section>
            <div class="container">
                <div class="section-title reveal">
                    <small>// kenapa_kursusku</small>
                    <h2>Belajar Bersama KursusKu</h2>
                    <p>
                        Dirancang untuk membantu kamu berkembang
                        di dunia teknologi.
                    </p>
                </div>

                <div class="benefits">
                    <div class="benefit reveal">
                        <div class="icon">💻</div>
                        <h3>Materi Praktis</h3>
                        <p>
                            Materi mudah dipahami dan dapat
                            langsung dipraktikkan.
                        </p>
                    </div>

                    <div class="benefit reveal">
                        <div class="icon">🚀</div>
                        <h3>Skill Masa Kini</h3>
                        <p>
                            Pelajari teknologi yang banyak
                            digunakan di dunia digital.
                        </p>
                    </div>

                    <div class="benefit reveal">
                        <div class="icon">🎯</div>
                        <h3>Belajar Terarah</h3>
                        <p>
                            Susunan kursus membantu proses
                            belajar menjadi lebih terarah.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- TENTANG KAMI -->
        <section id="tentang" class="about-section">
            <div class="container">
                <div class="section-title reveal">
                    <small>// about_kursusku</small>
                    <h2>Tentang KursusKu</h2>
                    <p>
                        Mengenal lebih dekat platform pembelajaran KursusKu.
                    </p>
                </div>

                <div class="about-box reveal">
                    <div class="about-icon">💻</div>
                    <h3>Belajar Teknologi Lebih Mudah</h3>

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

        <!-- KATALOG KURSUS -->
        <section id="kursus">
            <div class="container">
                <div class="section-title reveal">
                    <small>// available_courses</small>
                    <h2>Katalog Kursus</h2>
                    <p>Pilih kursus yang ingin kamu pelajari.</p>
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

                        <div class="course-card reveal">
                            <span class="category">
                                &lt;<?= htmlspecialchars(
                                    $item['kategori'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ); ?>/&gt;
                            </span>

                            <h3>
                                <?= htmlspecialchars(
                                    $item['nama'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ); ?>
                            </h3>

                            <div class="price">
                                <?= formatRupiah($item['harga']); ?>
                            </div>

                            <div class="participants">
                                👥
                                <?= (int) $item['peserta']; ?>
                                /
                                <?= (int) $item['kapasitas']; ?>
                                peserta
                            </div>

                            <div class="progress">
                                <div
                                    class="progress-bar"
                                    style="width: <?= min(
                                        max((float) $persentase, 0),
                                        100
                                    ); ?>%;"
                                ></div>
                            </div>

                            <span class="status <?= htmlspecialchars(
                                getStatusClass($status),
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>">
                                <?= htmlspecialchars(
                                    $status,
                                    ENT_QUOTES,
                                    'UTF-8'
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

        <!-- FAQ -->
        <section id="faq">
            <div class="container">
                <div class="section-title reveal">
                    <small>// frequently_asked_questions</small>
                    <h2>FAQ</h2>
                    <p>
                        Pertanyaan yang sering ditanyakan tentang KursusKu.
                    </p>
                </div>

                <div class="faq">
                    <div class="faq-item reveal">
                        <h3>❓ Bagaimana cara mendaftar kursus?</h3>
                        <p>
                            Pilih kursus yang diinginkan kemudian klik
                            tombol "Daftar Sekarang" atau buka menu Registrasi.
                        </p>
                    </div>

                    <div class="faq-item reveal">
                        <h3>❓ Apakah tersedia diskon?</h3>
                        <p>
                            Ya. Diskon diberikan berdasarkan jenis peserta,
                            seperti Mahasiswa, Guru, dan Umum.
                        </p>
                    </div>

                    <div class="faq-item reveal">
                        <h3>❓ Kursus apa saja yang tersedia?</h3>
                        <p>
                            KursusKu menyediakan Web Development,
                            Pemrograman, Database, Jaringan Komputer,
                            Desain, dan Artificial Intelligence.
                        </p>
                    </div>

                    <div class="faq-item reveal">
                        <h3>❓ Bagaimana melihat riwayat pendaftaran?</h3>
                        <p>
                            Buka menu Riwayat pada navigasi untuk
                            melihat data riwayat pendaftaran.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- VIDEO -->
        <section class="video-section">
            <div class="container">
                <div class="section-title reveal">
                    <small>// intro_video</small>
                    <h2>Kenalan dengan KursusKu</h2>
                    <p>Lihat gambaran singkat tentang KursusKu.</p>
                </div>

                <div class="video-box reveal">
                    <video controls preload="metadata">
                        <source
                            src="assets/video/intro-kursus.mp4"
                            type="video/mp4"
                        >
                        Browser kamu tidak mendukung video.
                    </video>
                </div>
            </div>
        </section>

        <!-- KONTAK -->
        <section class="contact" id="kontak">
            <div class="container">
                <div class="section-title reveal">
                    <small>// contact</small>
                    <h2>Hubungi Kami</h2>
                    <p>
                        Ada pertanyaan tentang kursus?
                        Silakan hubungi kami melalui WhatsApp.
                    </p>
                </div>

                <div class="contact-box reveal">
                    <div class="contact-icon">📱</div>
                    <h3>Muhammad Hafiz</h3>
                    <p>WhatsApp: 085213315418</p>

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

    <!-- FOOTER -->
    <footer>
        &lt;Kursus<span>Ku/&gt;</span>
        &nbsp;—&nbsp;
        <?= htmlspecialchars($tagline, ENT_QUOTES, 'UTF-8'); ?>
        &nbsp;•&nbsp;
        © <?= htmlspecialchars($tahun, ENT_QUOTES, 'UTF-8'); ?>
    </footer>

    <!-- ANIMASI SAAT SCROLL -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const elements = document.querySelectorAll(".reveal");

            if ("IntersectionObserver" in window) {
                const observer = new IntersectionObserver(
                    function (entries, currentObserver) {
                        entries.forEach(function (entry) {
                            if (entry.isIntersecting) {
                                entry.target.classList.add("show");
                                currentObserver.unobserve(entry.target);
                            }
                        });
                    },
                    {
                        threshold: 0.12,
                        rootMargin: "0px 0px -25px 0px"
                    }
                );

                elements.forEach(function (element) {
                    observer.observe(element);
                });
            } else {
                elements.forEach(function (element) {
                    element.classList.add("show");
                });
            }
        });
    </script>
</body>
</html>
