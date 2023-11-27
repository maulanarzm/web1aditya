<?php
// dataphp/delete.php

require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil judul dari data POST
    $judulToDelete = $_POST['judul'];

    try {
        // SQL untuk menghapus data berdasarkan judul
        $sql = "DELETE FROM datalink WHERE judul = :judul";

        // Siapkan pernyataan SQL menggunakan metode prepare
        $stmt = $koneksi->prepare($sql);

        // Bind parameter judul ke pernyataan SQL
        $stmt->bindParam(':judul', $judulToDelete);

        // Eksekusi pernyataan SQL
        $stmt->execute();

        // Berhasil menghapus data
        echo "Data berhasil dihapus.";

    } catch (PDOException $e) {
        // Handle error if needed
        echo "Error: " . $e->getMessage();
    }
} else {
    // Jika bukan metode POST, kembalikan pesan kesalahan
    echo "Metode HTTP yang diperlukan tidak valid.";
}
?>
