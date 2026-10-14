
<?php
require_once 'helpers.php';
require_once 'data.php';

$siteName = "KursusKu";
$tahun = date("Y");

$kursus = getKursus();
$kursusDipilih = $_GET['kursus'] ?? '';

$diskonPeserta = [
    'Mahasiswa' => 20,
    'Guru' => 15,
    'Umum' => 0
];

$minatOptions = $interestOptions ?? [
    'Pemrograman',
    'Web Development',
    'Database',
    'Jaringan',
    'Desain',
    'Data'
];

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi - <?= e($siteName) ?></title>

<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

html {
    scroll-behavior: smooth;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background:
        radial-gradient(circle at 20% 10%, rgba(57,255,136,.08), transparent 30%),
        radial-gradient(circle at 80% 30%, rgba(57,255,136,.05), transparent 30%),
        #030806;
    color: #fff;
    min-height: 100vh;
}

header {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: rgba(3,10,7,.88);
    backdrop-filter: blur(18px);
    border-bottom: 1px solid rgba(57,255,136,.18);
    box-shadow: 0 8px 30px rgba(0,0,0,.35);
}

.navbar {
    max-width: 1450px;
    min-height: 72px;
    margin: auto;
    padding: 14px 4%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.logo {
    display: flex;
    align-items: center;
    gap: 9px;
    color: #39ff88;
    font-size: 23px;
    font-weight: bold;
    text-decoration: none;
    white-space: nowrap;
    text-shadow: 0 0 15px rgba(57,255,136,.45);
}

.logo-dot {
    width: 8px;
    height: 8px;
    background: #39ff88;
    border-radius: 50%;
    box-shadow: 0 0 12px #39ff88;
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%,100% { opacity: 1; transform: scale(1); }
    50% { opacity: .45; transform: scale(.7); }
}

.nav-menu {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 5px;
    flex-wrap: wrap;
}

.nav-menu a {
    color: #a9bbb2;
    text-decoration: none;
    padding: 9px 10px;
    border-radius: 8px;
    font-size: 13px;
    transition: .25s ease;
}

.nav-menu a:hover,
.nav-menu a.active {
    color: #39ff88;
    background: rgba(57,255,136,.10);
}

.container {
    width: 92%;
    max-width: 900px;
    margin: 55px auto 70px;
}

.page-header {
    text-align: center;
    margin-bottom: 35px;
}

.badge {
    display: inline-block;
    padding: 7px 14px;
    margin-bottom: 16px;
    border: 1px solid rgba(57,255,136,.25);
    border-radius: 999px;
    color: #39ff88;
    background: rgba(57,255,136,.06);
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 1.5px;
}

.page-header h1 {
    font-size: clamp(30px,5vw,46px);
    margin-bottom: 12px;
}

.page-header h1 span {
    color: #39ff88;
}

.page-header p {
    color: #9cafa6;
    line-height: 1.7;
}

.form-box {
    background: linear-gradient(145deg,rgba(15,30,23,.94),rgba(6,17,12,.96));
    border: 1px solid rgba(57,255,136,.18);
    border-radius: 22px;
    padding: 38px;
    box-shadow: 0 25px 70px rgba(0,0,0,.45);
    position: relative;
    overflow: hidden;
}

.section-title {
    color: #39ff88;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title::before {
    content: "";
    width: 4px;
    height: 18px;
    background: #39ff88;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(57,255,136,.5);
}

.form-group {
    margin-bottom: 22px;
}

label {
    display: block;
    margin-bottom: 9px;
    color: #e8f3ed;
    font-size: 14px;
    font-weight: bold;
}

input,
select,
textarea {
    width: 100%;
    padding: 14px 15px;
    background: rgba(3,12,8,.9);
    color: #fff;
    border: 1px solid #234b39;
    border-radius: 11px;
    font-size: 14px;
    outline: none;
    transition: .25s ease;
}

input::placeholder,
textarea::placeholder {
    color: #60766c;
}

input:focus,
select:focus,
textarea:focus {
    border-color: #39ff88;
    box-shadow: 0 0 0 3px rgba(57,255,136,.08);
}

select {
    cursor: pointer;
}

select option {
    background: #07140e;
    color: #fff;
}

textarea {
    min-height: 110px;
    resize: vertical;
    line-height: 1.6;
}

.minat {
    display: grid;
    grid-template-columns: repeat(2,minmax(0,1fr));
    gap: 12px;
}

.minat label {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(3,12,8,.75);
    border: 1px solid #234b39;
    border-radius: 11px;
    padding: 14px;
    cursor: pointer;
    font-weight: normal;
    color: #b9cbc2;
    transition: .25s ease;
    margin: 0;
}

.minat label:hover {
    border-color: #39ff88;
    color: #fff;
    transform: translateY(-2px);
}

.minat input {
    width: 17px;
    height: 17px;
    margin: 0;
    accent-color: #39ff88;
    flex-shrink: 0;
}

.biaya-box {
    padding: 22px;
    border: 1px solid rgba(57,255,136,.25);
    border-radius: 15px;
    background: rgba(57,255,136,.045);
}

.biaya-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    padding: 11px 0;
    color: #b9cbc2;
    border-bottom: 1px solid rgba(57,255,136,.10);
    font-size: 14px;
}

.biaya-row strong {
    color: #fff;
    text-align: right;
}

.biaya-row.diskon strong {
    color: #39ff88;
}

.biaya-row.total {
    border-bottom: none;
    padding-top: 18px;
    margin-top: 5px;
}

.biaya-row.total span,
.biaya-row.total strong {
    color: #39ff88;
    font-size: 18px;
    font-weight: bold;
}

.biaya-keterangan {
    color: #81988b;
    font-size: 12px;
    line-height: 1.6;
    margin-top: 12px;
}

.btn {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 11px;
    background: #39ff88;
    color: #031008;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
    margin-top: 8px;
    box-shadow: 0 0 25px rgba(57,255,136,.14);
    transition: .25s ease;
}

.btn:hover {
    background: #62ffa1;
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(57,255,136,.2);
}

.info-box {
    margin-top: 22px;
    padding: 18px 20px;
    border-radius: 13px;
    background: rgba(57,255,136,.045);
    border: 1px solid rgba(57,255,136,.14);
    color: #8fa79b;
    font-size: 13px;
    line-height: 1.7;
}

.info-box strong {
    color: #39ff88;
}

footer {
    border-top: 1px solid rgba(57,255,136,.12);
    text-align: center;
    padding: 28px 20px;
    color: #667b71;
    font-size: 13px;
}

footer span {
    color: #39ff88;
}

@media (max-width: 1050px) {
    .navbar {
        flex-direction: column;
        padding: 18px 4%;
    }

    .nav-menu {
        justify-content: center;
    }
}

@media (max-width: 650px) {
    .container {
        width: 94%;
        margin-top: 35px;
    }

    .form-box {
        padding: 24px 20px;
        border-radius: 17px;
    }

    .minat {
        grid-template-columns: 1fr;
    }

    .page-header h1 {
        font-size: 30px;
    }

    .nav-menu a {
        font-size: 12px;
        padding: 8px;
    }

    .biaya-box {
        padding: 16px;
    }
}

@media (max-width: 430px) {
    .logo {
        font-size: 20px;
    }

    .nav-menu {
        gap: 2px;
    }

    .nav-menu a {
        font-size: 11px;
        padding: 7px 6px;
    }

    .form-box {
        padding: 20px 16px;
    }

    .biaya-row {
        font-size: 13px;
    }
}
</style>
</head>

<body>

<header>
    <div class="navbar">
        <a href="index.php" class="logo">
            &lt;KursusKu/&gt;
            <span class="logo-dot"></span>
        </a>

        <nav class="nav-menu">
            <a href="index.php">Katalog</a>
            <a href="index.php#kursus">Kursus</a>
            <a href="registration.php" class="active">Registrasi</a>
            <a href="fee-calculator.php">Kalkulator</a>
            <a href="server-time.php">Server Time</a>
            <a href="test-functions.php">Tes Fungsi</a>
            <a href="index.php#tentang">Tentang Kami</a>
            <a href="index.php#faq">FAQ</a>
            <a href="history.php">Riwayat</a>
            <a href="index.php#kontak">Kontak</a>
        </nav>
    </div>
</header>

<main class="container">

    <div class="page-header">
        <div class="badge">REGISTRATION SYSTEM</div>

        <h1>Form <span>Registrasi Kursus</span></h1>

        <p>
            Lengkapi data berikut untuk mendaftar
            dan mulai belajar bersama KursusKu.
        </p>
    </div>

    <div class="form-box">

        <div class="section-title">Data Pendaftaran</div>

        <form action="process.php" method="POST" id="formRegistrasi">

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

            <div class="form-group">
                <label for="kursus">Kursus yang Dipilih</label>

                <select id="kursus" name="kursus" required>
                    <option value="">-- Pilih Kursus --</option>

                    <?php foreach ($kursus as $item): ?>
                        <option
                            value="<?= e($item['nama']) ?>"
                            data-harga="<?= (int)($item['harga'] ?? 0) ?>"
                            <?= ($kursusDipilih === $item['nama']) ? 'selected' : '' ?>
                        >
                            <?= e($item['nama']) ?>
                            — Rp<?= number_format((int)($item['harga'] ?? 0), 0, ',', '.') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jenis_peserta">Jenis Peserta</label>

                <select id="jenis_peserta" name="jenis_peserta" required>
                    <option value="">-- Pilih Jenis Peserta --</option>
                    <option value="Mahasiswa">Mahasiswa — Diskon 20%</option>
                    <option value="Guru">Guru — Diskon 15%</option>
                    <option value="Umum">Umum — Diskon 0%</option>
                </select>
            </div>

            <div class="form-group">
                <label>Minat Tambahan (boleh pilih lebih dari satu)</label>

                <div class="minat">
                    <?php foreach ($minatOptions as $minat): ?>
                        <label>
                            <input
                                type="checkbox"
                                name="minat[]"
                                value="<?= e($minat) ?>"
                            >
                            <?= e($minat) ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="metode">Metode Pembelajaran</label>

                <select id="metode" name="metode" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="Online">Online</option>
                    <option value="Offline">Offline</option>
                    <option value="Hybrid">Hybrid</option>
                </select>
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>

                <textarea
                    id="catatan"
                    name="catatan"
                    placeholder="Tuliskan pertanyaan atau kebutuhan khusus..."
                ></textarea>
            </div>

            <div class="form-group">
                <label>Ringkasan Biaya Kursus</label>

                <div class="biaya-box">
                    <div class="biaya-row">
                        <span>Kursus</span>
                        <strong id="namaKursus">Belum dipilih</strong>
                    </div>

                    <div class="biaya-row">
                        <span>Harga Kursus</span>
                        <strong id="hargaKursus">Rp0</strong>
                    </div>

                    <div class="biaya-row">
                        <span>Jenis Peserta</span>
                        <strong id="namaPeserta">Belum dipilih</strong>
                    </div>

                    <div class="biaya-row diskon">
                        <span>Diskon</span>
                        <strong id="diskonKursus">0% — Rp0</strong>
                    </div>

                    <div class="biaya-row total">
                        <span>Total Bayar</span>
                        <strong id="totalKursus">Rp0</strong>
                    </div>

                    <p class="biaya-keterangan">
                        Total biaya diperbarui otomatis berdasarkan kursus
                        dan jenis peserta yang dipilih.
                    </p>
                </div>
            </div>

            <button type="submit" class="btn">
                &gt; Daftar Sekarang
            </button>

        </form>

        <div class="info-box">
            <strong>Info:</strong>
            Pastikan data yang kamu masukkan sudah benar.
            Diskon akan dihitung kembali di server saat formulir dikirim.
        </div>

    </div>
</main>

<footer>
    <span>&lt;KursusKu/&gt;</span>
    — Belajar Teknologi, Bangun Masa Depan
    • © <?= e($tahun) ?>
</footer>

<script>
const pilihanKursus = document.getElementById('kursus');
const pilihanPeserta = document.getElementById('jenis_peserta');

const namaKursus = document.getElementById('namaKursus');
const hargaKursus = document.getElementById('hargaKursus');
const namaPeserta = document.getElementById('namaPeserta');
const diskonKursus = document.getElementById('diskonKursus');
const totalKursus = document.getElementById('totalKursus');

const diskonPersen = {
    Mahasiswa: 20,
    Guru: 15,
    Umum: 0
};

function rupiah(angka) {
    return 'Rp' + Number(angka).toLocaleString('id-ID');
}

function hitungBiaya() {
    const opsi = pilihanKursus.options[pilihanKursus.selectedIndex];

    const nama = pilihanKursus.value;
    const harga = Number(opsi?.dataset?.harga || 0);
    const jenis = pilihanPeserta.value;
    const persen = diskonPersen[jenis] ?? 0;

    const potongan = Math.round(harga * persen / 100);
    const total = harga - potongan;

    namaKursus.textContent = nama || 'Belum dipilih';
    hargaKursus.textContent = rupiah(harga);
    namaPeserta.textContent = jenis || 'Belum dipilih';
    diskonKursus.textContent = persen + '% — ' + rupiah(potongan);
    totalKursus.textContent = rupiah(total);
}

pilihanKursus.addEventListener('change', hitungBiaya);
pilihanPeserta.addEventListener('change', hitungBiaya);

hitungBiaya();
</script>

</body>
</html>
