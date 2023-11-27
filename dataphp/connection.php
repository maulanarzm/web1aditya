<?php
// Informasi koneksi database
$host = 'localhost';
$dbname = 'aditya_utss';
$user = 'root';
$pass = '';

// Membuat koneksi PDO
try {
    $koneksi = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Atur mode error untuk melihat kesalahan dengan jelas
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "";
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
}
?>
