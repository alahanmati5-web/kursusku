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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu | Fee Calculator</title>

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
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 90%;
            max-width: 1050px;
            margin: auto;
        }

        header {
            background: #020807;
            border-bottom: 1px solid #174d2d;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav {
            min-height: 72px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #39ff88;
            text-shadow: 0 0 12px rgba(57,255,136,.5);
        }

        .logo span,
        footer span {
            color: #eafff1;
        }

        nav {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        nav a {
            color: #91a59a;
            padding: 9px 14px;
            border-radius: 8px;
        }

        nav a:hover,
        nav a.active {
            color: #39ff88;
            background: #0d2116;
        }

        .hero {
            text-align: center;
            padding: 70px 0 40px;
            background:
                linear-gradient(135deg, #020807, #062315, #07110d);
        }

        .terminal {
            display: inline-block;
            font-family: monospace;
            color: #39ff88;
            border: 1px solid #1d6b3c;
            background: #0a1b11;
            padding: 8px 14px;
            border-radius: 30px;
            margin-bottom: 18px;
        }

        h1 {
            font-size: clamp(34px, 5vw, 52px);
            margin-bottom: 12px;
        }

        h1 span {
            color: #39ff88;
            text-shadow: 0 0 18px rgba(57,255,136,.3);
        }

        .hero p {
            color: #91a59a;
        }

        main {
            padding-bottom: 70px;
        }

        .calculator {
            max-width: 650px;
            margin: 30px auto;
            background: #0a1710;
            border: 1px solid #1e6b3d;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 0 30px rgba(57,255,136,.07);
        }

        .calculator-header {
            font-family: monospace;
            color: #39ff88;
            margin-bottom: 25px;
            border-bottom: 1px solid #173d27;
            padding-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #b7c9bd;
            font-weight: bold;
        }

        .input-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 14px;
            background: #050d08;
            border: 1px solid #245638;
            border-radius: 9px;
            color: #eafff1;
            font-size: 16px;
            outline: none;
        }

        input:focus {
            border-color: #39ff88;
            box-shadow: 0 0 15px rgba(57,255,136,.12);
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: 1px solid #39ff88;
            border-radius: 9px;
            background: #39ff88;
            color: #031108;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: .3s;
        }

        .btn:hover {
            box-shadow: 0 0 25px rgba(57,255,136,.3);
            transform: translateY(-2px);
        }

        .error {
            margin-top: 20px;
            padding: 14px;
            border-radius: 9px;
            background: #321313;
            border: 1px solid #7d3434;
            color: #ff9b9b;
        }

        .result {
            margin-top: 30px;
            padding: 22px;
            background: #071a0e;
            border: 1px solid #276d42;
            border-radius: 12px;
        }

        .result-title {
            color: #39ff88;
            font-family: monospace;
            margin-bottom: 18px;
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 11px 0;
            border-bottom: 1px solid #173d27;
            color: #a8b9ae;
        }

        .result-row:last-child {
            border-bottom: none;
        }

        .result-row.total {
            color: #39ff88;
            font-size: 21px;
            font-weight: bold;
            padding-top: 18px;
        }

        .info {
            max-width: 650px;
            margin: 20px auto;
            padding: 18px;
            background: #09140d;
            border-left: 3px solid #39ff88;
            color: #91a59a;
        }

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

        @media (max-width: 700px) {
            .nav {
                flex-direction: column;
                padding: 12px 0;
            }

            .calculator {
                padding: 22px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="container nav">
        <a href="index.php" class="logo">&lt;Kursus<span>Ku/&gt;</span></a>

        <nav>
            <a href="index.php">Katalog</a>
            <a href="fee-calculator.php" class="active">Kalkulator</a>
            <a href="server-time.php">Server Time</a>
        </nav>
    </div>
</header>

<section class="hero">
    <div class="container">

        <div class="terminal">
            $ php fee-calculator.php
        </div>

        <h1>
            Fee <span>Calculator</span>
        </h1>

        <p>
            Hitung biaya kursus dan diskon dengan cepat.
        </p>

    </div>
</section>

<main>

    <div class="calculator">

        <div class="calculator-header">
            &gt;_ input_course_fee
        </div>

        <form method="POST">

            <div class="input-group">
                <label for="harga">Harga Kursus</label>

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
                <label for="diskon">Diskon (%)</label>

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

            <button type="submit" class="btn">
                &gt;_ Hitung Sekarang
            </button>

        </form>

        <?php if ($error): ?>

            <div class="error">
                ⚠ <?= htmlspecialchars($error); ?>
            </div>

        <?php endif; ?>

        <?php if ($hasil !== null): ?>

            <div class="result">

                <div class="result-title">
                    // calculation_result
                </div>

                <div class="result-row">
                    <span>Harga Awal</span>
                    <strong><?= formatRupiah($hasil['harga']); ?></strong>
                </div>

                <div class="result-row">
                    <span>Diskon</span>
                    <strong><?= $hasil['diskon']; ?>%</strong>
                </div>

                <div class="result-row">
                    <span>Potongan Harga</span>
                    <strong><?= formatRupiah($hasil['potongan']); ?></strong>
                </div>

                <div class="result-row total">
                    <span>Total Bayar</span>
                    <strong><?= formatRupiah($hasil['total']); ?></strong>
                </div>

            </div>

        <?php endif; ?>

    </div>

    <div class="info">
        💡 <strong>Contoh:</strong> jika harga kursus Rp 350.000
        dan diskon 10%, maka total pembayaran menjadi
        <strong>Rp 315.000</strong>.
    </div>

</main>

<footer>
    &lt;Kursus<span>Ku/&gt;</span> — Belajar Teknologi, Bangun Masa Depan
</footer>

</body>
</html>
```
