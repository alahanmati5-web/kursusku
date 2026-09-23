<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - KursusKu</title>

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
            color: #39d98a;
            font-size: 24px;
            font-weight: bold;
        }

        .kembali {
            color: white;
            text-decoration: none;
            border: 1px solid #39d98a;
            padding: 10px 18px;
            border-radius: 8px;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
        }

        .judul {
            text-align: center;
            margin-bottom: 25px;
        }

        .judul h1 {
            color: #39d98a;
            margin-bottom: 8px;
        }

        .judul p {
            color: #b8c9c2;
        }

        .form-box {
            background: #0b241c;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #174b3a;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #28624e;
            background: #071a14;
            color: white;
            font-size: 15px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #39d98a;
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
        }

        .btn:hover {
            background: #2fc27a;
        }

        footer {
            text-align: center;
            color: #8da49b;
            padding: 25px;
        }
    </style>
</head>

<body>

<header>
    <div class="logo">KursusKu</div>

    <a href="index.php" class="kembali">
        ← Kembali ke Katalog
    </a>
</header>

<div class="container">

    <div class="judul">
        <h1>Form Registrasi Kursus</h1>
        <p>Silakan isi data diri untuk mengikuti kursus.</p>
    </div>

    <div class="form-box">

        <form method="POST">

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input
                    type="text"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required
                >
            </div>

            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="contoh@email.com"
                    required
                >
            </div>

            <div class="form-group">
                <label>No. HP / WhatsApp</label>
                <input
                    type="text"
                    name="hp"
                    placeholder="08xxxxxxxxxx"
                    required
                >
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <input
                    type="text"
                    name="prodi"
                    placeholder="Contoh: Pendidikan Teknik Informatika dan Komputer"
                    required
                >
            </div>

            <div class="form-group">
                <label>Kursus yang Dipilih</label>

                <select name="kursus" required>
                    <option value="">-- Pilih Kursus --</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Pemrograman">Pemrograman</option>
                    <option value="Database">Database</option>
                    <option value="Jaringan Komputer">Jaringan Komputer</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jenis Peserta</label>

                <select name="jenis_peserta" required>
                    <option value="">-- Pilih Jenis Peserta --</option>
                    <option value="Pelajar">Pelajar</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Umum">Umum</option>
                </select>
            </div>

            <div class="form-group">
                <label>Minat Tambahan</label>

                <input
                    type="text"
                    name="minat"
                    placeholder="Contoh: AI, desain, coding, jaringan"
                >
            </div>

            <div class="form-group">
                <label>Catatan</label>

                <textarea
                    name="catatan"
                    placeholder="Tuliskan catatan atau kebutuhan Anda..."
                ></textarea>
            </div>

            <button type="submit" class="btn">
                Daftar Sekarang
            </button>

        </form>

    </div>
</div>

<footer>
    © 2026 KursusKu. Belajar Teknologi, Bangun Masa Depan.
</footer>

</body>
</html>