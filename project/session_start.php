<?php
session_start();

// Cek jika user_id tidak ada dalam session, log error, dan redirect ke landing_page.php
if (!isset($_SESSION['user_id'])) {
    error_log("Redirecting to landing_page.php - Session user_id not set");
    header("Location: landing_page.php");
    exit();
}

// Asumsikan $role_key diambil dari session atau diatur secara default
if (isset($_SESSION['role_key'])) {
    $role_key = $_SESSION['role_key'];
} else {
    $role_key = 'default_role_key'; // Nilai default
}
?>