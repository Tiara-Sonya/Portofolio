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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the entered username and password exist in the database
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Check if a row is returned (valid username and password)
        if (mysqli_num_rows($result) == 1) {
            // Fetch user data and store it in the session
            $_SESSION['username'] = $username;

            // Redirect to the admin.php page upon successful login
            header("Location: admin.php");
            exit();
        } else {
            // Invalid username or password, show an alert
            echo '<script>alert("Username or password is incorrect. Please try again.");</script>';
        }
    } else {
        // Error in the query
        echo '<script>alert("Error in the query.");</script>';
    }

    // Close the database connection
    mysqli_close($conn);
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
    <link rel="icon" href="dist/image/logo.png">
</head>
<body class="flex items-center justify-center w-full object-cover h-screen bg-black">
    <div class="absolute bg-white p-8 rounded-lg text-center max-w-sm w-full">
        <img src="dist/image/logo.png" alt="" class= "mx-auto mb-4 w-24 h-auto">    
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