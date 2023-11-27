<?php
// Panggil skrip koneksi
require_once 'connection.php';

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai-nilai dari form
    $judul = $_POST["judul"];
    $updatedJudul = $_POST["updatedJudul"];
    $updatedUrl = $_POST["updatedUrl"];
    $updatedDeskripsi = $_POST["updatedDeskripsi"];

    try {
        // SQL untuk melakukan UPDATE datalink berdasarkan judul
        $sql = "UPDATE datalink SET judul = :updatedJudul, url = :updatedUrl, deskripsi = :updatedDeskripsi WHERE judul = :judul";

        // Siapkan pernyataan SQL menggunakan metode prepare
        $stmt = $koneksi->prepare($sql);

        // Bind parameter ke pernyataan SQL
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':updatedJudul', $updatedJudul);
        $stmt->bindParam(':updatedUrl', $updatedUrl);
        $stmt->bindParam(':updatedDeskripsi', $updatedDeskripsi);

        // Eksekusi pernyataan SQL
        $stmt->execute();
        

        
        // Kirim respons JSON ke klien
        echo json_encode(['success' => true, 'message' => 'Data updated successfully']);
        exit();
    } catch (PDOException $e) {
        // Kirim respons JSON ke klien jika terjadi kesalahan
        echo json_encode(['success' => false, 'message' => 'Error updating data: ' . $e->getMessage()]);
        exit();
    }
}
?>
