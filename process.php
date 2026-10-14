
<?php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

if (!function_exists('h')) {
    function h($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

// Ambil data formulir
$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$hp = trim($_POST['hp'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$namaKursus = trim($_POST['kursus'] ?? '');
$jenisPeserta = trim($_POST['jenis_peserta'] ?? '');
$metode = trim($_POST['metode'] ?? '');
$catatan = trim($_POST['catatan'] ?? '');
$minat = $_POST['minat'] ?? [];

$errors = [];

// Validasi data dasar
if ($nama === '' || strlen($nama) > 100) {
    $errors[] = 'Nama wajib diisi dan maksimal 100 karakter.';
}

if (
    $email === '' ||
    strlen($email) > 150 ||
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {
    $errors[] = 'Alamat email tidak valid.';
}

if ($hp === '' || strlen($hp) > 20) {
    $errors[] = 'Nomor HP wajib diisi dan maksimal 20 karakter.';
}

if ($prodi === '' || strlen($prodi) > 150) {
    $errors[] = 'Program studi wajib diisi dan maksimal 150 karakter.';
}

if (strlen($catatan) > 1000) {
    $errors[] = 'Catatan maksimal 1000 karakter.';
}

// Validasi jenis peserta
if (!array_key_exists($jenisPeserta, $participantTypes)) {
    $errors[] = 'Jenis peserta tidak valid.';
}

// Cari kursus
$course = findCourseByName($courses, $namaKursus);

if ($course === null) {
    $errors[] = 'Kursus yang dipilih tidak valid.';
}

// Validasi metode
$validMethods = ['Online', 'Offline', 'Hybrid'];

if (!in_array($metode, $validMethods, true)) {
    $errors[] = 'Metode belajar tidak valid.';
}

// Validasi minat
if (!is_array($minat)) {
    $errors[] = 'Format pilihan minat tidak valid.';
    $minat = [];
} else {
    foreach ($minat as $interest) {
        if (
            !is_string($interest) ||
            !in_array($interest, $interestOptions, true)
        ) {
            $errors[] = 'Pilihan minat tidak valid.';
            break;
        }
    }

    $minat = array_values(array_unique($minat));
}

// Hitung biaya
$harga = $course !== null ? (float) $course['harga'] : 0;

$diskonPersen = array_key_exists($jenisPeserta, $participantTypes)
    ? (float) $participantTypes[$jenisPeserta]
    : 0;

$potongan = $harga * $diskonPersen / 100;
$total = $harga - $potongan;

// Siapkan nomor pendaftaran
$nomorPendaftaran = 'KRS-' . date('Ymd') . '-'
    . strtoupper(bin2hex(random_bytes(3)));

// ========================================
// SIMPAN DATA KE FILE JSON
// ========================================

if (empty($errors)) {
    $storageDir = __DIR__ . '/storage';
    $fileData = $storageDir . '/registrations.json';

    // Buat folder penyimpanan jika belum tersedia
    if (!is_dir($storageDir)) {
        if (!mkdir($storageDir, 0755, true) && !is_dir($storageDir)) {
            $errors[] = 'Folder penyimpanan gagal dibuat.';
        }
    }

    // Cegah akses langsung ke folder penyimpanan melalui Apache
    $htaccess = $storageDir . '/.htaccess';

    if (empty($errors) && !file_exists($htaccess)) {
        $aturanAkses = "Require all denied\nDeny from all\n";
        @file_put_contents($htaccess, $aturanAkses, LOCK_EX);
    }

    if (empty($errors)) {
        $registrations = [];

        if (file_exists($fileData)) {
            $isiFile = file_get_contents($fileData);

            if ($isiFile === false) {
                $errors[] = 'Data pendaftaran gagal dibaca.';
            } elseif (trim($isiFile) !== '') {
                $dataLama = json_decode($isiFile, true);

                if (!is_array($dataLama)) {
                    $errors[] = 'File data pendaftaran tidak valid.';
                } else {
                    $registrations = $dataLama;
                }
            }
        }
    }

    if (empty($errors)) {
        $registrations[] = [
            'nomor' => $nomorPendaftaran,
            'tanggal' => date('Y-m-d H:i:s'),
            'nama' => $nama,
            'email' => $email,
            'hp' => $hp,
            'prodi' => $prodi,
            'kursus' => $course['nama'],
            'jenis_peserta' => $jenisPeserta,
            'metode' => $metode,
            'label_metode' => getMethodLabel($metode),
            'minat' => $minat,
            'catatan' => $catatan,
            'harga' => $harga,
            'diskon_persen' => $diskonPersen,
            'potongan' => $potongan,
            'total' => $total
        ];

        $json = json_encode(
            $registrations,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        if (
            $json === false ||
            file_put_contents($fileData, $json, LOCK_EX) === false
        ) {
            $errors[] = 'Data gagal disimpan. Periksa izin folder storage.';
        }
    }
}

// ========================================
// TAMPILKAN ERROR JIKA ADA
// ========================================

if (!empty($errors)):
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Periksa Pendaftaran | KursusKu</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; padding: 20px; min-height: 100vh;
            display: grid; place-items: center;
            font-family: Arial, sans-serif; color: white;
            background: #030806;
        }
        .card {
            max-width: 620px; width: 100%; padding: 30px;
            background: #0b1911;
            border: 1px solid #286b45; border-radius: 18px;
        }
        h1 { color: #39ff88; }
        li { margin-bottom: 10px; line-height: 1.6; }
        a {
            display: inline-block; margin-top: 18px; padding: 13px 18px;
            color: #031008; background: #39ff88;
            border-radius: 9px; text-decoration: none; font-weight: bold;
        }
    </style>
</head>
<body>
    <main class="card">
        <h1>Data Belum Valid</h1>
        <p>Periksa kembali bagian berikut:</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= h($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="registration.php">Kembali ke Formulir</a>
    </main>
</body>
</html>
<?php
exit;
endif;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ringkasan Pendaftaran | KursusKu</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; padding: 24px 15px; min-height: 100vh;
            font-family: Arial, sans-serif; color: #fff;
            background:
                radial-gradient(circle at top right, #123522, transparent 35%),
                #030806;
        }
        .container { max-width: 760px; margin: 25px auto; }
        .card {
            padding: 30px;
            background: linear-gradient(145deg, #102019, #06110c);
            border: 1px solid #286b45; border-radius: 20px;
            box-shadow: 0 15px 50px #0008;
            animation: muncul .5s ease;
        }
        @keyframes muncul {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .badge {
            display: inline-block; padding: 8px 12px;
            color: #39ff88; border: 1px solid #286b45;
            border-radius: 30px; font-size: 12px;
        }
        h1, h2 { color: #39ff88; }
        .muted { color: #a9bdb2; line-height: 1.7; }
        .row {
            display: flex; justify-content: space-between; gap: 16px;
            padding: 13px 0; border-bottom: 1px solid #ffffff12;
        }
        .row span { color: #a9bdb2; }
        .row strong { max-width: 60%; text-align: right; overflow-wrap: anywhere; }
        .total { margin-top: 10px; border-bottom: 0; }
        .total strong { color: #39ff88; font-size: 23px; }
        .tags { display: flex; flex-wrap: wrap; gap: 8px; }
        .tag {
            padding: 8px 11px; color: #39ff88;
            border: 1px solid #286b45; border-radius: 8px;
        }
        .actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 25px; }
        .btn { display: inline-block; padding: 13px 17px; border-radius: 9px; text-decoration: none; font-weight: bold; }
        .primary { background: #39ff88; color: #031008; }
        .secondary { border: 1px solid #286b45; color: #39ff88; }
        @media (max-width: 520px) {
            .card { padding: 22px 17px; }
            .row { font-size: 13px; }
            .total strong { font-size: 18px; }
        }
    </style>
</head>
<body>
<main class="container">
    <section class="card">
        <span class="badge">PENDAFTARAN BERHASIL</span>
        <h1>Terima kasih, <?= h($nama) ?>! 🎉</h1>
        <p class="muted">Data pendaftaran berhasil divalidasi dan disimpan.</p>

        <div class="row">
            <span>Nomor Pendaftaran</span>
            <strong><?= h($nomorPendaftaran) ?></strong>
        </div>
        <div class="row">
            <span>Email</span>
            <strong><?= h($email) ?></strong>
        </div>
        <div class="row">
            <span>Nomor HP</span>
            <strong><?= h($hp) ?></strong>
        </div>
        <div class="row">
            <span>Program Studi</span>
            <strong><?= h($prodi) ?></strong>
        </div>
        <div class="row">
            <span>Kursus</span>
            <strong><?= h($course['nama']) ?></strong>
        </div>
        <div class="row">
            <span>Jenis Peserta</span>
            <strong><?= h($jenisPeserta) ?></strong>
        </div>
        <div class="row">
            <span>Metode Belajar</span>
            <strong><?= h(getMethodLabel($metode)) ?></strong>
        </div>

        <h2>Minat Tambahan</h2>
        <?php if (!empty($minat)): ?>
            <div class="tags">
                <?php foreach ($minat as $interest): ?>
                    <span class="tag"><?= h($interest) ?></span>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="muted">Tidak ada minat tambahan yang dipilih.</p>
        <?php endif; ?>

        <?php if ($catatan !== ''): ?>
            <h2>Catatan</h2>
            <p class="muted"><?= nl2br(h($catatan)) ?></p>
        <?php endif; ?>

        <h2>Rincian Biaya</h2>
        <div class="row">
            <span>Harga Kursus</span>
            <strong><?= formatRupiah($harga) ?></strong>
        </div>
        <div class="row">
            <span>Diskon (<?= h($diskonPersen) ?>%)</span>
            <strong><?= formatRupiah($potongan) ?></strong>
        </div>
        <div class="row total">
            <span>Total Pembayaran</span>
            <strong><?= formatRupiah($total) ?></strong>
        </div>

        <p class="muted">
            Data tersimpan pada penyimpanan lokal proyek KursusKu.
        </p>

        <div class="actions">
            <a class="btn primary" href="registration.php">Daftar Lagi</a>
            <a class="btn secondary" href="register.php">Lihat Daftar Peserta</a>
            <a class="btn secondary" href="index.php">Beranda</a>
        </div>
    </section>
</main>
</body>
</html>
