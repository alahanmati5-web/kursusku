```php
<?php 
require_once 'helpers.php'; 
 
$kursus = getKursus(); 
?> 
 
<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>KursusKu - Katalog Kursus</title> 
 
    <style> 
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
        } 
 
        body { 
            font-family: Arial, sans-serif; 
            background: #f4f7fb; 
            color: #1f2937; 
        } 
 
        header { 
            background: linear-gradient(135deg, #2563eb, #7c3aed); 
            color: white; 
            padding: 15px 8%; 
        } 
 
        nav { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        } 
 
        /* LOGO KURSUSKU */
        .logo { 
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 28px; 
            font-weight: bold; 
        } 

        .logo img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            border-radius: 50%;
            background: white;
            padding: 3px;
        }
 
        nav a { 
            color: white; 
            text-decoration: none; 
            margin-left: 20px; 
        } 
 
        .hero { 
            padding: 70px 8%; 
            background: white; 
            text-align: center; 
        } 
 
        .hero h1 { 
            font-size: 42px; 
            color: #1d4ed8; 
            margin-bottom: 15px; 
        } 
 
        .hero p { 
            font-size: 18px; 
            color: #64748b; 
            margin-bottom: 25px; 
        } 
 
        .hero img { 
            width: 100%; 
            max-width: 800px; 
            height: 250px; 
            object-fit: cover; 
            border-radius: 15px; 
            margin-top: 20px; 
        } 
 
        .container { 
            width: 84%; 
            max-width: 1200px; 
            margin: 50px auto; 
        } 
 
        .section-title { 
            text-align: center; 
            margin-bottom: 30px; 
        } 
 
        .section-title h2 { 
            font-size: 32px; 
            color: #1e3a8a; 
        } 
 
        .section-title p { 
            color: #64748b; 
            margin-top: 8px; 
        } 
 
        .course-grid { 
            display: grid; 
            grid-template-columns: repeat(3, 1fr); 
            gap: 25px; 
        } 
 
        .course-card { 
            background: white; 
            border-radius: 15px; 
            padding: 25px; 
            box-shadow: 0 5px 20px rgba(0,0,0,0.08); 
            transition: transform 0.2s; 
        } 
 
        .course-card:hover { 
            transform: translateY(-5px); 
        } 
 
        .category { 
            color: #2563eb; 
            font-size: 14px; 
            font-weight: bold; 
            margin-bottom: 10px; 
        } 
 
        .course-card h3 { 
            font-size: 21px; 
            margin-bottom: 15px; 
        } 
 
        .price { 
            font-size: 20px; 
            font-weight: bold; 
            color: #111827; 
            margin-bottom: 15px; 
        } 
 
        .info { 
            color: #64748b; 
            margin-bottom: 15px; 
        } 
 
        .status { 
            display: inline-block; 
            padding: 7px 14px; 
            border-radius: 20px; 
            font-weight: bold; 
            font-size: 13px; 
        } 
 
        .status-full { 
            background: #fee2e2; 
            color: #dc2626; 
        } 
 
        .status-available { 
            background: #dcfce7; 
            color: #16a34a; 
        } 
 
        .capacity { 
            margin-top: 15px; 
            background: #e5e7eb; 
            border-radius: 10px; 
            overflow: hidden; 
            height: 8px; 
        } 
 
        .capacity-bar { 
            height: 100%; 
            background: #2563eb; 
        } 
 
        .media { 
            margin-top: 60px; 
            background: white; 
            padding: 30px; 
            border-radius: 15px; 
            text-align: center; 
        } 
 
        .media h2 { 
            color: #1e3a8a; 
            margin-bottom: 20px; 
        } 
 
        video { 
            width: 100%; 
            max-width: 700px; 
            border-radius: 12px; 
        } 
 
        footer { 
            background: #111827; 
            color: white; 
            text-align: center; 
            padding: 25px; 
            margin-top: 50px; 
        } 
 
        @media (max-width: 900px) { 
            .course-grid { 
                grid-template-columns: repeat(2, 1fr); 
            } 
        } 
 
        @media (max-width: 600px) { 
            nav { 
                flex-direction: column; 
                gap: 15px; 
            } 
 
            nav a { 
                margin: 0 8px; 
            } 
 
            .hero h1 { 
                font-size: 32px; 
            } 
 
            .course-grid { 
                grid-template-columns: 1fr; 
            } 
 
            .container { 
                width: 90%; 
            } 

            .logo {
                font-size: 24px;
            }

            .logo img {
                width: 45px;
                height: 45px;
            }
        } 
    </style> 
</head> 
 
<body> 
 
<header> 
    <nav> 

        <!-- LOGO -->
        <div class="logo">
            <img src="assets/images/logo-kursus.png" alt="Logo KursusKu">
            <span>KursusKu</span>
        </div>
 
        <div> 
            <a href="index.php">Katalog</a> 
            <a href="fee-calculator.php">Kalkulator</a> 
            <a href="server-time.php">Server Time</a> 
        </div> 

    </nav> 
</header> 
 
<section class="hero"> 
    <h1>Belajar Skill Baru Bersama KursusKu</h1> 
    <p> 
        Temukan kursus pilihan untuk meningkatkan kemampuan dan kariermu. 
    </p> 
 
    <img src="assets/images/hero-kursus.jpg" alt="KursusKu"> 
</section> 
 
<main class="container"> 
 
    <div class="section-title"> 
        <h2>Katalog Kursus</h2> 
        <p>Pilih kursus yang sesuai dengan kebutuhanmu.</p> 
    </div> 
 
    <div class="course-grid"> 
 
        <?php foreach ($kursus as $item): ?> 
 
            <?php 
                $status = getStatusKursus( 
                    $item['peserta'], 
                    $item['kapasitas'] 
                ); 
 
                $persentase = getPersentaseKapasitas( 
                    $item['peserta'], 
                    $item['kapasitas'] 
                ); 
 
                $statusClass = getStatusClass($status); 
            ?> 
 
            <div class="course-card"> 
 
                <div class="category"> 
                    <?= htmlspecialchars($item['kategori']); ?> 
                </div> 
 
                <h3> 
                    <?= htmlspecialchars($item['nama']); ?> 
                </h3> 
 
                <div class="price"> 
                    <?= formatRupiah($item['harga']); ?> 
                </div> 
 
                <div class="info"> 
                    Peserta: 
                    <?= $item['peserta']; ?> 
                    / 
                    <?= $item['kapasitas']; ?> 
                </div> 
 
                <span class="status <?= $statusClass; ?>"> 
                    <?= $status; ?> 
                </span> 
 
                <div class="capacity"> 
                    <div 
                        class="capacity-bar" 
                        style="width: <?= $persentase; ?>%;" 
                    ></div> 
                </div> 
 
            </div> 
 
        <?php endforeach; ?> 
 
    </div> 
 
    <section class="media"> 
 
        <h2>Video Perkenalan KursusKu</h2> 
 
        <video controls> 
            <source 
                src="assets/video/intro-kursus.mp4" 
                type="video/mp4" 
            > 
            Browser Anda tidak mendukung video. 
        </video> 
 
    </section> 
 
</main> 
 
<footer> 
    <p>&copy; <?= date('Y'); ?> KursusKu. All Rights Reserved.</p> 
</footer> 
 
</body> 
</html>
```
