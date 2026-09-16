<?php

function formatRupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

function getStatusKursus($peserta, $kapasitas)
{
    if ($peserta >= $kapasitas) {
        return "Penuh";
    }

    return "Tersedia";
}

function getPersentaseKapasitas($peserta, $kapasitas)
{
    if ($kapasitas <= 0) {
        return 0;
    }

    return (int) round(($peserta / $kapasitas) * 100);
}


function hitungDiskon($harga, $persenDiskon)
{
    return $harga - ($harga * $persenDiskon / 100);
}

function getStatusClass($status)
{
    if ($status === "Penuh") {
        return "status-full";
    }

    return "status-available";
}

function getKursus()
{
    return [
        [
            "nama" => "Web Development Dasar",
            "kategori" => "Programming",
            "harga" => 350000,
            "peserta" => 20,
            "kapasitas" => 20
        ],
        [
            "nama" => "PHP & MySQL",
            "kategori" => "Programming",
            "harga" => 450000,
            "peserta" => 15,
            "kapasitas" => 25
        ],
        [
            "nama" => "UI/UX Design",
            "kategori" => "Design",
            "harga" => 300000,
            "peserta" => 12,
            "kapasitas" => 20
        ],
        [
            "nama" => "Digital Marketing",
            "kategori" => "Marketing",
            "harga" => 400000,
            "peserta" => 18,
            "kapasitas" => 20
        ],
        [
            "nama" => "Data Analysis",
            "kategori" => "Data",
            "harga" => 500000,
            "peserta" => 10,
            "kapasitas" => 15
        ],
        [
            "nama" => "JavaScript Modern",
            "kategori" => "Programming",
            "harga" => 425000,
            "peserta" => 20,
            "kapasitas" => 20
        ]
    ];
}
?>
