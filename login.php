<?php
// Sesuaikan dengan konfigurasi database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portofolio";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk mengecek login
function checkLogin($conn, $username, $password)
{
    // Ambil data pengguna dari database berdasarkan username
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika username ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password dengan password hash
        if (password_verify($password, $user['password'])) {
            return true;
        }
    }

    // Username tidak ditemukan atau password tidak sesuai
    return false;
}

// Proses form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (checkLogin($conn, $username, $password)) {
        // Login berhasil, atur session dan arahkan ke halaman index.php
        session_start();
        $_SESSION["login"] = true;
        header("Location: admin.php");
        exit();
    } else {
        $loginError = "Username atau password salah.";
    }
}

// Tutup koneksi database
$conn->close();
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
<body class="flex items-center justify-center w-full object-cover h-screen bg-black">
    <div class="absolute bg-white p-8 rounded-lg text-center max-w-sm w-full">
        <img src="image/logo.png" alt="" class= "mx-auto mb-4 w-24 h-auto">    
        <h1 class="text-2xl font-bold text-secondary mb-4">Login Admin</h1>
        <form action="" method="POST" class="space-y-4">
            <div>
                <input type="text" name="username" placeholder="Username" class="w-full p-2 rounded border border-white/70 backdrop-filter backdrop-blur-sm focus:outline-none focus:ring-2" required>
                </div>
            <div>
                <input type="password" name="password" placeholder="Password" class="w-full p-2 rounded border border-white/70 backdrop-filter backdrop-blur-sm focus:outline-none focus:ring-2" required>
                </div>
            <div>
                <button type="submit" class="w-full bg-secondary text-white py-3 px-10 rounded-full hover:shadow-lg hover:bg-black transition duration-300 ease-in-out">Masuk</button>
                </div>
            </form>
        </div>
    </body>
</html>
