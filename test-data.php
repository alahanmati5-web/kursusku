
<?php
require_once 'data.php';

echo "<h2>Daftar Kursus KursusKu</h2>";

foreach ($courses as $course) {
    echo "<p>";
    echo htmlspecialchars($course['nama']);
    echo " - ";
    echo formatRupiah($course['harga']);
    echo " - ";
    echo htmlspecialchars(getMethodLabel($course['metode']));
    echo "</p>";
}

echo "<h2>Pilihan Minat</h2>";

foreach ($interestOptions as $interest) {
    echo "<p>" . htmlspecialchars($interest) . "</p>";
}

echo "<h2>Fasilitas</h2>";

foreach ($facilities as $facility) {
    echo "<p>" . htmlspecialchars($facility) . "</p>";
}

echo "<h2>Diskon Peserta</h2>";

foreach ($participantTypes as $type => $discount) {
    echo "<p>";
    echo htmlspecialchars($type) . ": " . $discount . "%";
    echo "</p>";
}
?>
