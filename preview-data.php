
<?php
require_once 'data.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data KursusKu</title>

    <style>
        :root {
            --bg: #050807;
            --panel: #0b1210;
            --green: #39ff88;
            --green-soft: #18d96e;
            --text: #f0fff5;
            --muted: #9aafa2;
            --border: rgba(57, 255, 136, 0.22);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 18px;
            background:
                radial-gradient(
                    circle at top right,
                    rgba(0, 255, 128, 0.10),
                    transparent 35%
                ),
                var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 35px;
        }

        .header h1 {
            color: var(--green);
            font-size: clamp(30px, 5vw, 44px);
            margin-bottom: 10px;
            text-shadow: 0 0 18px rgba(57, 255, 136, 0.4);
        }

        .header p {
            color: var(--muted);
            line-height: 1.7;
        }

        .section-title {
            color: var(--green);
            margin: 30px 0 16px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(
                auto-fit,
                minmax(240px, 1fr)
            );
            gap: 18px;
        }

        .card {
            background: linear-gradient(
                145deg,
                rgba(14, 27, 20, 0.98),
                rgba(6, 12, 9, 0.98)
            );
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            transition: 0.3s ease;
            box-shadow: 0 0 12px rgba(0, 255, 128, 0.03);
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: var(--green);
            box-shadow: 0 0 22px rgba(57, 255, 136, 0.12);
        }

        .card h3 {
            color: var(--green);
            margin-top: 0;
        }

        .price {
            color: var(--green);
            font-size: 23px;
            font-weight: bold;
            margin: 15px 0;
        }

        .detail {
            color: var(--muted);
            line-height: 1.9;
            font-size: 14px;
        }

        .tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            color: var(--green);
            background: rgba(57, 255, 136, 0.09);
            border: 1px solid var(--border);
            font-size: 12px;
        }

        .list-card {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
        }

        .list-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .list-card li {
            padding: 11px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            color: var(--muted);
        }

        .list-card li:last-child {
            border-bottom: none;
        }

        .list-card li::before {
            content: "✓";
            color: var(--green);
            margin-right: 10px;
            font-weight: bold;
        }

        .discount {
            color: var(--green);
            font-size: 25px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            color: var(--muted);
            margin-top: 40px;
            padding: 20px;
            border-top: 1px solid var(--border);
            font-size: 13px;
        }

        @media (max-width: 600px) {
            body {
                padding: 22px 12px;
            }

            .card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <header class="header">
        <h1>KursusKu</h1>
        <p>
            Data kursus, pilihan minat, fasilitas, dan diskon peserta.
            <br>
            <span class="tag">DATA PREVIEW</span>
        </p>
    </header>

    <h2 class="section-title">📚 Daftar Kursus</h2>

    <div class="grid">
        <?php foreach ($courses as $course): ?>
            <article class="card">
                <h3>
                    <?= htmlspecialchars($course['nama']) ?>
                </h3>

                <span class="tag">
                    <?= htmlspecialchars($course['kategori']) ?>
                </span>

                <div class="price">
                    <?= formatRupiah($course['harga']) ?>
                </div>

                <div class="detail">
                    Durasi:
                    <?= htmlspecialchars($course['durasi']) ?><br>

                    Metode:
                    <?= htmlspecialchars(
                        getMethodLabel($course['metode'])
                    ) ?><br>

                    Peserta:
                    <?= (int) $course['peserta'] ?>
                    /
                    <?= (int) $course['kapasitas'] ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <h2 class="section-title">🎯 Pilihan Minat</h2>

    <div class="list-card">
        <ul>
            <?php foreach ($interestOptions as $interest): ?>
                <li><?= htmlspecialchars($interest) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <h2 class="section-title">✨ Fasilitas Kursus</h2>

    <div class="grid">
        <?php foreach ($facilities as $facility): ?>
            <div class="list-card">
                <?= htmlspecialchars($facility) ?>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 class="section-title">💚 Diskon Peserta</h2>

    <div class="grid">
        <?php foreach ($participantTypes as $type => $discount): ?>
            <div class="card">
                <h3><?= htmlspecialchars($type) ?></h3>

                <div class="discount">
                    <?= (int) $discount ?>%
                </div>

                <div class="detail">
                    Diskon pendaftaran untuk peserta
                    <?= htmlspecialchars(strtolower($type)) ?>.
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <footer class="footer">
        KursusKu — Belajar Teknologi, Bangun Masa Depan
    </footer>

</div>
</body>
</html>
