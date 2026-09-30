<?php

$kursusDipilih = $_GET['kursus'] ?? '';

$hasilRegistrasi = false;
$nomorPendaftaran = '';


// ======================================================
// DATA KURSUS DAN HARGA
// ======================================================

$hargaKursus = [

    'Web Development' => 350000,

    'PHP & MySQL' => 450000,

    'Digital Marketing' => 400000,

    'Data Analysis' => 500000,

    'JavaScript Modern' => 425000,

    'Artificial Intelligence' => 850000

];


// ======================================================
// DISKON BERDASARKAN PARTICIPANT TYPE
// ======================================================

$diskonPeserta = [

    'Mahasiswa' => 20,

    'Guru' => 15,

    'Umum' => 5

];


// ======================================================
// NILAI AWAL
// ======================================================

$harga = 0;

$persenDiskon = 0;

$jumlahDiskon = 0;

$totalBayar = 0;


// ======================================================
// PROSES FORM
// ======================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // ==================================================
    // DATA FORM
    // ==================================================

    $nama = htmlspecialchars(
        $_POST['nama'] ?? '',
        ENT_QUOTES,
        'UTF-8'
    );

    $email = htmlspecialchars(
        $_POST['email'] ?? '',
        ENT_QUOTES,
        'UTF-8'
    );

    $no_hp = htmlspecialchars(
        $_POST['no_hp'] ?? '',
        ENT_QUOTES,
        'UTF-8'
    );

    $prodi = htmlspecialchars(
        $_POST['prodi'] ?? '',
        ENT_QUOTES,
        'UTF-8'
    );

    $kursus = htmlspecialchars(
        $_POST['kursus'] ?? '',
        ENT_QUOTES,
        'UTF-8'
    );

    $jenis = htmlspecialchars(
        $_POST['jenis'] ?? '',
        ENT_QUOTES,
        'UTF-8'
    );


    // ==================================================
    // INTEREST / MINAT
    // ==================================================

    $minatArray = $_POST['minat'] ?? [];


    if (!is_array($minatArray)) {

        $minatArray = [];

    }


    $minatArray = array_map(
        function ($item) {

            return htmlspecialchars(
                $item,
                ENT_QUOTES,
                'UTF-8'
            );

        },
        $minatArray
    );


    $minat = implode(
        ', ',
        $minatArray
    );


    // ==================================================
    // CATATAN
    // ==================================================

    $catatan = htmlspecialchars(
        $_POST['catatan'] ?? '',
        ENT_QUOTES,
        'UTF-8'
    );


    // ==================================================
    // HARGA KURSUS
    // ==================================================

    if (isset($hargaKursus[$kursus])) {

        $harga = $hargaKursus[$kursus];

    }


    // ==================================================
    // DISKON PARTICIPANT TYPE
    // ==================================================

    if (isset($diskonPeserta[$jenis])) {

        $persenDiskon = $diskonPeserta[$jenis];

    }


    // ==================================================
    // JUMLAH DISKON
    // ==================================================

    $jumlahDiskon =
        $harga * $persenDiskon / 100;


    // ==================================================
    // TOTAL BAYAR
    // ==================================================

    $totalBayar =
        $harga - $jumlahDiskon;


    // ==================================================
    // NOMOR PENDAFTARAN
    // ==================================================

    $nomorPendaftaran =
        'KRS-' .
        date('Y') .
        '-' .
        rand(100, 999);


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

        <?= $hasilRegistrasi
            ? 'Hasil Registrasi'
            : 'Registrasi';
        ?>

        - KursusKu

    </title>


    <style>

        /* ==================================================
           RESET
        ================================================== */

        * {

            box-sizing: border-box;

            margin: 0;

            padding: 0;

        }


        /* ==================================================
           BODY
        ================================================== */

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


        /* ==================================================
           CONTAINER
        ================================================== */

        .container {

            width: 90%;

            max-width: 850px;

            margin: auto;

        }


        /* ==================================================
           HEADER
        ================================================== */

        header {

            background: #020807;

            border-bottom: 1px solid #174d2d;

            padding: 18px 0;

            box-shadow:
                0 0 20px
                rgba(57,255,136,.08);

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

            text-shadow:
                0 0 12px
                rgba(57,255,136,.5);

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


        /* ==================================================
           MAIN
        ================================================== */

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


        /* ==================================================
           FORM BOX
        ================================================== */

        .form-box,
        .result-box {

            background:
                linear-gradient(
                    145deg,
                    #0a1710,
                    #08130d
                );

            border: 1px solid #173d27;

            border-radius: 16px;

            padding: 32px;

            box-shadow:
                0 0 30px
                rgba(57,255,136,.07);

        }


        /* ==================================================
           FORM GROUP
        ================================================== */

        .form-group {

            margin-bottom: 20px;

        }


        label {

            display: block;

            margin-bottom: 8px;

            font-weight: bold;

        }


        /* ==================================================
           INPUT
        ================================================== */

        input[type="text"],
        input[type="email"],
        input[type="tel"],
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

            box-shadow:
                0 0 10px
                rgba(57,255,136,.08);

        }


        textarea {

            min-height: 110px;

            resize: vertical;

        }


        select option {

            background: #0a1710;

        }


        /* ==================================================
           CHECKBOX
        ================================================== */

        .checkbox-group {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

            margin-top: 10px;

        }


        .checkbox-item {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 12px;

            background: #07110d;

            border: 1px solid #28583b;

            border-radius: 8px;

            cursor: pointer;

            color: #eafff1;

            transition: .3s;

        }


        .checkbox-item:hover {

            border-color: #39ff88;

            background: #0c2b18;

            box-shadow:
                0 0 10px
                rgba(57,255,136,.08);

        }


        .checkbox-item input[type="checkbox"] {

            width: 18px;

            height: 18px;

            accent-color: #39ff88;

            cursor: pointer;

            flex-shrink: 0;

        }


        /* ==================================================
           BUTTON
        ================================================== */

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

            box-shadow:
                0 0 25px
                rgba(57,255,136,.3);

        }


        .btn-secondary {

            background: transparent;

            color: #39ff88;

            margin-top: 12px;

        }


        .btn-secondary:hover {

            background: #0d2116;

        }


        /* ==================================================
           INFO
        ================================================== */

        .info {

            margin-top: 20px;

            padding: 14px;

            background: #0c2b18;

            border-left:
                4px solid #39ff88;

            border-radius: 6px;

            color: #b8c9be;

            font-size: 14px;

        }


        /* ==================================================
           SUCCESS
        ================================================== */

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


        /* ==================================================
           NOMOR PENDAFTARAN
        ================================================== */

        .nomor {

            text-align: center;

            background: #07110d;

            border:
                1px dashed #39ff88;

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


        /* ==================================================
           RINGKASAN
        ================================================== */

        .summary-title {

            margin-bottom: 15px;

        }


        .summary-title h3 {

            color: #39ff88;

            font-size: 22px;

            margin-bottom: 5px;

        }


        .summary-title p {

            color: #91a59a;

            font-size: 14px;

        }


        .summary-box {

            background: #07110d;

            border: 1px solid #28583b;

            border-radius: 12px;

            padding: 20px;

        }


        .summary-section {

            margin-bottom: 25px;

        }


        .summary-section:last-child {

            margin-bottom: 0;

        }


        .section-title {

            color: #39ff88;

            font-size: 17px;

            font-weight: bold;

            padding-bottom: 10px;

            margin-bottom: 5px;

            border-bottom:
                1px solid #173d27;

        }


        /* ==================================================
           DATA ROW
        ================================================== */

        .data-row {

            display: grid;

            grid-template-columns:
                180px 1fr;

            gap: 20px;

            padding: 13px 0;

            border-bottom:
                1px solid #173d27;

        }


        .data-row:last-child {

            border-bottom: none;

        }


        .data-label {

            color: #91a59a;

        }


        .data-value {

            font-weight: bold;

            word-break: break-word;

        }


        /* ==================================================
           HARGA
        ================================================== */

        .price-box {

            margin-top: 20px;

            padding: 20px;

            background: #081a10;

            border:
                1px solid #28583b;

            border-radius: 12px;

        }


        .price-row {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 10px 0;

            border-bottom:
                1px solid #173d27;

        }


        .price-row:last-child {

            border-bottom: none;

        }


        .price-label {

            color: #91a59a;

        }


        .price-value {

            font-weight: bold;

        }


        .discount-value {

            color: #39ff88;

        }


        /* ==================================================
           TOTAL BAYAR
        ================================================== */

        .total-row {

            margin-top: 15px;

            padding: 22px;

            background:
                linear-gradient(
                    135deg,
                    #0c2b18,
                    #071a10
                );

            border:
                1px solid #39ff88;

            border-radius: 12px;

            text-align: center;

            box-shadow:
                0 0 20px
                rgba(57,255,136,.08);

        }


        .total-row small {

            display: block;

            color: #91a59a;

            margin-bottom: 5px;

        }


        .total-row strong {

            display: block;

            color: #39ff88;

            font-size: 30px;

        }


        /* ==================================================
           FOOTER
        ================================================== */

        footer {

            text-align: center;

            border-top:
                1px solid #173d27;

            background: #020807;

            padding: 25px;

            color: #72847a;

            margin-top: 30px;

        }


        footer span {

            color: #39ff88;

        }


        /* ==================================================
           MOBILE
        ================================================== */

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


            .checkbox-group {

                grid-template-columns: 1fr;

            }


            .data-row {

                grid-template-columns:
                    1fr;

                gap: 3px;

            }


            .price-row {

                flex-direction: column;

                align-items: flex-start;

                gap: 4px;

            }


            .nomor strong {

                font-size: 20px;

            }


            .total-row strong {

                font-size: 24px;

            }

        }

    </style>

</head>


<body>


<!-- ======================================================
     HEADER
====================================================== -->

<header>

    <div class="container header-content">

        <a
            href="index.php"
            class="logo"
        >

            &lt;Kursus<span>Ku/&gt;</span>

        </a>


        <a
            href="index.php"
            class="back"
        >

            ← Kembali ke Katalog

        </a>

    </div>

</header>


<!-- ======================================================
     MAIN
====================================================== -->

<main>

<div class="container">


<?php if (!$hasilRegistrasi): ?>


    <!-- ==================================================
         FORM REGISTRASI
    ================================================== -->

    <div class="title">

        <small>
            // registration_form
        </small>

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
                    Program Studi / Bidang
                </label>

                <input
                    type="text"
                    id="prodi"
                    name="prodi"
                    placeholder="Contoh: PTIK / Guru Informatika"
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


                    <?php foreach (
                        $hargaKursus
                        as $namaKursus => $hargaKursusItem
                    ): ?>

                        <option
                            value="<?= htmlspecialchars(
                                $namaKursus,
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>"

                            <?= $kursusDipilih == $namaKursus
                                ? 'selected'
                                : ''; ?>
                        >

                            <?= htmlspecialchars(
                                $namaKursus,
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>

                            -

                            Rp <?= number_format(
                                $hargaKursusItem,
                                0,
                                ',',
                                '.'
                            ); ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- PARTICIPANT TYPE -->

            <div class="form-group">

                <label for="jenis">
                    Participant Type / Jenis Peserta
                </label>


                <select
                    id="jenis"
                    name="jenis"
                    required
                >

                    <option value="">
                        -- Pilih Jenis Peserta --
                    </option>


                    <option value="Mahasiswa">
                        👨‍🎓 Mahasiswa - Diskon 20%
                    </option>


                    <option value="Guru">
                        👨‍🏫 Guru - Diskon 15%
                    </option>


                    <option value="Umum">
                        👤 Umum - Diskon 5%
                    </option>

                </select>

            </div>


            <!-- INTEREST -->

            <div class="form-group">

                <label>
                    Interest / Minat Tambahan
                </label>


                <div class="checkbox-group">


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Web Development"
                        >

                        <span>
                            Web Development
                        </span>

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Pemrograman"
                        >

                        <span>
                            Pemrograman
                        </span>

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Database"
                        >

                        <span>
                            Database
                        </span>

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Jaringan Komputer"
                        >

                        <span>
                            Jaringan Komputer
                        </span>

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Desain"
                        >

                        <span>
                            Desain
                        </span>

                    </label>


                    <label class="checkbox-item">

                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Artificial Intelligence"
                        >

                        <span>
                            Artificial Intelligence
                        </span>

                    </label>


                </div>

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


            <!-- BUTTON -->

            <button
                type="submit"
                class="btn btn-primary"
            >

                📝 Daftar Sekarang

            </button>


        </form>


        <!-- INFO -->

        <div class="info">

            <strong>Info:</strong>

            Pilih Participant Type sesuai status kamu.

            <br><br>

            👨‍🎓 Mahasiswa =
            <strong>Diskon 20%</strong>

            <br>

            👨‍🏫 Guru =
            <strong>Diskon 15%</strong>

            <br>

            👤 Umum =
            <strong>Diskon 5%</strong>

            <br><br>

            Interest / Minat Tambahan boleh memilih
            lebih dari satu atau tidak memilih sama sekali.

        </div>


    </div>


<?php else: ?>


    <!-- ==================================================
         HASIL REGISTRASI
    ================================================== -->

    <div class="title">

        <small>
            // registration_result
        </small>

        <h1>
            Hasil Registrasi
        </h1>

        <p>
            Data pendaftaran kamu berhasil diproses.
        </p>

    </div>


    <div class="result-box">


        <!-- SUCCESS -->

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


        <!-- ==================================================
             RINGKASAN PENDAFTARAN
        ================================================== -->

        <div class="summary-title">

            <h3>
                📋 Ringkasan Pendaftaran
            </h3>

            <p>
                Berikut adalah detail data dan biaya pendaftaran.
            </p>

        </div>


        <div class="summary-box">


            <!-- ==================================================
                 DATA PESERTA
            ================================================== -->

            <div class="summary-section">

                <div class="section-title">
                    👤 Data Peserta
                </div>


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
                        Program Studi / Bidang
                    </div>

                    <div class="data-value">
                        <?= $prodi; ?>
                    </div>

                </div>

            </div>


            <!-- ==================================================
                 DETAIL KURSUS
            ================================================== -->

            <div class="summary-section">

                <div class="section-title">
                    💻 Detail Kursus
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
                        Participant Type
                    </div>

                    <div class="data-value">
                        <?= $jenis; ?>
                    </div>

                </div>


                <div class="data-row">

                    <div class="data-label">
                        Interest / Minat
                    </div>

                    <div class="data-value">

                        <?php if (!empty($minat)): ?>

                            <?= $minat; ?>

                        <?php else: ?>

                            Tidak ada minat tambahan

                        <?php endif; ?>

                    </div>

                </div>


                <div class="data-row">

                    <div class="data-label">
                        Catatan
                    </div>

                    <div class="data-value">

                        <?= !empty($catatan)
                            ? $catatan
                            : '-'; ?>

                    </div>

                </div>

            </div>


            <!-- ==================================================
                 RINGKASAN BIAYA
            ================================================== -->

            <div class="summary-section">

                <div class="section-title">
                    💰 Ringkasan Biaya
                </div>


                <div class="price-box">


                    <!-- HARGA AWAL -->

                    <div class="price-row">

                        <div class="price-label">
                            Harga Kursus
                        </div>

                        <div class="price-value">

                            Rp <?= number_format(
                                $harga,
                                0,
                                ',',
                                '.'
                            ); ?>

                        </div>

                    </div>


                    <!-- PARTICIPANT TYPE -->

                    <div class="price-row">

                        <div class="price-label">
                            Participant Type
                        </div>

                        <div class="price-value">
                            <?= $jenis; ?>
                        </div>

                    </div>


                    <!-- PERSENTASE DISKON -->

                    <div class="price-row">

                        <div class="price-label">
                            Diskon
                        </div>

                        <div class="price-value discount-value">

                            <?= $persenDiskon; ?>%

                        </div>

                    </div>


                    <!-- NOMINAL DISKON -->

                    <div class="price-row">

                        <div class="price-label">
                            Jumlah Diskon
                        </div>

                        <div class="price-value discount-value">

                            - Rp <?= number_format(
                                $jumlahDiskon,
                                0,
                                ',',
                                '.'
                            ); ?>

                        </div>

                    </div>


                </div>


                <!-- TOTAL BAYAR -->

                <div class="total-row">

                    <small>
                        TOTAL BIAYA YANG HARUS DIBAYAR
                    </small>

                    <strong>

                        Rp <?= number_format(
                            $totalBayar,
                            0,
                            ',',
                            '.'
                        ); ?>

                    </strong>

                </div>


            </div>


        </div>


        <!-- ==================================================
             BUTTON
        ================================================== -->

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


<!-- ======================================================
     FOOTER
====================================================== -->

<footer>

    &lt;Kursus<span>Ku/&gt;</span>

    —

    Belajar Teknologi, Bangun Masa Depan

    © <?= date("Y"); ?>

</footer>


</body>

</html>