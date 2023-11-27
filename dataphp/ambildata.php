<?php
// Panggil skrip koneksi
require_once 'connection.php';

try {
    // SQL untuk melakukan SELECT * FROM datalink
    $sql = "SELECT * FROM datalink";

    // Siapkan pernyataan SQL menggunakan metode prepare
    $stmt = $koneksi->prepare($sql);

    // Eksekusi pernyataan SQL
    $stmt->execute();

    // Ambil semua baris hasil sebagai array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'data' => $result]);
} catch (PDOException $e) {
    // Mengembalikan pesan error dalam format JSON
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Error: ' . $e->getMessage()]);
}
?>
