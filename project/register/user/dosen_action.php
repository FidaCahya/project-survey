<?php
session_start();
require_once __DIR__ . "/../../CRUD/CrudUserDosen.php";
//require_once __DIR__ . "/../../project/koneksi.php";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$crud = new CrudUserDosen($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $nip = $_POST['nip'];
    $unit = $_POST['unit'];
    $role = $_POST['role'];
    
    $survey_id = null;
    $surveyStmt = $conn->prepare("SELECT survey_id FROM m_survey LIMIT 1");
    if ($surveyStmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $surveyStmt->execute();
    $surveyResult = $surveyStmt->get_result();
    if ($surveyRow = $surveyResult->fetch_assoc()) {
        $survey_id = $surveyRow['survey_id'];
    } else {
        die("No valid survey_id found.");
    }
    $surveyStmt->close();

    $user_id = $crud->createAkun($username, $nama, $password, $role);

    if ($user_id) {
        $crud->createDosen($nama, $nip, $unit, $survey_id);
        echo "Registrasi berhasil!";
        header("Location: ../../login.php");
        exit();
    } else {
        echo "Registrasi gagal!";
    }
}
?>
