<?php
// Parameter koneksi
$servername = "localhost";
$username = "root";
$password = "";
$database = "surveykepuasan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

// } else {
//      echo "Connected successfully";
}
?>