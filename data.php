
<?php

// ========================================
// DATA KURSUS KURSUSKU
// ========================================

$courses = [
    [
        'id' => 1,
        'nama' => 'Web Development',
        'kategori' => 'Pemrograman',
        'harga' => 500000,
        'durasi' => '8 Minggu',
        'metode' => 'Online',
        'kapasitas' => 30,
        'peserta' => 18
    ],
    [
        'id' => 2,
        'nama' => 'Mobile Programming',
        'kategori' => 'Pemrograman',
        'harga' => 650000,
        'durasi' => '10 Minggu',
        'metode' => 'Hybrid',
        'kapasitas' => 25,
        'peserta' => 15
    ],
    [
        'id' => 3,
        'nama' => 'Database MySQL',
        'kategori' => 'Database',
        'harga' => 400000,
        'durasi' => '6 Minggu',
        'metode' => 'Offline',
        'kapasitas' => 25,
        'peserta' => 10
    ],
    [
        'id' => 4,
        'nama' => 'Jaringan Komputer',
        'kategori' => 'Jaringan',
        'harga' => 450000,
        'durasi' => '6 Minggu',
        'metode' => 'Hybrid',
        'kapasitas' => 20,
        'peserta' => 12
    ],
    [
        'id' => 5,
        'nama' => 'Desain Grafis',
        'kategori' => 'Desain',
        'harga' => 350000,
        'durasi' => '5 Minggu',
        'metode' => 'Online',
        'kapasitas' => 30,
        'peserta' => 20
    ],
    [
        'id' => 6,
        'nama' => 'Artificial Intelligence',
        'kategori' => 'Teknologi',
        'harga' => 750000,
        'durasi' => '12 Minggu',
        'metode' => 'Online',
        'kapasitas' => 20,
        'peserta' => 8
    ]
];

// ========================================
// PILIHAN MINAT TAMBAHAN
// ========================================

$interestOptions = [
    'Pemrograman',
    'Web Development',
    'Database',
    'Jaringan',
    'Desain',
    'Data'
];

// ========================================
// FASILITAS KURSUS
// ========================================

$facilities = [
    'Materi pembelajaran digital',
    'Video pembelajaran',
    'Modul praktik',
    'Sertifikat penyelesaian',
    'Bimbingan instruktur',
    'Grup diskusi peserta',
    'Akses materi pembelajaran',
    'Latihan dan evaluasi'
];

// ========================================
// JENIS PESERTA DAN BESAR DISKON (%)
// ========================================

$participantTypes = [
    'Mahasiswa' => 20,
    'Guru' => 15,
    'Umum' => 0
];

?>
