
<?php

// ========================================
// FUNGSI FORMAT RUPIAH
// ========================================
if (!function_exists('formatRupiah')) {
    function formatRupiah($angka)
    {
        return "Rp " . number_format((float) $angka, 0, ',', '.');
    }
}

// ========================================
// MENGAMBIL DATA KURSUS
// ========================================
if (!function_exists('getKursus')) {
    function getKursus()
    {
        global $courses;

        // Ambil data dari data.php
        if (isset($courses) && is_array($courses)) {
            return $courses;
        }

        // Jika data.php belum dimuat, muat terlebih dahulu
        require_once __DIR__ . '/data.php';

        global $courses;

        return isset($courses) && is_array($courses)
            ? $courses
            : [];
    }
}

// ========================================
// STATUS KETERSEDIAAN KURSUS
// ========================================
if (!function_exists('getStatusKursus')) {
    function getStatusKursus($peserta, $kapasitas)
    {
        if ($kapasitas <= 0 || $peserta >= $kapasitas) {
            return "Penuh";
        }

        return "Tersedia";
    }
}

// ========================================
// PERSENTASE KAPASITAS KURSUS
// ========================================
if (!function_exists('getPersentaseKapasitas')) {
    function getPersentaseKapasitas($peserta, $kapasitas)
    {
        if ($kapasitas <= 0) {
            return 0;
        }

        $persentase = ($peserta / $kapasitas) * 100;

        return (int) round(min(100, max(0, $persentase)));
    }
}

// ========================================
// MENGHITUNG DISKON
// ========================================
if (!function_exists('hitungDiskon')) {
    function hitungDiskon($harga, $persenDiskon)
    {
        $diskon = (float) $harga * (float) $persenDiskon / 100;

        return max(0, (float) $harga - $diskon);
    }
}

// ========================================
// CLASS STATUS UNTUK CSS
// ========================================
if (!function_exists('getStatusClass')) {
    function getStatusClass($status)
    {
        if ($status === "Penuh") {
            return "status-full";
        }

        return "status-available";
    }
}

// ========================================
// MENCARI KURSUS BERDASARKAN NAMA
// ========================================
if (!function_exists('findCourseByName')) {
    function findCourseByName($courses, $courseName)
    {
        foreach ($courses as $course) {
            if (
                isset($course['nama']) &&
                $course['nama'] === trim((string) $courseName)
            ) {
                return $course;
            }
        }

        return null;
    }
}

// ========================================
// LABEL METODE PEMBELAJARAN
// ========================================
if (!function_exists('getMethodLabel')) {
    function getMethodLabel($method)
    {
        switch (strtolower(trim((string) $method))) {
            case 'online':
                return 'Belajar Online';

            case 'offline':
                return 'Belajar Tatap Muka';

            case 'hybrid':
                return 'Belajar Hybrid';

            default:
                return 'Metode Belajar Belum Ditentukan';
        }
    }
}

?>
