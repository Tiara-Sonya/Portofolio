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
    $query = "SELECT * FROM skills WHERE id_skills = $id_skills";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // jika tidak ada data dengan ID tersebut, redirect ke halaman admin.php
        header("Location: admin.php");
        exit();
    }
} else {
    // jika tidak ada ID yang dikirimkan, redirect ke halaman admin.php
    header("Location: admin.php");
    exit();
}

// proses pengeditan data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_skilss = $_POST['id_skilss'];
    $name = $_POST['name'];
    $level = $_POST['level'];
    $foto = $_POST['foto'];

    // query untuk mengupdate skills
    $update_query = "UPDATE skills SET
                    name = '$name',
                    level = '$level',
                    foto = '$foto',
                    WHERE id_skills = $id_skills";

    if (mysqli_query($conn, $update_query)) {
        // Redirect ke halaman admin.php setelah berhasil update
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Portofolio Tiara Sonya</title>
    <link href="dist/output.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="image/logo.png">
</head>
    <body>
        <div class="w-full h-screen bg-gray-200">
            <div class="flex">
                <nav class="h-16 w-full fixed items-center z-[1000] flex bg-black shadow-md">
                    <img src="image/logo1.png" class="w-14 ml-5 mb-1" alt="">
                    <h1 class="font-bold text-lg pl-80 text-light ">WELCOME TO ADMIN PORTOFOLIO TIARA SONYA!</h1>
                </nav>
                <div class="h-screen flex items-center justify-center bg-gray-100">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 h-4/5 overflow-y-auto">
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="text-2xl font-bold mb-4">Edit Data Skills</h1>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?id=' . $id); ?>" method="POST">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="id_skills" class="block text-sm font-medium text-gray-700">Id Skills</label>
                                    <input type="text" name="id_skills" id="id_skills" value="<?php echo $row['id_skills']; ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required readonly>
                                </div>
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                                    <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                                </div>
                                <div>
                                    <label for="level" class="block text-sm font-medium text-gray-700">Id Skills</label>
                                    <input type="text" name="level" id="level" value="<?php echo $row['level']; ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                                </div>
                                <div>
                                    <label for="foto" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                                    <input type="file" foto="foto" id="foto" value="<?php echo $row['foto']; ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="w-full bg-secondary text-white py-2 rounded-md hover:shadow-lg hover:bg-black transition duration-300">Simpan Perubahan</button>
                                <a href="admin.php" class="ml-2 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Batal</a>
                                </div>
                            </from>
                    
                </div>
            </div>
        </div>
    
    <!-- SCRIPT -->
    <script src="js/script.js"></script>
</body>
</html>
