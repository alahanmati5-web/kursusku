<?php
require_once 'helpers.php';

$hargaKursus = 350000;
$diskon = 10;

$hargaSetelahDiskon = hitungDiskon($hargaKursus, $diskon);
$hemat = $hargaKursus - $hargaSetelahDiskon;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kalkulator Biaya - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        header {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            padding: 25px 8%;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            min-height: 75vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .calculator {
            background: white;
            width: 100%;
            max-width: 600px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .calculator h1 {
            text-align: center;
            color: #1d4ed8;
            margin-bottom: 10px;
        }

        .calculator > p {
            text-align: center;
            color: #64748b;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 13px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .result {
            margin-top: 30px;
            padding: 25px;
            background: #eff6ff;
            border-radius: 12px;
        }

        .result h2 {
            color: #1e3a8a;
            margin-bottom: 15px;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .total {
            border-top: 1px solid #bfdbfe;
            padding-top: 15px;
            margin-top: 15px;
            font-size: 20px;
            font-weight: bold;
            color: #16a34a;
        }

        footer {
            background: #111827;
            color: white;
            text-align: center;
            padding: 25px;
        }

        @media (max-width: 600px) {
            nav {
                flex-direction: column;
                gap: 15px;
            }

            nav a {
                margin: 0 8px;
            }

            .calculator {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<header>
    <nav>
        <div class="logo">KursusKu</div>

        <div>
            <a href="index.php">Katalog</a>
            <a href="fee-calculator.php">Kalkulator</a>
            <a href="server-time.php">Server Time</a>
        </div>
    </nav>
</header>

<div class="container">

    <div class="calculator">

        <h1>Kalkulator Biaya Kursus</h1>

        <p>
            Hitung harga kursus setelah mendapatkan diskon.
        </p>

        <form method="post">

            <div class="form-group">
                <label for="harga">Harga Kursus</label>

                <input
                    type="number"
                    id="harga"
                    name="harga"
                    value="<?= $hargaKursus; ?>"
                    min="0"
                    required
                >
            </div>

            <div class="form-group">
                <label for="diskon">Diskon (%)</label>

                <input
                    type="number"
                    id="diskon"
                    name="diskon"
                    value="<?= $diskon; ?>"
                    min="0"
                    max="100"
                    required
                >
            </div>

            <button type="submit">
                Hitung Biaya
            </button>

        </form>

        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $hargaInput = (float) $_POST['harga'];
            $diskonInput = (float) $_POST['diskon'];

            if ($hargaInput >= 0 && $diskonInput >= 0 && $diskonInput <= 100) {

                $hargaSetelahDiskon = hitungDiskon(
                    $hargaInput,
                    $diskonInput
                );

                $hemat = $hargaInput - $hargaSetelahDiskon;
                ?>

                <div class="result">

                    <h2>Hasil Perhitungan</h2>

                    <div class="result-row">
                        <span>Harga Awal</span>
                        <strong>
                            <?= formatRupiah($hargaInput); ?>
                        </strong>
                    </div>

                    <div class="result-row">
                        <span>Diskon</span>
                        <strong>
                            <?= $diskonInput; ?>%
                        </strong>
                    </div>

                    <div class="result-row">
                        <span>Hemat</span>
                        <strong>
                            <?= formatRupiah($hemat); ?>
                        </strong>
                    </div>

                    <div class="result-row total">
                        <span>Total Bayar</span>
                        <strong>
                            <?= formatRupiah($hargaSetelahDiskon); ?>
                        </strong>
                    </div>

                </div>

                <?php
            } else {
                ?>

                <div class="result">
                    <strong>
                        Input tidak valid.
                    </strong>
                    <p>
                        Harga harus minimal 0 dan diskon harus antara
                        0 sampai 100%.
                    </p>
                </div>

                <?php
            }
        }

        ?>

    </div>

</div>

<footer>
    <p>&copy; <?= date('Y'); ?> KursusKu</p>
</footer>

</body>
</html>
