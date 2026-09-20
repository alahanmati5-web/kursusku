```php
<?php
require_once 'helpers.php';

$harga = 0;
$diskon = 0;
$hasil = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $harga = (float) ($_POST['harga'] ?? 0);
    $diskon = (float) ($_POST['diskon'] ?? 0);

    if ($harga >= 0 && $diskon >= 0 && $diskon <= 100) {
        $hasil = hitungDiskon($harga, $diskon);
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kalkulator Biaya - KursusKu</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        /* ================= HEADER ================= */

        header {
            background: #0f172a;
            padding: 15px 7%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
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
            background: #2563eb;
            color: white;
        }

        /* ================= HERO ================= */

        .page-hero {
            background:
                linear-gradient(135deg, #0f172a, #1d4ed8, #7c3aed);
            color: white;
            text-align: center;
            padding: 70px 20px;
        }

        .page-hero .icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .page-hero h1 {
            font-size: 42px;
            margin-bottom: 12px;
        }

        .page-hero p {
            color: #dbeafe;
            font-size: 17px;
        }

        /* ================= CALCULATOR ================= */

        .container {
            width: 90%;
            max-width: 850px;
            margin: 60px auto;
        }

        .calculator {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 12px 35px rgba(15,23,42,0.08);
            border: 1px solid #e2e8f0;
        }

        .calculator h2 {
            text-align: center;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .calculator-description {
            text-align: center;
            color: #64748b;
            margin-bottom: 35px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #334155;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        .btn {
            width: 100%;
            border: none;
            padding: 15px;
            border-radius: 10px;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37,99,235,0.25);
        }

        /* ================= RESULT ================= */

        .result {
            margin-top: 30px;
            padding: 25px;
            border-radius: 15px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
        }

        .result h3 {
            color: #1d4ed8;
            margin-bottom: 18px;
            text-align: center;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #dbeafe;
        }

        .result-row:last-child {
            border-bottom: none;
        }

        .result-row span:first-child {
            color: #64748b;
        }

        .result-row span:last-child {
            font-weight: bold;
            color: #1e293b;
        }

        .total {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #bfdbfe;
        }

        .total span:last-child {
            color: #2563eb;
            font-size: 23px;
        }

        /* ================= INFO ================= */

        .info-box {
            margin-top: 25px;
            padding: 20px;
            background: #f8fafc;
            border-radius: 12px;
            border-left: 4px solid #2563eb;
        }

        .info-box h3 {
            margin-bottom: 8px;
            color: #0f172a;
        }

        .info-box p {
            color: #64748b;
            line-height: 1.6;
            font-size: 14px;
        }

        /* ================= FOOTER ================= */

        footer {
            margin-top: 80px;
            padding: 30px;
            background: #0f172a;
            color: #cbd5e1;
            text-align: center;
        }

        footer strong {
            color: white;
        }

        /* ================= RESPONSIVE ================= */

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

            .page-hero {
                padding: 55px 20px;
            }

            .page-hero h1 {
                font-size: 32px;
            }

            .calculator {
                padding: 25px 20px;
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

            <a href="index.php">
                Katalog
            </a>

            <a href="fee-calculator.php" class="active">
                Kalkulator
            </a>

            <a href="server-time.php">
                Server Time
            </a>

        </div>

    </nav>

</header>


<!-- ================= PAGE HERO ================= -->

<section class="page-hero">

    <div class="icon">
        🧮
    </div>

    <h1>
        Kalkulator Biaya Kursus
    </h1>

    <p>
        Hitung harga kursus setelah mendapatkan diskon.
    </p>

</section>


<!-- ================= CALCULATOR ================= -->

<main class="container">

    <div class="calculator">

        <h2>
            💰 Hitung Biaya
        </h2>

        <p class="calculator-description">
            Masukkan harga kursus dan persentase diskon.
        </p>


        <form method="POST">

            <div class="form-group">

                <label for="harga">
                    Harga Kursus
                </label>

                <input
                    type="number"
                    id="harga"
                    name="harga"
                    placeholder="Contoh: 350000"
                    value="<?= htmlspecialchars($harga); ?>"
                    min="0"
                    required
                >

            </div>


            <div class="form-group">

                <label for="diskon">
                    Diskon (%)
                </label>

                <input
                    type="number"
                    id="diskon"
                    name="diskon"
                    placeholder="Contoh: 10"
                    value="<?= htmlspecialchars($diskon); ?>"
                    min="0"
                    max="100"
                    required
                >

            </div>


            <button type="submit" class="btn">
                🧮 Hitung Sekarang
            </button>

        </form>


        <?php if ($hasil !== null): ?>

            <div class="result">

                <h3>
                    📊 Hasil Perhitungan
                </h3>


                <div class="result-row">

                    <span>
                        Harga Awal
                    </span>

                    <span>
                        <?= formatRupiah($harga); ?>
                    </span>

                </div>


                <div class="result-row">

                    <span>
                        Diskon
                    </span>

                    <span>
                        <?= htmlspecialchars($diskon); ?>%
                    </span>

                </div>


                <div class="result-row">

                    <span>
                        Potongan Harga
                    </span>

                    <span>
                        <?= formatRupiah($harga - $hasil); ?>
                    </span>

                </div>


                <div class="result-row total">

                    <span>
                        Total Bayar
                    </span>

                    <span>
                        <?= formatRupiah($hasil); ?>
                    </span>

                </div>

            </div>

        <?php endif; ?>


        <div class="info-box">

            <h3>
                💡 Cara Menggunakan
            </h3>

            <p>
                Masukkan harga kursus, kemudian masukkan persentase
                diskon yang diberikan. Klik tombol
                <strong>Hitung Sekarang</strong> untuk melihat total
                biaya yang harus dibayar.
            </p>

        </div>

    </div>

</main>


<!-- ================= FOOTER ================= -->

<footer>

    <p>
        &copy; <?= date('Y'); ?>
        <strong>KursusKu</strong>.
        Belajar Skill Baru, Bangun Masa Depan.
    </p>

</footer>

</body>

</html>
```
