<?php
require_once 'helpers.php';

$siteName = "KursusKu";
$tahun = date("Y");

$kursus = getKursus();

// Mengambil kursus dari URL jika ada
$kursusDipilih = $_GET['kursus'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - <?= $siteName ?></title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #071a14;
            color: white;
            min-height: 100vh;
        }

        header {
            background: #0b241c;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #174b3a;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #39d98a;
        }

        .back {
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border: 1px solid #39d98a;
            border-radius: 8px;
        }

        .back:hover {
            background: #39d98a;
            color: #071a14;
        }

        .container {
            width: 90%;
            max-width: 850px;
            margin: 45px auto;
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
        }

        .title h1 {
            color: #39d98a;
            margin-bottom: 10px;
        }

        .title p {
            color: #b8c9c2;
        }

        .form-box {
            background: #0b241c;
            padding: 35px;
            border-radius: 15px;
            border: 1px solid #174b3a;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px;
            background: #071a14;
            color: white;
            border: 1px solid #28624e;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #39d98a;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .minat {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .minat label {
            background: #071a14;
            border: 1px solid #28624e;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: normal;
        }

        .minat input {
            width: auto;
            margin-right: 8px;
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #39d98a;
            color: #071a14;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background: #2fc27a;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #8da49b;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .form-box {
                padding: 22px;
            }

            .minat {
                grid-template-columns: 1fr;
            }

            header {
                padding: 15px 5%;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="logo">KursusKu</div>
    <a href="index.php" class="back">← Kembali ke Katalog</a>
</header>

<div class="container">

    <div class="title">
        <h1>Form Registrasi Kursus</h1>
        <p>Silakan isi data berikut untuk mendaftar di KursusKu.</p>
    </div>

    <div class="form-box">

        <form action="#" method="POST">

            <!-- Nama Lengkap -->
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input 
                    type="text" 
                    id="nama" 
                    name="nama" 
                    placeholder="Masukkan nama lengkap"
                    required
                >
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="contoh@email.com"
                    required
                >
            </div>

            <!-- No HP -->
            <div class="form-group">
                <label for="hp">No. HP / WhatsApp</label>
                <input 
                    type="tel" 
                    id="hp" 
                    name="hp" 
                    placeholder="08xxxxxxxxxx"
                    required
                >
            </div>

            <!-- Program Studi -->
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input 
                    type="text" 
                    id="prodi" 
                    name="prodi" 
                    placeholder="Contoh: Pendidikan Teknik Informatika dan Komputer"
                    required
                >
            </div>

            <!-- Kursus -->
            <div class="form-group">
                <label for="kursus">Kursus yang Dipilih</label>

                <select id="kursus" name="kursus" required>
                    <option value="">-- Pilih Kursus --</option>

                    <?php foreach ($kursus as $item): ?>
                        <option 
                            value="<?= htmlspecialchars($item['nama']) ?>"
                            <?= ($kursusDipilih == $item['nama']) ? 'selected' : '' ?>
                        >
                            <?= htmlspecialchars($item['nama']) ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>

            <!-- Jenis Peserta -->
            <div class="form-group">
                <label for="jenis_peserta">Jenis Peserta</label>

                <select id="jenis_peserta" name="jenis_peserta" required>
                    <option value="">-- Pilih Jenis Peserta --</option>
                    <option value="Pelajar">Pelajar</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Umum">Umum</option>
                </select>
            </div>

            <!-- Minat Tambahan -->
            <div class="form-group">
                <label>Minat Tambahan</label>

                <div class="minat">
                    <label>
                        <input type="checkbox" name="minat[]" value="Pemrograman">
                        Pemrograman
                    </label>

                    <label>
                        <input type="checkbox" name="minat[]" value="Web Development">
                        Web Development
                    </label>

                    <label>
                        <input type="checkbox" name="minat[]" value="Database">
                        Database
                    </label>

                    <label>
                        <input type="checkbox" name="minat[]" value="Jaringan">
                        Jaringan Komputer
                    </label>

                    <label>
                        <input type="checkbox" name="minat[]" value="Desain">
                        Desain
                    </label>

                    <label>
                        <input type="checkbox" name="minat[]" value="Data">
                        Data & Analisis
                    </label>
                </div>
            </div>

            <!-- Catatan -->
            <div class="form-group">
                <label for="catatan">Catatan</label>

                <textarea 
                    id="catatan" 
                    name="catatan" 
                    placeholder="Tuliskan pertanyaan atau kebutuhan khusus..."
                ></textarea>
            </div>

            <!-- Tombol -->
            <button type="submit" class="btn">
                Daftar Sekarang
            </button>

        </form>

    </div>
</div>

<footer>
    © <?= $tahun ?> <?= $siteName ?>. Belajar Teknologi, Bangun Masa Depan.
</footer>

</body>
</html>