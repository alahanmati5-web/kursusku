<?php

require_once 'helpers.php';

$tests = [];

function addTest($nama, $hasil)
{
    global $tests;

    $tests[] = [
        'nama' => $nama,
        'hasil' => $hasil
    ];
}

/*
 * TEST 1
 * Format Rupiah
 */
addTest(
    'formatRupiah()',
    formatRupiah(500000) === 'Rp 500.000'
);

/*
 * TEST 2
 * Status Penuh
 */
addTest(
    'getStatusKursus() - Penuh',
    getStatusKursus(20, 20) === 'Penuh'
);

/*
 * TEST 3
 * Status Tersedia
 */
addTest(
    'getStatusKursus() - Tersedia',
    getStatusKursus(10, 20) === 'Tersedia'
);

/*
 * TEST 4
 * Persentase kapasitas
 */
addTest(
    'getPersentaseKapasitas()',
    getPersentaseKapasitas(10, 20) === 50
);

/*
 * TEST 5
 * Hitung diskon
 */
addTest(
    'hitungDiskon()',
    hitungDiskon(500000, 20) === 400000
);

/*
 * TEST 6
 * Data kursus minimal 6
 */
$kursus = getKursus();

addTest(
    'getKursus() - minimal 6 kursus',
    count($kursus) >= 6
);

$totalTest = count($tests);
$totalPass = 0;

foreach ($tests as $test) {
    if ($test['hasil']) {
        $totalPass++;
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

    <title>Test Functions - KursusKu</title>

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
            background: linear-gradient(
                135deg,
                #2563eb,
                #7c3aed
            );

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
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
        }

        .test-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            color: #1d4ed8;
            margin-bottom: 10px;
        }

        .summary {
            text-align: center;
            margin-bottom: 30px;
            color: #64748b;
        }

        .test {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px;
            margin-bottom: 12px;
            border-radius: 10px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .pass {
            color: #16a34a;
            font-weight: bold;
        }

        .fail {
            color: #dc2626;
            font-weight: bold;
        }

        .final {
            margin-top: 25px;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            background: #dcfce7;
            color: #166534;
            font-size: 20px;
            font-weight: bold;
        }

        footer {
            background: #111827;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 50px;
        }

        @media (max-width: 600px) {

            nav {
                flex-direction: column;
                gap: 15px;
            }

            nav a {
                margin: 0 8px;
            }

            .test {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

        }

    </style>

</head>

<body>

<header>

    <nav>

        <div class="logo">
            KursusKu
        </div>

        <div>

            <a href="index.php">
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

<main class="container">

    <div class="test-card">

        <h1>Test Functions KursusKu</h1>

        <p class="summary">
            <?= $totalPass; ?> dari <?= $totalTest; ?>
            test berhasil
        </p>

        <?php foreach ($tests as $index => $test): ?>

            <div class="test">

                <span>
                    Test <?= $index + 1; ?>:
                    <?= htmlspecialchars($test['nama']); ?>
                </span>

                <?php if ($test['hasil']): ?>

                    <span class="pass">
                        PASS
                    </span>

                <?php else: ?>

                    <span class="fail">
                        FAIL
                    </span>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

        <?php if ($totalPass === $totalTest): ?>

            <div class="final">
                ✓ SEMUA TEST PASS
            </div>

        <?php else: ?>

            <div class="final"
                 style="background:#fee2e2;color:#991b1b;">
                Ada test yang gagal.
            </div>

        <?php endif; ?>

    </div>

</main>

<footer>

    <p>
        &copy; <?= date('Y'); ?> KursusKu
    </p>

</footer>

</body>

</html>
