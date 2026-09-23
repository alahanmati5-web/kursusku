```php
<?php

$kursusDipilih = $_GET['kursus'] ?? '';

$hasilRegistrasi = false;
$nomorPendaftaran = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = htmlspecialchars($_POST['nama'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $no_hp = htmlspecialchars($_POST['no_hp'] ?? '');
    $prodi = htmlspecialchars($_POST['prodi'] ?? '');
    $kursus = htmlspecialchars($_POST['kursus'] ?? '');
    $jenis = htmlspecialchars($_POST['jenis'] ?? '');
    $minat = htmlspecialchars($_POST['minat'] ?? '');
    $catatan = htmlspecialchars($_POST['catatan'] ?? '');

    // Membuat nomor pendaftaran otomatis
    $nomorPendaftaran = 'KRS-' . date('Y') . '-' . rand(100, 999);

    $hasilRegistrasi = true;
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

    <title>
        <?= $hasilRegistrasi ? 'Hasil Registrasi' : 'Registrasi'; ?> - KursusKu
    </title>


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
            line-height: 1.6;
            min-height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: 90%;
            max-width: 850px;
            margin: auto;
        }


        /* ================= HEADER ================= */

        header {
            background: #020807;
            border-bottom: 1px solid #174d2d;
            padding: 18px 0;
            box-shadow: 0 0 20px rgba(57,255,136,.08);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #39ff88;
            text-shadow: 0 0 12px rgba(57,255,136,.5);
        }

        .logo span {
            color: #eafff1;
        }

        .back {
            padding: 9px 15px;
            border: 1px solid #39ff88;
            border-radius: 8px;
            color: #39ff88;
            transition: .3s;
        }

        .back:hover {
            background: #39ff88;
            color: #031108;
        }


        /* ================= MAIN ================= */

        main {
            padding: 60px 0;
        }

        .title {
            text-align: center;
            margin-bottom: 35px;
        }

        .title small {
            color: #39ff88;
            font-family: monospace;
        }

        .title h1 {
            font-size: 36px;
            margin: 8px 0;
        }

        .title p {
            color: #91a59a;
        }


        /* ================= FORM ================= */

        .form-box,
        .result-box {
            background: linear-gradient(145deg, #0a1710, #08130d);
            border: 1px solid #173d27;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 0 30px rgba(57,255,136,.07);
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
            padding: 13px 15px;
            background: #07110d;
            color: #eafff1;
            border: 1px solid #28583b;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #39ff88;
            box-shadow: 0 0 10px rgba(57,255,136,.08);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        select option {
            background: #0a1710;
        }


        /* ================= BUTTON ================= */

        .btn {
            display: block;
            width: 100%;
            padding: 14px;
            border-radius: 9px;
            border: 1px solid #39ff88;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            transition: .3s;
        }

        .btn-primary {
            background: #39ff88;
            color: #031108;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 25px rgba(57,255,136,.3);
        }

        .btn-secondary {
            background: transparent;
            color: #39ff88;
            margin-top: 12px;
        }

        .btn-secondary:hover {
            background: #0d2116;
        }


        /* ================= INFO ================= */

        .info {
            margin-top: 20px;
            padding: 14px;
            background: #0c2b18;
            border-left: 4px solid #39ff88;
            border-radius: 6px;
            color: #b8c9be;
            font-size: 14px;
        }


        /* ================= HASIL ================= */

        .success {
            text-align: center;
            margin-bottom: 30px;
        }

        .success-icon {
            font-size: 55px;
            margin-bottom: 10px;
        }

        .success h2 {
            color: #39ff88;
            margin-bottom: 8px;
        }

        .success p {
            color: #91a59a;
        }

        .nomor {
            text-align: center;
            background: #07110d;
            border: 1px dashed #39ff88;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .nomor small {
            display: block;
            color: #91a59a;
            margin-bottom: 5px;
        }

        .nomor strong {
            color: #39ff88;
            font-size: 25px;
            font-family: monospace;
        }

        .data-list {
            border-top: 1px solid #173d27;
        }

        .data-row {
            display: grid;
            grid-template-columns: 180px 1fr;
            gap: 20px;
            padding: 14px 0;
            border-bottom: 1px solid #173d27;
        }

        .data-label {
            color: #91a59a;
        }

        .data-value {
            font-weight: bold;
            word-break: break-word;
        }


        /* ================= FOOTER ================= */

        footer {
            text-align: center;
            border-top: 1px solid #173d27;
            background: #020807;
            padding: 25px;
            color: #72847a;
            margin-top: 30px;
        }

        footer span {
            color: #39ff88;
        }


        /* ================= MOBILE ================= */

        @media (max-width: 600px) {

            .header-content {
                flex-direction: column;
                gap: 15px;
            }

            main {
                padding: 40px 0;
            }

            .title h1 {
                font-size: 29px;
            }

            .form-box,
            .result-box {
                padding: 22px;
            }

            .data-row {
                grid-template-columns: 1fr;
                gap: 3px;
            }

            .nomor strong {
                font-size: 20px;
            }
        }

    </style>

</head>


<body>


<!-- ================= HEADER ================= -->

<header>

    <div class="container header-content">

        <a href="index.php" class="logo">
            &lt;Kursus<span>Ku/&gt;</span>
        </a>

        <a href="index.php" class="back">
            ← Kembali ke Katalog
        </a>

    </div>

</header>


<!-- ================= MAIN ================= -->

<main>

<div class="container">


<?php if (!$hasilRegistrasi): ?>


    <!-- ================= FORM REGISTRASI ================= -->

    <div class="title">

        <small>// registration_form</small>

        <h1>
            Form Registrasi Kursus
        </h1>

        <p>
            Isi data dengan benar untuk melakukan pendaftaran.
        </p>

    </div>


    <div class="form-box">

        <form method="POST">


            <!-- NAMA -->

            <div class="form-group">

                <label for="nama">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            <!-- EMAIL -->

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="contoh@email.com"
                    required
                >

            </div>


            <!-- NO HP -->

            <div class="form-group">

                <label for="no_hp">
                    No. HP / WhatsApp
                </label>

                <input
                    type="tel"
                    id="no_hp"
                    name="no_hp"
                    placeholder="08xxxxxxxxxx"
                    pattern="[0-9]{10,13}"
                    maxlength="13"
                    inputmode="numeric"
                    required
                >

            </div>


            <!-- PRODI -->

            <div class="form-group">

                <label for="prodi">
                    Program Studi
                </label>

                <input
                    type="text"
                    id="prodi"
                    name="prodi"
                    placeholder="Contoh: PTIK"
                    required
                >

            </div>


            <!-- KURSUS -->

            <div class="form-group">

                <label for="kursus">
                    Kursus yang Dipilih
                </label>

                <select
                    id="kursus"
                    name="kursus"
                    required
                >

                    <option value="">
                        -- Pilih Kursus --
                    </option>

                    <option
                        value="Web Development"
                        <?= $kursusDipilih == 'Web Development' ? 'selected' : ''; ?>
                    >
                        Web Development
                    </option>

                    <option
                        value="Pemrograman"
                        <?= $kursusDipilih == 'Pemrograman' ? 'selected' : ''; ?>
                    >
                        Pemrograman
                    </option>

                    <option
                        value="Database"
                        <?= $kursusDipilih == 'Database' ? 'selected' : ''; ?>
                    >
                        Database
                    </option>

                    <option
                        value="Jaringan Komputer"
                        <?= $kursusDipilih == 'Jaringan Komputer' ? 'selected' : ''; ?>
                    >
                        Jaringan Komputer
                    </option>

                </select>

            </div>


            <!-- JENIS PESERTA -->

            <div class="form-group">

                <label for="jenis">
                    Jenis Peserta
                </label>

                <select
                    id="jenis"
                    name="jenis"
                    required
                >

                    <option value="">
                        -- Pilih Jenis Peserta --
                    </option>

                    <option value="Pelajar">
                        Pelajar
                    </option>

                    <option value="Mahasiswa">
                        Mahasiswa
                    </option>

                    <option value="Umum">
                        Umum
                    </option>

                </select>

            </div>


            <!-- MINAT -->

            <div class="form-group">

                <label for="minat">
                    Minat Tambahan
                </label>

                <select
                    id="minat"
                    name="minat"
                >

                    <option value="">
                        -- Pilih Minat --
                    </option>

                    <option value="Web Development">
                        Web Development
                    </option>

                    <option value="Pemrograman">
                        Pemrograman
                    </option>

                    <option value="Database">
                        Database
                    </option>

                    <option value="Jaringan Komputer">
                        Jaringan Komputer
                    </option>

                    <option value="Desain">
                        Desain
                    </option>

                </select>

            </div>


            <!-- CATATAN -->

            <div class="form-group">

                <label for="catatan">
                    Catatan
                </label>

                <textarea
                    id="catatan"
                    name="catatan"
                    placeholder="Tuliskan pertanyaan atau catatan tambahan..."
                ></textarea>

            </div>


            <button
                type="submit"
                class="btn btn-primary"
            >
                📝 Daftar Sekarang
            </button>


        </form>


        <div class="info">

            <strong>Info:</strong>
            Pastikan semua data yang dimasukkan sudah benar
            sebelum melakukan pendaftaran.

        </div>

    </div>


<?php else: ?>


    <!-- ================= HASIL REGISTRASI ================= -->

    <div class="title">

        <small>// registration_result</small>

        <h1>
            Hasil Registrasi
        </h1>

        <p>
            Data pendaftaran kamu berhasil diproses.
        </p>

    </div>


    <div class="result-box">


        <div class="success">

            <div class="success-icon">
                ✅
            </div>

            <h2>
                Registrasi Berhasil!
            </h2>

            <p>
                Terima kasih telah mendaftar di KursusKu.
            </p>

        </div>


        <!-- NOMOR PENDAFTARAN -->

        <div class="nomor">

            <small>
                Nomor Pendaftaran
            </small>

            <strong>
                <?= $nomorPendaftaran; ?>
            </strong>

        </div>


        <!-- DATA -->

        <div class="data-list">


            <div class="data-row">

                <div class="data-label">
                    Nama Lengkap
                </div>

                <div class="data-value">
                    <?= $nama; ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Email
                </div>

                <div class="data-value">
                    <?= $email; ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    No. HP / WhatsApp
                </div>

                <div class="data-value">
                    <?= $no_hp; ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Program Studi
                </div>

                <div class="data-value">
                    <?= $prodi; ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Kursus
                </div>

                <div class="data-value">
                    <?= $kursus; ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Jenis Peserta
                </div>

                <div class="data-value">
                    <?= $jenis; ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Minat Tambahan
                </div>

                <div class="data-value">
                    <?= $minat ?: '-'; ?>
                </div>

            </div>


            <div class="data-row">

                <div class="data-label">
                    Catatan
                </div>

                <div class="data-value">
                    <?= $catatan ?: '-'; ?>
                </div>

            </div>


        </div>


        <div style="margin-top:25px;">

            <a
                href="registration.php"
                class="btn btn-secondary"
            >
                🔄 Daftar Lagi
            </a>

            <a
                href="index.php"
                class="btn btn-primary"
                style="margin-top:12px;"
            >
                🏠 Kembali ke Katalog
            </a>

        </div>


    </div>


<?php endif; ?>


</div>

</main>


<!-- ================= FOOTER ================= -->

<footer>

    &lt;Kursus<span>Ku/&gt;</span>
    —
    Belajar Teknologi, Bangun Masa Depan
    © <?= date("Y"); ?>

</footer>


</body>

</html>
```
