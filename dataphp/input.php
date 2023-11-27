<?php
// Panggil skrip koneksi
require_once 'connection.php';

// Cek apakah form telah disubmit
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai-nilai dari form
    $judul = $_POST["judul"];
    $url = $_POST["url"];
    $deskripsi = $_POST["deskripsi"];

    try {
        // SQL untuk melakukan INSERT INTO datalink
        $sql = "INSERT INTO datalink (judul, url, deskripsi) VALUES (:judul, :url, :deskripsi)";

        // Siapkan pernyataan SQL menggunakan metode prepare
        $stmt = $koneksi->prepare($sql);

        // Bind parameter ke pernyataan SQL
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':deskripsi', $deskripsi);

        // Eksekusi pernyataan SQL
        $stmt->execute();
        echo " succes membuat data";
        // Redirect kembali ke halaman input jika sukses
        header("Location: /aditya_uts/inputdata.php?status=success");
        exit();
    } catch (PDOException $e) {
        // Handle error if needed
        echo "Error: ".$e->getMessage();
    }
}
?>