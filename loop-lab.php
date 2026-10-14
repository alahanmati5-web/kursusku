```php
<?php
// =====================================
// LABORATORIUM PERULANGAN PHP
// File: loop-lab.php
// =====================================

$nama = "Muhammad Hafiz";
$angkaMaksimal = 10;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop Lab | KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #07110d;
            color: #e8fff1;
            padding: 30px 16px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #39ff88;
            font-size: 32px;
            margin-bottom: 10px;
            text-shadow: 0 0 15px #39ff8870;
        }

        .header p {
            color: #b6cfc0;
            line-height: 1.7;
        }

        .card {
            background: #101f18;
            border: 1px solid #2b754b;
            border-radius: 16px;
            padding: 22px;
            margin-bottom: 22px;
            box-shadow: 0 0 18px #39ff8810;
        }

        h2 {
            color: #39ff88;
            margin-bottom: 16px;
            font-size: 21px;
        }

        .hasil {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .item {
            background: #173d29;
            border: 1px solid #39ff8860;
            padding: 12px 16px;
            border-radius: 9px;
            min-width: 48px;
            text-align: center;
            color: #caffdc;
        }

        .genap {
            background: #123d4b;
            border-color: #35d9ff;
            color: #a9f0ff;
        }

        .ganjil {
            background: #3d2b13;
            border-color: #ffc857;
            color: #ffe1a0;
        }

        .kode {
            background: #07110d;
            padding: 15px;
            border-radius: 8px;
            color: #b8ffce;
            overflow-x: auto;
            line-height: 1.8;
        }

        .footer {
            text-align: center;
            color: #8fa99a;
            margin-top: 30px;
            font-size: 13px;
        }

        .badge {
            display: inline-block;
            background: #173d29;
            color: #39ff88;
            border-radius: 20px;
            padding: 6px 12px;
            margin-bottom: 15px;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .header h1 {
                font-size: 25px;
            }

            .card {
                padding: 16px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <header class="header">
        <span class="badge">PHP PRACTICE LAB</span>
        <h1>Laboratorium Perulangan PHP</h1>
        <p>Belajar memahami perulangan menggunakan
            <strong>for, while, dan foreach</strong>.</p>
        <p>Nama Praktikan: <strong><?= htmlspecialchars($nama) ?></strong></p>
    </header>

    <!-- 1. FOR -->
    <section class="card">
        <h2>1. Perulangan For</h2>
        <p>Menampilkan angka 1 sampai <?= $angkaMaksimal ?>.</p>
        <br>

        <div class="hasil">
            <?php
            for ($i = 1; $i <= $angkaMaksimal; $i++) {
                echo '<div class="item">' . $i . '</div>';
            }
            ?>
        </div>

        <br>
        <div class="kode">
            <code>
                for ($i = 1; $i <= 10; $i++) {<br>
                &nbsp;&nbsp;&nbsp; echo $i;<br>
                }
            </code>
        </div>
    </section>

    <!-- 2. WHILE -->
    <section class="card">
        <h2>2. Perulangan While</h2>
        <p>Menampilkan angka genap dari 2 sampai 20.</p>
        <br>

        <div class="hasil">
            <?php
            $angka = 2;

            while ($angka <= 20) {
                echo '<div class="item genap">' . $angka . '</div>';
                $angka += 2;
            }
            ?>
        </div>

        <br>
        <div class="kode">
            <code>
                $angka = 2;<br>
                while ($angka <= 20) {<br>
                &nbsp;&nbsp;&nbsp; echo $angka;<br>
                &nbsp;&nbsp;&nbsp; $angka += 2;<br>
                }
            </code>
        </div>
    </section>

    <!-- 3. DO WHILE -->
    <section class="card">
        <h2>3. Perulangan Do While</h2>
        <p>Menampilkan angka 1 sampai 5. Perintah dijalankan minimal satu kali.</p>
        <br>

        <div class="hasil">
            <?php
            $angka = 1;

            do {
                echo '<div class="item ganjil">' . $angka . '</div>';
                $angka++;
            } while ($angka <= 5);
            ?>
        </div>

        <br>
        <div class="kode">
            <code>
                $angka = 1;<br>
                do {<br>
                &nbsp;&nbsp;&nbsp; echo $angka;<br>
                &nbsp;&nbsp;&nbsp; $angka++;<br>
                } while ($angka <= 5);
            </code>
        </div>
    </section>

    <!-- 4. FOREACH -->
    <section class="card">
        <h2>4. Perulangan Foreach</h2>
        <p>Menampilkan daftar materi pemrograman.</p>
        <br>

        <div class="hasil">
            <?php
            $materi = [
                "HTML",
                "CSS",
                "PHP",
                "MySQL",
                "JavaScript"
            ];

            foreach ($materi as $item) {
                echo '<div class="item">'
                    . htmlspecialchars($item)
                    . '</div>';
            }
            ?>
        </div>

        <br>
        <div class="kode">
            <code>
                foreach ($materi as $item) {<br>
                &nbsp;&nbsp;&nbsp; echo $item;<br>
                }
            </code>
        </div>
    </section>

    <!-- 5. PERULANGAN BERSARANG -->
    <section class="card">
        <h2>5. Nested Loop (Perulangan Bersarang)</h2>
        <p>Menampilkan tabel perkalian 1 sampai 5.</p>
        <br>

        <div class="hasil">
            <?php
            for ($i = 1; $i <= 5; $i++) {
                for ($j = 1; $j <= 5; $j++) {
                    echo '<div class="item">'
                        . $i . ' × ' . $j . ' = ' . ($i * $j)
                        . '</div>';
                }
            }
            ?>
        </div>
    </section>

    <footer class="footer">
        <p>Loop Lab &copy; <?= date('Y') ?> — KursusKu</p>
        <p>Praktik Pemrograman PHP</p>
    </footer>

</div>
</body>
</html>
```