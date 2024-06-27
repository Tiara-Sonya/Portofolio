<?php
// Sesuaikan dengan konfigurasi database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portofolio";

//koneksi ke database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ambil data dari formulir
$id_skilss = $_POST['id_skilss'];
$name = $_POST['name'];
$level = $_POST['level'];
$link_foto = $_POST['link_foto'];

// cek apakah id_skills sudah ada di database
$id_check_query = "SELECT * FROM skills WHERE id_skills='$id_skills' LIMIT 1";
$id_check_result = mysqli_query($conn, $id_check_query);
$id_exists = mysqli_fetch_assoc($id_check_result);

// cek apakah name sudah ada di database
$name_check_query = "SELECT * FROM skills WHERE name='$name' LIMIT 1";
$name_check_result = mysqli_query($conn, $name_check_query);
$name_exists = mysqli_fetch_assoc($name_check_result);

// query untuk menyimpan data ke database jika tidak ada duplikat
if (!$id_exists && !$name_exists) {
    // query untuk menyimpan data ke database
    $query = "INSERT INTO skills (id_skills, name, level, link_foto) 
              VALUES ('$id_skills', '$name', '$level', '$link_foto')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil disimpan');</script>";
        echo "<script>window.location.href='datatraining.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} elseif ($id_exists) {
    echo "<script>alert('Id Skills sudah ada di database. Silakan gunakan Id Skills yang berbeda.');</script>";
    echo "<script>window.location.href='admin.php#formTambah';</script>";
} elseif ($name_exists) {
    echo "<script>alert('Name sudah ada di database. Silakan gunakan Name yang berbeda.');</script>";
    echo "<script>window.location.href='admin.php#formTambah';</script>";
} else {
    // query untuk menyimpan data ke database karena duplikat field-field lainnya diperbolehkan
    $query = "INSERT INTO skills (id_skills, name, level, link_foto) 
              VALUES ('$id_skills', '$name', '$level', '$link_foto')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil disimpan');</script>";
        echo "<script>window.location.href='datatraining.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// tutup koneksi
mysqli_close($conn);
?>


