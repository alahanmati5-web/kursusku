```php
<?php

require_once 'helpers.php';

$hasil = null;
$harga = '';
$diskon = '';
$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $harga = (float) ($_POST['harga'] ?? 0);
    $diskon = (float) ($_POST['diskon'] ?? 0);


    if ($harga < 0) {

        $error = 'Harga tidak boleh kurang dari 0.';

    } elseif ($diskon < 0 || $diskon > 100) {

        $error = 'Diskon harus berada antara 0 sampai 100%.';

    } else {

        $totalBayar = hitungDiskon($harga, $diskon);

        $potongan = $harga - $totalBayar;


        $hasil = [

            'harga' => $harga,

            'diskon' => $diskon,

            'potongan' => $potongan,

            'total' => $totalBayar

        ];

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

    <title>KursusKu | Fee Calculator</title>


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


        .container {

            width: min(92%, 1050px);

            margin: auto;
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
           CALCULATOR
        ===================================================== */

        .calculator {

            position: relative;

            max-width: 700px;

            margin:
                20px auto 25px;

            padding: 32px;

            background:
                linear-gradient(
                    145deg,
                    rgba(10,25,15,.94),
                    rgba(4,12,8,.97)
                );

            border:
                1px solid rgba(57,255,136,.16);

            border-radius: 22px;

            box-shadow:
                0 25px 70px rgba(0,0,0,.35),
                0 0 35px rgba(57,255,136,.04);

            overflow: hidden;
        }


        .calculator::before {

            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            top: -160px;
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


        /* =====================================================
           CALCULATOR HEADER
        ===================================================== */

        .calculator-header {

            position: relative;

            display: flex;

            align-items: center;

            gap: 9px;

            color: #39ff88;

            font-family: monospace;

            font-size: 13px;

            margin-bottom: 27px;

            padding-bottom: 16px;

            border-bottom:
                1px solid rgba(57,255,136,.10);
        }


        .calculator-header::before {

            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #39ff88;

            box-shadow:
                0 0 9px #39ff88;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .input-group {

            margin-bottom: 20px;
        }


        label {

            display: block;

            margin-bottom: 9px;

            color: #c9dbd0;

            font-size: 13px;

            font-weight: 700;
        }


        input {

            width: 100%;

            padding:
                14px 15px;

            background:
                rgba(2,8,5,.85);

            border:
                1px solid rgba(57,255,136,.15);

            border-radius: 10px;

            color: #eafff1;

            font-size: 15px;

            outline: none;

            transition: .3s ease;
        }


        input::placeholder {
            color: #52655a;
        }


        input:focus {

            border-color:
                rgba(57,255,136,.65);

            box-shadow:
                0 0 20px rgba(57,255,136,.09);

            background:
                rgba(3,12,7,.95);
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .btn {

            width: 100%;

            padding:
                14px 18px;

            border:
                1px solid #39ff88;

            border-radius: 10px;

            background: #39ff88;

            color: #031108;

            font-size: 14px;

            font-weight: 800;

            cursor: pointer;

            transition: .3s ease;

            box-shadow:
                0 0 20px rgba(57,255,136,.08);
        }


        .btn:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 0 30px rgba(57,255,136,.25);
        }


        .btn:active {

            transform:
                translateY(0);
        }


        /* =====================================================
           ERROR
        ===================================================== */

        .error {

            margin-top: 20px;

            padding:
                14px 16px;

            border-radius: 10px;

            background:
                rgba(255,70,70,.07);

            border:
                1px solid rgba(255,70,70,.35);

            color: #ff9b9b;

            font-size: 13px;

            line-height: 1.6;
        }


        /* =====================================================
           RESULT
        ===================================================== */

        .result {

            margin-top: 30px;

            padding: 23px;

            background:
                rgba(57,255,136,.025);

            border:
                1px solid rgba(57,255,136,.20);

            border-radius: 15px;

            box-shadow:
                inset 0 0 20px rgba(57,255,136,.015);
        }


        .result-title {

            display: flex;

            align-items: center;

            gap: 8px;

            color: #39ff88;

            font-family: monospace;

            font-size: 12px;

            margin-bottom: 17px;

            padding-bottom: 13px;

            border-bottom:
                1px solid rgba(57,255,136,.09);
        }


        .result-title::before {

            content: "✓";

            display: flex;

            align-items: center;

            justify-content: center;

            width: 20px;
            height: 20px;

            border-radius: 6px;

            background:
                rgba(57,255,136,.08);

            border:
                1px solid rgba(57,255,136,.15);
        }


        .result-row {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            padding:
                12px 0;

            border-bottom:
                1px solid rgba(57,255,136,.07);

            color: #81948a;

            font-size: 14px;
        }


        .result-row strong {

            color: #dceee3;

            font-family: monospace;

            font-size: 13px;
        }


        .result-row:last-child {

            border-bottom: none;
        }


        .result-row.total {

            padding-top: 19px;

            color: #39ff88;

            font-size: 20px;

            font-weight: 800;
        }


        .result-row.total strong {

            color: #39ff88;

            font-size: 20px;

            text-shadow:
                0 0 12px rgba(57,255,136,.20);
        }


        /* =====================================================
           INFO
        ===================================================== */

        .info {

            max-width: 700px;

            margin:
                20px auto;

            padding:
                18px 20px;

            color: #81948a;

            background:
                rgba(57,255,136,.025);

            border:
                1px solid rgba(57,255,136,.10);

            border-left:
                3px solid #39ff88;

            border-radius: 10px;

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

            main {

                width: 92%;

                padding:
                    20px 0 80px;
            }


            .calculator {

                padding: 21px;

                border-radius: 18px;
            }


            h1 {

                font-size: 36px;

                letter-spacing: -1.5px;
            }


            nav a {

                padding:
                    7px 8px;

                font-size: 11px;
            }


            .result-row {

                align-items: flex-start;

                flex-direction: column;

                gap: 5px;
            }


            .result-row.total {

                flex-direction: row;

                align-items: center;
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


            <a
                href="fee-calculator.php"
                class="active"
            >
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


<!-- =====================================================
     HERO
===================================================== -->

<section class="hero">

    <div class="container">


        <div class="terminal">

            $ php fee-calculator.php

        </div>


        <h1>

            Fee
            <span>Calculator</span>

        </h1>


        <p>

            Hitung biaya kursus dan diskon
            dengan cepat dan mudah.

        </p>


    </div>

</section>


<!-- =====================================================
     MAIN
===================================================== -->

<main>


    <div class="calculator">


        <div class="calculator-header">

            &gt;_ input_course_fee

        </div>


        <form method="POST">


            <div class="input-group">


                <label for="harga">

                    Harga Kursus

                </label>


                <input
                    type="number"
                    id="harga"
                    name="harga"
                    min="0"
                    step="1000"
                    value="<?= htmlspecialchars($harga); ?>"
                    placeholder="Contoh: 350000"
                    required
                >

            </div>


            <div class="input-group">


                <label for="diskon">

                    Diskon (%)

                </label>


                <input
                    type="number"
                    id="diskon"
                    name="diskon"
                    min="0"
                    max="100"
                    step="1"
                    value="<?= htmlspecialchars($diskon); ?>"
                    placeholder="Contoh: 10"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn"
            >

                &gt;_ Hitung Sekarang

            </button>


        </form>


        <?php if ($error): ?>


            <div class="error">

                ⚠

                <?= htmlspecialchars($error); ?>

            </div>


        <?php endif; ?>


        <?php if ($hasil !== null): ?>


            <div class="result">


                <div class="result-title">

                    calculation_result

                </div>


                <div class="result-row">

                    <span>
                        Harga Awal
                    </span>

                    <strong>
                        <?= formatRupiah($hasil['harga']); ?>
                    </strong>

                </div>


                <div class="result-row">

                    <span>
                        Diskon
                    </span>

                    <strong>
                        <?= $hasil['diskon']; ?>%
                    </strong>

                </div>


                <div class="result-row">

                    <span>
                        Potongan Harga
                    </span>

                    <strong>
                        <?= formatRupiah($hasil['potongan']); ?>
                    </strong>

                </div>


                <div class="result-row total">

                    <span>
                        Total Bayar
                    </span>

                    <strong>
                        <?= formatRupiah($hasil['total']); ?>
                    </strong>

                </div>


            </div>


        <?php endif; ?>


    </div>


    <!-- INFO -->

    <div class="info">

        💡

        <strong>Contoh:</strong>

        jika harga kursus Rp 350.000
        dan diskon 10%, maka total pembayaran
        menjadi <strong>Rp 315.000</strong>.

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
