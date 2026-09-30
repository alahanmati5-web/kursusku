```php
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

/* TEST 2 */
addTest( 
    'getStatusKursus() - Penuh', 
    getStatusKursus(20, 20) === 'Penuh' 
); 

/* TEST 3 */
addTest( 
    'getStatusKursus() - Tersedia', 
    getStatusKursus(10, 20) === 'Tersedia' 
); 

/* TEST 4 */
addTest( 
    'getPersentaseKapasitas()', 
    getPersentaseKapasitas(10, 20) === 50 
); 

/* TEST 5 */
addTest( 
    'hitungDiskon()', 
    hitungDiskon(500000, 20) === 400000 
); 

/* TEST 6 */
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
            background: #050807; 
            color: #eafff1; 
            min-height: 100vh; 
        } 

        /* ================= HEADER ================= */

        header { 
            background: #07100b; 
            border-bottom: 1px solid #39ff88; 
            padding: 22px 8%; 
            box-shadow: 0 0 20px rgba(57, 255, 136, 0.15); 
        } 

        nav { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        } 

        .logo { 
            font-size: 28px; 
            font-weight: bold; 
            color: #39ff88; 
            text-shadow: 0 0 10px #39ff88; 
        } 

        nav a { 
            color: #d5ffe4; 
            text-decoration: none; 
            margin-left: 20px; 
            transition: 0.3s; 
        } 

        nav a:hover { 
            color: #39ff88; 
            text-shadow: 0 0 8px #39ff88; 
        } 

        /* ================= CONTAINER ================= */

        .container { 
            width: 90%; 
            max-width: 900px; 
            margin: 55px auto; 
        } 

        /* ================= CARD ================= */

        .test-card { 
            background: #0b120e; 
            padding: 35px; 
            border-radius: 18px; 
            border: 1px solid #1c6b3d; 
            box-shadow: 
                0 0 25px rgba(57, 255, 136, 0.08), 
                0 15px 40px rgba(0, 0, 0, 0.5); 
        } 

        h1 { 
            text-align: center; 
            color: #39ff88; 
            margin-bottom: 10px; 
            font-size: 32px; 
            text-shadow: 0 0 12px rgba(57, 255, 136, 0.6); 
        } 

        .summary { 
            text-align: center; 
            margin-bottom: 35px; 
            color: #91bfa3; 
            font-size: 16px; 
        } 

        /* ================= TEST ITEM ================= */

        .test { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 18px 20px; 
            margin-bottom: 13px; 
            border-radius: 12px; 
            background: #0f1913; 
            border: 1px solid #193a26; 
            transition: 0.3s; 
        } 

        .test:hover { 
            transform: translateX(5px); 
            border-color: #39ff88; 
            box-shadow: 0 0 15px rgba(57, 255, 136, 0.12); 
        } 

        /* ================= PASS ================= */

        .pass { 
            color: #39ff88; 
            font-weight: bold; 
            padding: 6px 13px; 
            border-radius: 20px; 
            background: rgba(57, 255, 136, 0.10); 
            border: 1px solid #39ff88; 
            box-shadow: 0 0 10px rgba(57, 255, 136, 0.25); 
        } 

        /* ================= FAIL ================= */

        .fail { 
            color: #ff5555; 
            font-weight: bold; 
            padding: 6px 13px; 
            border-radius: 20px; 
            background: rgba(255, 50, 50, 0.10); 
            border: 1px solid #ff5555; 
        } 

        /* ================= FINAL ================= */

        .final { 
            margin-top: 28px; 
            padding: 22px; 
            text-align: center; 
            border-radius: 12px; 
            background: rgba(57, 255, 136, 0.08); 
            border: 1px solid #39ff88; 
            color: #39ff88; 
            font-size: 21px; 
            font-weight: bold; 
            box-shadow: 
                0 0 20px rgba(57, 255, 136, 0.15), 
                inset 0 0 15px rgba(57, 255, 136, 0.03); 
            text-shadow: 0 0 8px rgba(57, 255, 136, 0.7); 
        } 

        /* ================= FOOTER ================= */

        footer { 
            background: #030604; 
            color: #6f9c7e; 
            text-align: center; 
            padding: 25px; 
            margin-top: 60px; 
            border-top: 1px solid #173b25; 
        } 

        /* ================= RESPONSIVE ================= */

        @media (max-width: 600px) { 

            header { 
                padding: 20px; 
            } 

            nav { 
                flex-direction: column; 
                gap: 18px; 
            } 

            nav a { 
                margin: 0 8px; 
                font-size: 14px; 
            } 

            .container { 
                width: 94%; 
                margin: 35px auto; 
            } 

            .test-card { 
                padding: 22px; 
            } 

            h1 { 
                font-size: 25px; 
            } 

            .test { 
                flex-direction: column; 
                align-items: flex-start; 
                gap: 12px; 
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

        <h1>🧪 Test Functions KursusKu</h1> 

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
                        ✓ PASS 
                    </span> 

                <?php else: ?> 

                    <span class="fail"> 
                        ✕ FAIL 
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
                 style="background:rgba(255,50,50,0.08);
                        color:#ff5555;
                        border-color:#ff5555;
                        box-shadow:0 0 20px rgba(255,50,50,0.15);
                        text-shadow:none;"> 
                ⚠ Ada test yang gagal. 
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
```
