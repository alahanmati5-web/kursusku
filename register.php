
<?php

require_once __DIR__ . '/helpers.php';

if (!function_exists('h')) {
    function h($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

$fileData = __DIR__ . '/storage/registrations.json';
$registrations = [];

if (file_exists($fileData)) {
    $isiFile = file_get_contents($fileData);

    if ($isiFile !== false && trim($isiFile) !== '') {
        $data = json_decode($isiFile, true);

        if (is_array($data)) {
            $registrations = $data;
        }
    }
}

// Tampilkan pendaftaran terbaru terlebih dahulu.
$registrations = array_reverse($registrations);

$jumlahPeserta = count($registrations);
$totalPendapatan = 0;

foreach ($registrations as $item) {
    $totalPendapatan += (float) ($item['total'] ?? 0);
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Peserta | KursusKu</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 25px 16px;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            color: #fff;
            background:
                radial-gradient(circle at top right, #123522, transparent 35%),
                #030806;
        }

        .container {
            width: 100%;
            max-width: 1150px;
            margin: 20px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1, h2 { color: #39ff88; }

        .muted {
            color: #a9bdb2;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 12px 16px;
            color: #031008;
            background: #39ff88;
            border-radius: 9px;
            text-decoration: none;
            font-weight: bold;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .stat, .panel {
            padding: 22px;
            background: linear-gradient(145deg, #102019, #06110c);
            border: 1px solid #286b45;
            border-radius: 16px;
        }

        .stat-label {
            color: #a9bdb2;
            font-size: 14px;
        }

        .stat-value {
            margin-top: 10px;
            color: #39ff88;
            font-size: 27px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            vertical-align: top;
            border-bottom: 1px solid #ffffff14;
        }

        th {
            color: #39ff88;
            background: #39ff880a;
        }

        td { color: #e0e9e3; }

        .small {
            display: block;
            margin-top: 5px;
            color: #9eb2a5;
            font-size: 12px;
        }

        .empty {
            padding: 35px 15px;
            text-align: center;
            color: #a9bdb2;
            line-height: 1.8;
        }

        @media (max-width: 600px) {
            .stats { grid-template-columns: 1fr; }
            .stat-value { font-size: 23px; }
        }
    </style>
</head>

<body>
<main class="container">

    <header class="header">
        <div>
            <h1>Daftar Peserta KursusKu</h1>
            <p class="muted">
                Halaman untuk melihat data pendaftaran yang telah tersimpan.
            </p>
        </div>

        <a class="btn" href="registration.php">+ Tambah Pendaftaran</a>
    </header>

    <section class="stats">
        <div class="stat">
            <div class="stat-label">Jumlah Pendaftaran</div>
            <div class="stat-value"><?= $jumlahPeserta ?></div>
        </div>

        <div class="stat">
            <div class="stat-label">Total Nilai Pendaftaran</div>
            <div class="stat-value"><?= h(formatRupiah($totalPendapatan)) ?></div>
        </div>
    </section>

    <section class="panel">
        <h2>Data Peserta</h2>

        <?php if (empty($registrations)): ?>
            <div class="empty">
                <h3>Belum Ada Peserta</h3>
                <p>
                    Data akan muncul di halaman ini setelah seseorang
                    mengisi formulir dan berhasil mendaftar.
                </p>
                <a class="btn" href="registration.php">Buka Formulir</a>
            </div>
        <?php else: ?>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Peserta</th>
                            <th>Kursus</th>
                            <th>Jenis Peserta</th>
                            <th>Metode</th>
                            <th>Total Biaya</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($registrations as $index => $item): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>

                                <td>
                                    <strong><?= h($item['nama'] ?? '-') ?></strong>
                                    <span class="small"><?= h($item['email'] ?? '-') ?></span>
                                    <span class="small"><?= h($item['hp'] ?? '-') ?></span>
                                    <span class="small"><?= h($item['nomor'] ?? '-') ?></span>
                                </td>

                                <td><?= h($item['kursus'] ?? '-') ?></td>

                                <td><?= h($item['jenis_peserta'] ?? '-') ?></td>

                                <td><?= h($item['label_metode'] ?? $item['metode'] ?? '-') ?></td>

                                <td><?= h(formatRupiah($item['total'] ?? 0)) ?></td>

                                <td><?= h($item['tanggal'] ?? '-') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php endif; ?>
    </section>

    <p class="muted">
        Penyimpanan lokal berbasis JSON — belum menggunakan database MySQL.
    </p>

</main>
</body>
</html>
