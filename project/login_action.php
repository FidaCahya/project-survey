<?php
session_start();
include 'koneksi.php';

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data yang dikirimkan dari form
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    if (empty($username) || empty($password)) {
        exit("Username atau password tidak boleh kosong.");
    }

    // Melindungi dari SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Mencari pengguna dengan username tertentu di database
    $sql = "SELECT * FROM m_user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Pengguna ditemukan, ambil data dari database
        $row = $result->fetch_assoc();
        
        // Password cocok, login berhasil
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['password'] = $password;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role'] = $row['role'];

        // Set cookies
        setcookie("role_key", $row['role'], time() + (86400 * 30), "/");
        setcookie("username", $username, time() + (86400 * 30), "/");

        // Redirect ke dashboard
        if ($_SESSION['role'] == 'admin') {
            header("Location: dashboard_admin.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();
        
    } else {
        // Pengguna tidak ditemukan atau password salah
        echo "Username atau password salah.";
        exit();
    }
}
?>
