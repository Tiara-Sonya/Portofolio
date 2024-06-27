<?php
// Sesuaikan dengan konfigurasi database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portofolio";

//koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ambil data training berdasarkan ID yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM skills WHERE id_skills = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // jika tidak ada data dengan ID tersebut, redirect ke halaman datatraining.php
        header("Location: admin.php");
        exit();
    }
} else {
    // jika tidak ada ID yang dikirimkan, redirect ke halaman datatraining.php
    header("Location: admin.php");
    exit();
}

// proses pengeditan data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_skilss = $_POST['id_skilss'];
    $name = $_POST['name'];
    $level = $_POST['level'];
    $link_foto = $_POST['link_foto'];

    // query untuk mengupdate data training
    $update_query = "UPDATE skills SET
                    name = '$name',
                    level = '$level',
                    link_foto = '$link_foto',
                    WHERE id_skills = $id_skills";

    if (mysqli_query($conn, $update_query)) {
        // Redirect ke halaman datatraining.php setelah berhasil update
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>