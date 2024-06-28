<?php
// Sesuaikan dengan konfigurasi database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portofolio";

//koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Periksa apakah parameter id diberikan
if (isset($_GET['id'])) {
    $id_skills = $_GET['id'];

    // Query hapus data
    $query = "DELETE FROM skills WHERE id_skills = $id_skills";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika berhasil dihapus, arahkan ke halaman admin.php
        header("Location: admin.php");
        exit();
    } else {
        echo "Gagal menghapus data. Silakan coba lagi.";
    }
} else {
    echo "ID tidak valid.";
}
?>