<?php
// ...
$validSessionOrCookie = false;
$username = '';
$nama = '';
$role = ''; // Tambahkan variabel $role

if (isset($_GET['role_key']) && isset($_GET['username'])) {
    // Set cookie dengan path dan secure flag
    setcookie("role_key", $_GET['role_key'], time() + (86400 * 30), "/");
    setcookie("username", $_GET['username'], time() + (86400 * 30), "/");

    // Set session
    $_SESSION['role_key'] = $_GET['role_key'];
    $_SESSION['username'] = $_GET['username'];

    $role_key = $_GET['role_key'];
    $username = $_GET['username'];
    $validSessionOrCookie = true;
} elseif (isset($_COOKIE['role_key']) && isset($_COOKIE['username'])) {
    $role_key = $_COOKIE['role_key'];
    $username = $_COOKIE['username'];
    $_SESSION['role_key'] = $role_key;
    $_SESSION['username'] = $username;
    $validSessionOrCookie = true;
} elseif (isset($_SESSION['role_key']) && isset($_SESSION['username'])) {
    $role_key = $_SESSION['role_key'];
    $username = $_SESSION['username'];
    $validSessionOrCookie = true;
}

if (!$validSessionOrCookie) {
    //echo "No valid session or cookie found. Please login again."; 
} else {
    // Ambil data user dari database berdasarkan username
    $sql = "SELECT * FROM m_user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $role = $row['role']; // Ambil nilai kolom role dari hasil query
    }
}
?>
